<?php

    require_once 'include.php';
    if(!empty($_SESSION['username'])){
            echo '<script language="javascript">
                        alert("你已经登陆！！");
                        location.href="cm/index.php";
                        </script> ';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wopop</title>

<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="login">
<form action="login.php" method="post">
<div class="login_m">
	<div class="login_logo"><img src="images/logo.png" width="196" height="46"></div>
	<div class="login_boder">
		<div class="login_padding">
			<h2>名称:</h2>
			<label>
				<input type="text" id="username" name="username" class="txt_input txt_input2" >
			</label>
			<h2>密码</h2>
			<label>
				<input type="password" name="password" id="userpwd" class="txt_input">
			</label>
			<p class="forgot"><a href="javas
			cript:void(0);">忘记密码?</a></p>
			<div class="rem_sub">
				<div class="rem_sub_l">
					<input type="checkbox" name="checkbox" id="save_me">
					<label for="checkbox">记住</label>
				</div>
				<label>
					<input type="submit" class="sub_button" name="submit" id="button" value="登录" style="opacity: 0.7;">
				</label>
			</div>
		</div>
	</div><!--login_boder end-->
</div><!--login_m end-->
</form>
<br />
<br />

<p align="center"> 潮叹江门 </p>

</body>
</html>

<?php

//使用session 记录，groups ＝ 0 为管理员，跳转到管理员后台。groups ＝ 1，为员工，员工跳转到对应门店的页面
//

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $array = $_POST;//array 是获取过来的数组
        unset($array['submit']);
        $array['password']=md5($array['password']);
//       print_r($array);
        echo '<br>';
        $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}'";
        $query = mysql_query($sql);
        $res = mysql_fetch_array($query);
//        print_r($res['password']);
//
        $user = new user();
        $user = $user->user_check($array,$res);


    }


?>


