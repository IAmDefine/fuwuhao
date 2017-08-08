<?php
// 应用公共文件
//调用接口函数，包括加密数据字段
function request_post($url = '', $post_data = '') {
    if (empty($url)) {
        return false;
    }
    $post_data['timestr'] = time();
    $post_data['md5str'] = md5($url . time() . config('md5key'));
    $url = config('apidomain') . $url;
    $o = "";
    if (!empty($post_data)) {
        foreach ($post_data as $k => $v) {
            $o .= "$k=" . urlencode($v) . "&";
        }
        $post_data = substr($o, 0, -1);
    } else {
        $post_data = '';
    }
    $postUrl = $url;
    $curlPost = $post_data;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $postUrl);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    $data = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($data, true);
    return $data;
}

  //签约用
  function get_api($url,$post_data=''){

      $o = "";
      if(!empty($post_data)){
          foreach ($post_data as $k => $v) {
              $o .= "$k=" . urlencode($v) . "&";
          }
          $post_data = substr($o, 0, -1);
      }else{
          $post_data='';
      }
      $postUrl = $url;
      $curlPost = $post_data;
      $ch = curl_init(); //初始化curl
      curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页
      curl_setopt($ch, CURLOPT_TIMEOUT,60);
      curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
      curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
      curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
      $data = curl_exec($ch); //运行curl
      curl_close($ch);
      $data = json_decode($data,true);
      return $data;
  }
