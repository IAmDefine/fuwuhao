<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use \think\Request;
class Sign extends Base
{
    //合作代理
    public function agency()
    {
      return view();
    }


    //我的页面
    public function myinfo()
    {
        $wx_userinfo = Session::get('wx_userinfo');
        $uid = $wx_userinfo['uid'];
        $mobile = $wx_userinfo['mobile'];
        $data['uid'] = $uid;
        $url = '/inter/star/startinfolook';
        $starinfo = request_post($url,$data);
        if($starinfo['status']==3){
          $this -> assign('wx_userinfo',$wx_userinfo);
          return view();
        }else{
           $this->assign('statrinfo',$starinfo['data']);
           $this -> assign('wx_userinfo',$wx_userinfo);
           return view();
        }


    }




}
