<?php

namespace App\Http\Middleware;

use App\Traits\JsonResponse;
use Closure;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use JWTAuth;
class JwtMiddleware extends BaseMiddleware
{
    use JsonResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e){

            if($e instanceof TokenExpiredException){
               return $this->send_response(false, null, 400, 'Expired token provided');
            }

            if( $e instanceof TokenInvalidException){
              return  $this->send_response(false, null, 400, 'Invalid token provided');
            }

            return  $this->send_response(false, null, 400, 'Authorization token not found');
        }
        return $next($request);
    }
}
