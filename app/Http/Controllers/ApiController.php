<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    private static $message = '';
    private static $statusCode = '';
    private static $data;
    private static $error;

    public function responseNotFound($msg='Not Found')
    {
    	$this->message('failed');
    	$this->statusCode(404);
    	$this->error([
    			'error' => $msg, 
    		]);
    	return self::responseError();
    }

    public function responseError()
    {
    	return \Response::json([
    		'message' => self::$message ?: 'failed',
    		'status_code' => self::$statusCode ?: 404,
    		'error' => self::$error ?: [
    			'error' => 'error',
    		],
    	]);
    }

    public function response($data)
    {
    	return \Response::json([
    			'message' => self::$message ?: 'success',
	    		'status_code' => self::$statusCode ?: 200,
	    		'data' => $data,
    		]);
    }


    public function __call($name,$param)
    {
    	//dd(func_get_args());
    	self::$$name = current($param);
    	return $this;
    }




}
