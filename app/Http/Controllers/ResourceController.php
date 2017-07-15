<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Article;

class ResourceController extends Controller
{
    //
    public $api;
    public $broadcast;

    public function __construct(Application $app)
    {
    	$this->api = $app->material;
    	$this->broadcast = $app->broadcast;
    }

    public function image()
    {
    	$path = './img/2.gif';
    	$res = $this->api->uploadImage($path);
    	return $res;
    }
    public function getImage()
    {
    	return $this->api->lists('image');
    }

    public function upArticle()
    {
    	// 上传单篇图文
		$article = new Article([
		    'title' => '你猜',
		    'thumb_media_id' => 'OsOU2mwY8dlxW7vl04DGFu2G7KE7eP1qeZxCZo1chJs',
		    'author' => 'zz',
		    'content' => str_random(100),
		    'url' => 'http://www.baidu.com',
		    //...
		  ]);
		$res = $this->api->uploadArticle($article);
		return $res;
    }
    public function getArticle()
    {
    	return $this->api->lists('news');
    }

    public function sendAll()
    {
    	$mediaId = 'OsOU2mwY8dlxW7vl04DGFini-RrjkbC09oAD745iugg';
    	//return $this->broadcast->send('news',$mediaId);
    	//return $this->broadcast->sendText("大家好1！欢迎使用 EasyWeChat。");
    	return $this->broadcast->sendImage($mediaId);
    }
}
