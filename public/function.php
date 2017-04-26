<?php


function https_request($url,$data = null)
{
    // curl 初始化
    $curl = curl_init();

    // curl 设置
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  // 查看ssl 证书节点
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);  // 查看ssl 证书主机
    // 判断有没有 data 如果有data 我们就是post
    if ( !empty($data) ) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // 执行
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;

}




















?>