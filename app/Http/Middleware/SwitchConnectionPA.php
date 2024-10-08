<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use PDO;
use Symfony\Component\HttpFoundation\Response;

class SwitchConnectionPA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        # get connection
        $connection = Session::get('proaccounting_connection');

        Config::set("database.connections.proaccounting", [
            "driver" => "mysql",

            # env
            "host" => $connection['proaccounting_database_ip'],
            "port" => $connection['proaccounting_database_port'],
            "database"=> $connection['proaccounting_database_name'],
            "username" => $connection['proaccounting_database_user'],
            "password" => $connection['proaccounting_database_password'],
            
            # other
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ]);

        return $next($request);
    }
}
