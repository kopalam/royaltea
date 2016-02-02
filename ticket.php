<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/8
 * Time: 下午6:15
 */
    //出票处理
require_once ('include.php');
//require_once ('send_tplmsg.php');

if(isset($_REQUEST['sid'])){

    $user = new user();
    //打印小票机参数
    $sid = $_REQUEST['sid'];
    $store = $_SESSION['store'];

//    print $sid;


    $ticket = $user->single($sid);
}


//获取access_token,get方式 file_get_connects($url).
//function get_weixin_token($appId,$appSecret){
//
//    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";
//    $return = file_get_contents($url);
//    $return = json_decode($return);
//    $access_token = $return -> access_token;
////     echo $access_token;exit;
//    return $access_token;
//
//}

//post方式生成临时二维码
function postWeixinData($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
//    curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

//将图片数据保存为一个文件
function downloadImageFromWeixin($url){
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_HEADER);
    curl_setopt($ch,CURLOPT_NOBODY);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $package = curl_exec($ch);
    $httpinfo = curl_getinfo($ch);
    curl_close($ch);
    return array_merge(array('body'=>$package),array('header'=>$httpinfo));
}

function getShort($short_api,$need_url){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$need_url);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,POST);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch,CURLOPT_AUTOREFERER,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$short_api);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $tmpInfo = curl_exec($ch);
    if(curl_errno($ch)){
        return curl_error($ch);
    }
    curl_close($ch);
    return $tmpInfo;

}