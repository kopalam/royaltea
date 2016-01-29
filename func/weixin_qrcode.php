<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/26
 * Time: 下午5:54
 */

class weixin_qrcode extends user{

    function https_post($url,$data = null){
        $curl =curl_init();
        curl_setopt($curl,CURLPT_URL,$url);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);

        if(!empty($data)){
            curl_setopt($curl,CURLOPT_POST,1);
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        }
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

}

$weixin_qrcode = new weixin_qrcode();
$access_token = '';
//临时二维码
$qrcode = '{"expire_seconds":1800,"action_name":"QR_SCENE","action_info":{"scene":{"scene_id":10000}}}';

$url ="https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token={$access_token}";
$result = $weixin_qrcode->https_post($url,$qrcode);
$jsoninfo = json_decode($result,true);
$ticket = $jsoninfo('ticket');



