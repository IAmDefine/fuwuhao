<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use Libs\Wechat_accredit;
class Base extends Controller
{
    public function _initialize()
    {
      $wx_userinfo = Session::get('wx_userinfo');
      if(empty($wx_userinfo)){
        //授权后要跳转的地址
        $request = request();
        $url_goal = $request->url();
        Session::set('url_goal',$url_goal);
        //开始授权
        $appid = config('appid');
		    $appsecret = config('appsecret');
        $redirect_uri = config('redirect_uri');
        $wechat = new Wechat_accredit($appid,$appsecret,$redirect_uri);
        $url = $wechat -> get_authorize_url();
        header("Location: $url");die;
      }
    }





}
