<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Foundation\Application;

class WechatUserController extends Controller
{
    //
    public $wechat;

    public function __construct(Application $wechat)
    {
    	$this->wechat = $wechat;
    }

    public function index()
    {
        //dd(get_class($this->wechat->user));
    	return $this->wechat->user->lists();
    }

    public function show($openid)
    {
        $user = $this->wechat->user->get($openid);
        return $user;
    }

    public function remark($openid,$remark)
    {
        return $this->wechat->user->remark($openid,$remark);
    }

    public function edit($openid)
    {
        $type = request()->get('type');
        $res = false;
        $type == 'remark' and $res = $this->remark($openid,request()->get('remark'));

        return $res;
    }

}
