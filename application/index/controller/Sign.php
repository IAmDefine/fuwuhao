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

    //资料审核失败页面
    public function defeated()
    {
          $request = Request::instance();
          $id = $request->only(['sid'])['sid'];
          $url ='/inter/star/startinfolook';
          $data['id'] = $id;
          $res = request_post($url,$data);
          if($res['status']==1){
              $s['id'] = $res['data']['id'];
              $s['checkdesc'] = $res['data']['checkdesc'];
              $this->assign('s',$s);
              return view('msg');
          }
    }

    //代理个人合同
    public function per_contract()
    {
      // $signtype = Session::get('sign');
      // $this->assign('sign',$signtype);
      return view();
    }

    //查看是否有签约数据
    public function con_data()
    {
      $sid = Session::get('sid');
      $url = '/inter/star/agreelist';
      $data['sid'] = $sid;
      $res = request_post($url,$data);
      if($res['status']==1){
        return 1;
      }else{
        return 0;
      }
    }

    public function sign_agency()
    {
      $sid = Session::get('sid');
      $url = '/inter/star/startinfolook';
      $data['id'] = $sid;
      $res = request_post($url,$data);
      if($res['status']==1){
        $this->assign('sinfo',$res['data']);
        return view();
      }
    }

    //提交签约数据
    public function signup()
    {
      $sid = Session::get('sid');
      $post_info = array_filter($_POST);
      $post_info['id'] = $sid;
      $url = '/inter/star/startinfoedit';
      request_post($url,$post_info);
      //添加合同
      $url = '/inter/star/addagree';
      $data['sid']= Session::get('sid');
      $s = Session::get('sign');
      $data['type'] = $s['ctype'];
      $data['signtype'] = $s['signtype'];
      $data['states'] = 1;
      $res = request_post($url,$data);
      if($res['status']==1){
        return 1;
      }else{
        return 0;
      }
    }

    //合同详情
    //合同详情页面
    public function contractinfo()
    {
      $sid = !empty(Session::get('sid'))?Session::get('sid'):'';
      if($sid){
        $url ='/inter/star/agreelist';
        $data['sid'] = $sid;
        $res = request_post($url,$data);
        // dd($res[status]);
        if($res['status']==1){
        $this->assign('contractinfo',$res['data']['data'][0]);
        }
      }else{
        $this->assign('contractinfo','');
      }
      return view();
    }


}
