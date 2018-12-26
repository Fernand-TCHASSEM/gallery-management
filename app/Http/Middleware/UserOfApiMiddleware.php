<?php

namespace App\Http\Middleware;

use App;
use Closure;

class UserOfApiMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session()->has('user')) {
            if (!$request->has('token')) {
                http_response_code(400);
                header('Content-Type: application/json');
                $result = ['code' => 4004, 'description' => 'The user token is required'];
                echo json_encode($result, JSON_UNESCAPED_SLASHES);
                exit();
            } elseif (!$request->has('username')) {
                http_response_code(400);
                header('Content-Type: application/json');
                $result = ['code' => 4005, 'description' => 'The username is required'];
                echo json_encode($result, JSON_UNESCAPED_SLASHES);
                exit();
            }

            session([
                'user' => ['token' => $request->input('token')]
            ]);
        }
        return $next($request);
    }

}
