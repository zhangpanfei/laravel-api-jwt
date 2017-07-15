<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Image;
use EasyWeChat\Message\Article;
use EasyWeChat\Message\Material;
use EasyWeChat\Message\News;

class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve(Application $api)
    {
    	//Log::info(file_get_contents('php://input'));
    	
		// 从项目实例中得到服务端应用实例。
		$server = $api->server;
    	
        $server->setMessageHandler(function ($message) use ($api) {
		    switch ($message->MsgType) {
		        case 'event':
		        	if($message->Event == 'CLICK'){
		        		if($message->EventKey = 'V1001_GOOD'){
		        			return '谢谢赞赏';
		        		}
		        		return '点击事件';
		        	}
		            return '收到事件消息';
		            break;
		        case 'text':
		        	if($message->Content=='news'){
		        		$news = new News([
					        'title'       => 'news',
					        'description' => '暂无',
					        'url'         => 'http://www.baidu.com',
					        'image'       => 'http://mmbiz.qpic.cn/mmbiz_jpg/NtyQOZX0ow9RnGMpALUDboF8YEhpAyPNzLLmaxjXy2tvX0kjTgicCk7NO1u8WpuY2nmBwRkS6ickwIsic5Hk2lmqg/0?wx_fmt=jpeg',
					        // ...
					    ]);
		        		$api->staff->message($news)->to($message->FromUserName)->send();
		        	}

		            return '收到文字消息';
		            break;
		        case 'image':
		        	$mediaId = 'OsOU2mwY8dlxW7vl04DGFu2G7KE7eP1qeZxCZo1chJs';
		        	return $text = new Image(['media_id' => $mediaId]);
		            return '收到图片消息';
		            break;
		        case 'voice':
		            return '收到语音消息';
		            break;
		        case 'video':
		            return '收到视频消息';
		            break;
		        case 'location':
		            return '收到坐标消息';
		            break;
		        case 'link':
		            return '收到链接消息';
		            break;
		        // ... 其它消息
		        default:
		            return '收到其它消息';
		            break;
		    }
		    // ...
		});
    }

    public function __destruct()
    {
    	$response = app('wechat')->server->serve();
		// 将响应输出
		$response->send(); // Laravel 里请使用：return $response;

    }
}
