<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/9
 * Time: 下午1:42
 */
    require_once 'include.php';
    require_once './func/get_token.php';

    if(isset($_REQUEST['sid'])){

        $sid = $_REQUEST['sid'];
        $num = $_REQUEST['num'];
        $store = $_SESSION['store'];
        $sql = "SELECT * FROM `ticket` WHERE `num` ='{$num}' AND `finish`='0' LIMIT 1 ";
        $res = new royaltea();
        $res = $res->fetch_array($sql);
        $tid = $res['tid'];
//        print_r($res);
        $update = "UPDATE `ticket` SET `finish`='1' WHERE `tid`='{$tid}'   LIMIT 1 ";
        $query1 = mysql_query($update);
//        print_r($query1);exit;
        //遍历一遍，对比
        $finish = new user();
        $url = 'single.php?id='.$sid . '&store='.$store;
//       $finish = $finish->sucess($url,$query1);

        //--------获取token
        $appId = trim('wx4a5705a0d58ff752');
        $appSecret =trim('a3d6e50f86a17fb5f9d0f5265d711d99');
//        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";
//        $return = file_get_contents($url);
//        $return = json_decode($return);
//        $access_token = $return -> access_token;
        $access_token = get_weixin_token($appId,$appSecret);
//        print_r($access_token);exit;

        $tplId = 'mO_PQdRgUhJCiQqhe4sCJ4W2qWRPw7uELX0F6xsJqHQ';//模板ID
        $ticket_sql = "SELECT * FROM `ticket` WHERE `tid` = {$tid} AND `finish` = '1' LIMIT 1";
        $ticket_query = mysql_query($ticket_sql);
        $ticket = mysql_fetch_array($ticket_query);
        $ticket['num'] = str_pad($ticket['num'],5,'0',STR_PAD_LEFT);

        $post = array();
        $post['first'] = array('value'=>"您的茶已经新鲜做好，enjoy！\r\n",'color'=>'#000');
        $post['keyword1'] = array('value'=>$ticket['num'],'color'=>'#000');
        $post['keyword2'] = array('value'=>"皇茶见！",'color'=>'#000');
        $post['remark'] = array('value'=>"感谢您的耐心等待",'color'=>'#000');

        $url = '';//可选参数，填上用户可以点击模板消息访问该链接；
        //发送模板消息：
        $rs = send_tpl_msg($ticket['openid'],$tplId,$url,$post,$access_token);
//         print_r($rs);exit;

       exit;





    }
//发送微信模板消息：
function send_tpl_msg($touser,$tpl_id,$url,$data,$access_token){
    //发送模板消息：
    $post = array();
    $post['touser'] = $touser;//openid;
    $post['template_id'] = $tpl_id;
    $post['url'] = $url;
    $post['data'] = $data;//数据；
    // print_r($post);exit;
    $data = json_encode($post);

    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$access_token}";
    $result = postData($url, $data);
    // print_r($result);exit;
    $rs = json_decode($result,true);
    return $rs;
}


function postData($url, $data)
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

////获取access_token,get方式 file_get_connects($url).
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