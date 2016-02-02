<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/29
 * Time: 下午11:10
 */
require_once '../include.php';

$access_token = $_SESSION['access_token'];
//print_r($access_token);


//获取用户opnid
$open_Id = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid=OPENID&lang=zh_CN";
$Get_openId = file_get_contents($open_Id);
var_dump($Get_openId);
//var_dump($post_url);

//发送模板消息
$url = "https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token={$access_token}";
$tpl_Id = trim('ONTzJifq38XoFfzrMBKrhm-MvGbDgRc4uo_0hHoEWOY');
$post_url = postData($url,$tpl_Id);

function postData($url,$data)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}