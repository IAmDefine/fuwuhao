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
      $url = '/inter/star/startinfolook';
      $data['id'] = $sid;
      $res = request_post($url,$data);
      //生成文签id
      if(!$res['data']['wquid']){
        $mobile = Session::get('wx_userinfo')['mobile'];
        $a = $this->createwquid($res['data'],$mobile,$sid);
        if($a['status']!=1){
          return $a;
        }
      }
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
        return array('msg'=>'ok','status'=>'1');
      }else{
        return array('msg'=>'申请失败!','status'=>'3');
      }
    }

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

    //开始签约
    public function begin()
    {
      return 22;
    }

    //创建文签uid和印章
    private function createwquid($data,$mobile,$sid)
    {
      if($data['credtype']==3){
        $url = 'https://api.youxingku.cn/signpact/regperson.php';
        $wquid = 'u'.$mobile;
        $data = array('uid'=>$wquid,'uname'=>$data['oldname'],'uphone'=>$mobile,'ucode'=>$data['idno']);
        $res = get_api($url,$data);
        if($res['status']==1){
          //生成签名
          $url = 'https://api.youxingku.cn/signpact/genpersonstamp.php';
          $postdata['uid'] = $wquid;
          $re = get_api($url,$data);
          $stampid = $re['data']['stamp'];
          $wqinfo = array('msg'=>'ok','status'=>'1');

          //写入数据库
          $url ='/inter/star/startinfoedit';
          $edata['id'] = $sid;
          $edata['wquid'] = $wquid;
          $edata['stampid'] = $stampid;
          $res = request_post($url,$edata);
          if($res['status']==1){
            return $wqinfo;
          }else{
            return array('msg'=>'生成公章失败！','status'=>'3');
          }
        }else{
          return array('msg'=>$res['msg'],'status'=>3);
        }

      }else{

        $url = 'https://api.youxingku.cn/signpact/regbiz.php';
        $wquid = 'b'.$mobile;
        $data = array('bizid'=>$wquid,'bizname'=>$data['bizname'],'bizcode'=>$data['compno'],'workname'=>$data['oldname'],'workphone'=>$mobile,'workid'=>$data['idno']);
        $res =get_api($url,$data);
          if($res['status']==1){
          //生成签名
          $url = 'https://api.youxingku.cn/signpact/genbizstamp.php';
          $postdata['uid'] = $wquid;
          $re =get_api($url,$postdata);
          $stampid = $re['data']['stamp'];
          $wqinfo = array('msg'=>'ok','status'=>'1');

          //写入数据库
          $url ='/inter/star/startinfoedit';
          $edata['id'] = $sid;
          $edata['wquid'] = $wquid;
          $edata['stampid'] = $stampid;
          $res = request_post($url,$edata);
          if($res['status']==1){
            return $wqinfo;
          }else{
            return array('msg'=>'生成公章失败！','status'=>'3');
          }
        }else{
          return array('msg'=>$res['msg'],'status'=>3);
        }
      }

    }

}
