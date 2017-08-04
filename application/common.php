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
