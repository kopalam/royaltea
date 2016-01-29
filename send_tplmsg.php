<?php
	//发送模板消息：
	$appId = 'wx4a5705a0d58ff752';
	$appSecrect = '90275d62180bd8653ff32736f6dc03a1';
	$tplId = 'ONTzJifq38XoFfzrMBKrhm-MvGbDgRc4uo_0hHoEWOY';//模板ID；加入已经选好的模板ID
//	$opendId = 'oi2hpt2c-c7DyM1mZJn99reXAFS0';//测试用的接受会员的openid：三一;

    /
	//获取token：
	$access_token = get_weixin_token($appId,$appSecrect);
	// echo $access_token;exit;

	//根据模板的结构，组合模板的发送数据：
	//注意：每一笔发送参数的数据，都包括值和颜色两种参数：
	/*
		$post = array();
		$post['keyword'] = array('value'=>$value,'color'=>'#173177');
	*/

	/*
		{{first.DATA}}
		时间：{{keyword1.DATA}}
		{{remark.DATA}}
	*/

	$post = array();
	$post['first'] = array('value'=>'您的茶品已经制作完成，请到前台拿取！','color'=>'#173177');
	$post['keyword1'] = array('value'=>date("Y-m-d H:i:s"),'color'=>'#173177');
	$post['remark'] = array('value'=>'欢迎您的惠顾！','color'=>'#173177');
	// print_r($post);exit;

	$url = '';//可选参数，填上用户可以点击模板消息访问该链接；
	//发送模板消息：
	$rs = send_tpl_msg($opendId,$tplId,$url,$post,$access_token);
	print_r($rs);
	//返回数据的结构：
	/*
		//成功返回以下数据：errcode>0表示有错误
		Array
		(
		    [errcode] => 0
		    [errmsg] => ok
		    [msgid] => 402190050
		)

	*/


	//相关的函数区：
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

	//获取access token：
	function get_weixin_token($appId,$appSecrect){
		
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecrect}";
		$return = file_get_contents($url);
		$return = json_decode($return);
		$access_token = $return -> access_token;
		// echo $access_token;exit;
		return $access_token;

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
