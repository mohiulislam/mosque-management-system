<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TenantMiddleware
{
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0];

        // // Find tenant by subdomain
        // $tenant = Tenant::where('subdomain', $subdomain)->first();

        // // Handle case where tenant is not found
        // if (!$tenant) {
        //     // You can return a custom error response, throw a 404, or redirect
        //     throw new NotFoundHttpException('Tenant not found.');
        // }

        // Set tenant database connection

        //neeeeeeeeeeeeeeeed to remooooooooooove
        return $next($request);
        Config::set('database.connections.tenant.database', $subdomain);

        // Switch to tenant connection
        DB::setDefaultConnection('tenant');

        return $next($request);
    }
}
