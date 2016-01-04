
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wopop</title>

<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="login">
<form action="reg.php" method="post">
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

			<div class="rem_sub">

				<label>
					<input type="submit" class="sub_button" name="submit" id="button" value="注册" style="opacity: 0.7;">
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

    require_once 'include.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO `user`(`id`,`username`,`password`) VALUE (null,'{$username}','{$password}')";
        $query = mysql_query($sql);

        if($query){
            echo '<script language="javascript">
                        alert("添加成功！！");
                        location.href="login.php";
                        </script> ';
        }else{
            echo "操作失败";
        }





    }

?>


