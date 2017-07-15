<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    //return view('welcome');
    dd(\Route::current());
});

Route::resource('/post','PostController');

Route::group(['prefix'=>'/api/v1/'],function(){
	Route::resource('lession','LessionController');
});*/

/*$api = app('Dingo\Api\Routing\Router');

$api->version('v1',function($api){
	$api->group(['namespace'=>'App\Api\Controllers'],function($api){
		$api->get('auth','AuthController@authenticate');
		$api->post('register','AuthController@register');
		$api->group(['middleware'=>'jwt.auth'],function($api){
			$api->get('lession','LessionController@index');
			$api->get('lession/{id}','LessionController@show');
			$api->get('auth/user','AuthController@getAuthenticatedUser');
		});
	});
});*/

/*Auth::loginUsingId(1);
Route::get('oauth/authorize', ['as' => 'oauth.authorize.get', 'middleware' => ['check-authorization-params'], function() {
	
   $authParams = Authorizer::getAuthCodeRequestParams();

   $formParams = array_except($authParams,'client');

   $formParams['client_id'] = $authParams['client']->getId();

   $formParams['scope'] = implode(config('oauth2.scope_delimiter'), array_map(function ($scope) {
       return $scope->getId();
   }, $authParams['scopes']));

   return view('oauth.authorization-form', ['params' => $formParams, 'client' => $authParams['client']]);
}]);

Route::post('oauth/authorize', ['as' => 'oauth.authorize.post', 'middleware' => ['csrf', 'check-authorization-params'], function() {

    $params = Authorizer::getAuthCodeRequestParams();
    $params['user_id'] = Auth::user()->id;
    $redirectUri = '/';

    // If the user has allowed the client to access its data, redirect back to the client with an auth code.
    if (Request::has('approve')) {
        $redirectUri = Authorizer::issueAuthCode('user', $params['user_id'], $params);
    }

    // If the user has denied the client to access its data, redirect back to the client with an error message.
    if (Request::has('deny')) {
        $redirectUri = Authorizer::authCodeRequestDeniedRedirectUri();
    }

    return Redirect::to($redirectUri);
}]);

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});*/

Route::get('/',function(){
	return 'ok';
});

Route::any('/wechat', 'WechatController@serve');

Route::resource('/user','WechatUserController');

Route::get('upimg','ResourceController@image');
Route::get('getimg','ResourceController@getImage');
Route::get('upnews','ResourceController@upArticle');
Route::get('getnews','ResourceController@getArticle');
Route::get('send','ResourceController@sendAll');
Route::resource('menu','Wechat\MenuController');
Route::resource('auth','Wechat\AuthController');
