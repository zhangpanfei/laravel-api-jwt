<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class MenuController extends Controller
{
    public $api;

    public function __construct(Application $app)
    {
        $this->api = $app->menu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return $menus = $this->api->all();
        return $menus = $this->api->current();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buttons = [
            [
                "type" => "view",
                "name" => "美女图",
                "url"  => "http://image.baidu.com/search/index?tn=baiduimage&ct=201326592&lm=-1&cl=2&ie=gbk&word=%C3%C0%C5%AE%CD%BC%C6%AC&fr=ala&ala=1&alatpl=cover&pos=0&hs=2&xthttps=000000",
            ],
            [
                "name"       => "选择",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "百度",
                        "url"  => "http://www.baidu.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "V1001_GOOD"
                    ],
                    [
                        "type" => "view",
                        "name" => "登录",
                        "url" => "https://4d39dc5b.ngrok.io/auth"
                    ],
                ],
            ],
            [
                "type" => "pic_sysphoto",
                "name" => "自拍发图",
                "key" => "three_btn"
            ]
        ];
        return $this->api->add($buttons);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $id;
    }
}
