<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class AuthController extends Controller
{
	public static $api;
	public function __construct(Application $app)
	{
		self::$api = $app->oauth;
	}
    //
    public function index()
    {
    	$response = self::$api->scopes(['snsapi_userinfo'])
                          ->redirect();
        return $response;
    }
}
