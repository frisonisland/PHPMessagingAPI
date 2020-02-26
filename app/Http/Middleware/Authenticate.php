<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\User as User;
class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('Token');
        if (! $token) {
            return response(["error"=>"Token required"],503);
        }
        $user = User::where('api_token', hash('sha256', $token))->first();
        if (! $user) {
          return response(["error"=>"Invalid token"],503);
        }

        $request->merge(['user' => $user]);
        // set user() method to get user
        $request->setUserResolver(function () use ($user) {
          return $user;
        });

        return $next($request);
    }
}
