<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 15/12/27
 * Time: 下午3:30
 */

    require_once '../include.php';
    if(isset($_GET['sid'])){
        $sid = $_GET['sid'];
        $sql = "SELECT * FROM `store` WHERE `sid` = '{$sid}' LIMIT 1";
        $query = mysql_query($sql);
        $result = mysql_fetch_array($query);

    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>修改门店</title>

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="icon/font-awesome.css" rel="stylesheet">


    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.html">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.html">
                    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.html">


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body  style="background-color:#FFF !important; margin:20px;">



                        <div class="well brown">
                         <form action="add.php" method="post">
                            <div class="form_list"><label class="lable_title">门店名称</label><input class="form_input" name="name" type="text" value="<?php echo $result['name'] ?>"/></div>
                            <div class="form_list"><label class="lable_title">所在城市</label>
                            <select style="width:150px; margin-left:15px;" name="address">
                                <option selected><?php echo $result['address'] ?></option>
                                <option>江门市</option>
                              <option>中山市</option>
                              <option>广州市</option>
                              <option>深圳市</option>
                              <option>惠州市</option>
                              <option>东莞市</option>
                            </select>
                            </div>

                            <div class="form_list"><input type="submit" name="submit" class="submit" value="&nbsp;&nbsp;提&nbsp;&nbsp;交&nbsp;&nbsp;"></div>
                         </form>


                        </div>


    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui-1.10.3.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="js/flatpoint_core.js"></script>

  </body>
</html>