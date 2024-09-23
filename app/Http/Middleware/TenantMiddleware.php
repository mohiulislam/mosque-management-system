<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Exception;

class TenantMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            // Extract the subdomain from the request
            $hostParts = explode('.', $request->getHost());
            $subdomain = count($hostParts) > 2 ? $hostParts[0] : null; // Check if there is a subdomain

            // Determine the tenant database name
            $tenantDatabaseName = $subdomain ? $subdomain : 'mosque_management_system'; // Default to the main database if no subdomain

            // Set the database name for the tenant connection
            Config::set('database.connections.tenant.database', $tenantDatabaseName);

            // Purge any existing tenant connection to avoid multiple active connections
            DB::purge('tenant');

            // Reconnect to the tenant database
            DB::reconnect('tenant');

            // Verify the connection to ensure we are connected to the correct database
            $currentDatabase = DB::connection('tenant')->getDatabaseName();
            Log::info("Connected to tenant database: {$currentDatabase}");

            // Ensure we are connected to the correct database
            if ($currentDatabase !== $tenantDatabaseName) {
                throw new Exception("Connected to {$currentDatabase} instead of {$tenantDatabaseName}");
            }

            // Set the tenant connection as the default for this request
            Config::set('database.default', 'tenant');
        } catch (Exception $e) {
            // Log any connection errors
            Log::error('TenantMiddleware error: ' . $e->getMessage());
            return response()->json(['error' => 'Could not connect to the tenant database.'], 500);
        }

        return $next($request); // Proceed to the next middleware or request handler
    }
}
