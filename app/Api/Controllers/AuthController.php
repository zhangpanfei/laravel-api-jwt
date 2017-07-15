<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\UserRegister;

class AuthController extends BaseController
{
	public function authenticate(Request $request)
    {
        // grab credentials from the request
        //$credentials = $request->only('email', 'password');
        $credentials = [
        	'name' => $request->get('name'),
        	'password' => $request->get('pwd'),
        ];
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function register(UserRegister $request)
    {
    	$data = request()->only(['name','email','password']);
    	$user = \App\User::create($data);
    	$token = JWTAuth::fromUser($user);
    	return response()->json(compact($token));
    }

    public function getAuthenticatedUser()
	{
	    try {

	        if (! $user = JWTAuth::parseToken()->authenticate()) {
	            return response()->json(['user_not_found'], 404);
	        }

	    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

	        return response()->json(['token_expired'], $e->getStatusCode());

	    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

	        return response()->json(['token_invalid'], $e->getStatusCode());

	    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

	        return response()->json(['token_absent'], $e->getStatusCode());

	    }

	    // the token is valid and we have found the user via the sub claim
	    return response()->json(compact('user'));
	}
}