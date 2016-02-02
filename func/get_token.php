<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/31
 * Time: 下午6:34
 */

function get_weixin_token($appId,$appSecrect,$force=0){

    if (!$appId || !$appSecrect){
        return false;
    }
    $pathPre = 'd:\public_html\hc.imchaotan.com';//文件路径的前缀；
    $tokenTmpPath = $pathPre . '\tmp\access_token.tmp';
    $tokenObj = '';
    $update = 1;//是否需要更新accesstoke：
    if (file_exists($tokenTmpPath)){
        $tokenObj = @file_get_contents($tokenTmpPath);
    }
    // echo $tokenObj;exit;

    if ($tokenObj){
        $tokenObj = json_decode($tokenObj);
        // echo $update;
        // print_r($tokenObj);exit;

        //access token在有效期内：
        if ($tokenObj->access_token && time() < $tokenObj->expires_time ){
            //token存在，则不用再更新：
            $update = 0;
        }
        $return = $tokenObj;
    }
    // echo $update;exit;

    //强制更新：
    if ($force){
        $update = 1;
    }

    //需要更新access token:
    if ($update){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecrect}";
        $return = file_get_contents($url);
        $return = json_decode($return);

        //写入缓存：
        if ($return->access_token){
            $return->expires_time = time()+$return->expires_in;
            $body = json_encode($return);
            $fp = @fopen($tokenTmpPath, w);
            fwrite($fp, $body);
            fclose($fp);
        }
    }
    // print_r($return);exit;
    // echo $access_token;exit;
    return $return->access_token;

}