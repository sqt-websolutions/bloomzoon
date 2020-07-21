<?php

namespace App\Http\Controllers;

use App\Traits\JsonResponse;
use App\Http\Requests\AuthenticationRequest;
use App\User;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthenticationAPIController extends Controller
{
    use JsonResponse;

    /**
     * @param AuthenticationRequest $request
     * @param null $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(AuthenticationRequest $request, $client = null): \Illuminate\Http\JsonResponse
    {

        try {

            $token = JWTAuth::attempt($request->validated());

            if(!$token){
               return $this->send_response(false, null, 400);
            }

        } catch (JWTException $e){
            return $this->send_response(false, null, 500);
        }

        if($client === 'web'){
            app('log')->info(['logging' => Auth::attempt($request->validated()) ]);
            Auth::attempt($request->validated());
        }
        return $this->send_response(true, ['token' =>$token, 'user'=> JWTAuth::user() ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthenticatedUser(): \Illuminate\Http\JsonResponse
    {

        try {
            $user = JWTAuth::parseToken()->authenticate();
            if(!$user){
                $this->send_response(false, null, 404, 'user not found');
            }
        } catch (TokenExpiredException $e){
            return $this->send_response(false, null, 400, 'Expired Token provided');
        } catch (TokenInvalidException $e){
            return $this->send_response(false, null, 400, 'Invalid token supplied');
        } catch (JWTException $e){
            return $this->send_response(false, null, 400, 'auth token not provided');
        }

        return $this->send_response(true, ['user'=>$user], 200, 'user exists');
    }
}
