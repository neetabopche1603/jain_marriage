<?php

namespace App\Http\Middleware;

use App\Traits\ResponseCodeTrait;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware
{
    use ResponseCodeTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next)
     {
         try {
             $user = JWTAuth::parseToken()->authenticate();
         } catch (Exception $e) {
             if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                 return $this->tokenResponse(499, 'Token is Invalid');
             } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                 return $this->tokenResponse(498, 'Token is Expired');
             } else {
                 return $this->tokenResponse(497, 'Authorization Token not found Or Blank token');
             }
         }

         return $next($request);
     }






}
