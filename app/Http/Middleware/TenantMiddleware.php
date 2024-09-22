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
            // Set the database name for the tenant connection
            Config::set('database.connections.tenant.database', 'buy_sell');

            // Purge the existing tenant connection
            DB::purge('tenant');

            // Reconnect the tenant connection
            DB::reconnect('tenant');

            // Verify the connection
            $currentDatabase = DB::connection('tenant')->getDatabaseName();
            Log::info("Connected to tenant database: {$currentDatabase}");

            if ($currentDatabase !== 'buy_sell') {
                throw new Exception("Connected to {$currentDatabase} instead of buy_sell");
            }

            // Set the tenant connection as the default connection
            Config::set('database.default', 'tenant'); // This makes the tenant connection the default for this request

        } catch (Exception $e) {
            Log::error('TenantMiddleware error: ' . $e->getMessage());
            return response()->json(['error' => 'Could not connect to the tenant database.'], 500);
        }

        return $next($request);
    }
}
