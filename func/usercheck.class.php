<?php
//require_once '../include.php';
session_start();
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/7
 * Time: 下午6:19
 */
//用户操作和验证的类库
class user
{

    function user_check($user,$result)
    {
        //$result 存入的是遍历数据表后的数组，$user存入的是用户输入的账号密码
        //数组与数组配对,如果都匹配，最后看groups是否为0来进行判断
        if ($user['username']= $result['username']) {
            if($user['password'] = $result['password']) {
                if ($result['groups'] == 0) {
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['groups'] = $result['groups'];
                    $_SESSION['id'] = $result['id'];

                    //echo $_SESSION[username];
                    echo '<script language="javascript">
                        alert("登录成功！！");
                        location.href="cm/index.php";
                        </script> ';

                } elseif ($result['groups'] == 1) {
                    //如果判断组别是1，则为店员。店员跳转到所属的门店
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['groups'] = $result['groups'];
                    $_SESSION['store'] = $result['store'];
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['dayinjisn'] = $result['dayinjisn'];
                    //把网址主要参数录入变量
                    $url = 'line.php?id=' . $result['id'] . '&store=' . $result['store'].'&dayinjisn=' . $result['dayinjisn'];
                    //使用此方法直接跳转
                    echo "<script>location.href='$url';</script>";
                } elseif ($result['groups'] == 2) {
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['groups'] = $result['groups'];
                    $_SESSION['store'] = $result['store'];
                    $_SESSION['id'] = $result['id'];
                    //把网址主要参数录入变量
                    $url = 'single.php?id=' . $result['id'] . '&store=' . $result['store'];
                    //使用此方法直接跳转
                    echo "<script>location.href='$url';</script>";
                }
            }
                }else{
                echo '账号/密码错误';
                }
    }

    //出票和打印函数

    function single($sid){
        //single 出单操作
        if(isset($sid)) {
            $tid = null;
            $username = $_SESSION['username'];
            $store = $_SESSION['store'];
            $finish = 0;
            $dates = date("Y-m-d H:i:s", time());

            //$num 存储的是排号的号数,采用session存储和写入
            $num = isset($_SESSION['num']) ? $_SESSION['num'] + 1 : 1; //检测是否存在session，若存在，将变量的值设为该session+1，否则初始化为1
            if ($num >= 500) {
                $num = 1;
            }
            $_SESSION['num'] = $num;

            $sql = "INSERT INTO `ticket` (`tid`,`num`,`username`,`store`,`finish`,`dates`) VALUES('{$tid}','{$num}','{$username}','{$store}','{$finish}','{$dates}')";
            $query = mysql_query($sql);

            //订单id

            $dingdanID=array();
            while(count($dingdanID)<5)
            {
                $dingdanID[]=rand(1,5);
                $dingdanID=array_unique($dingdanID);
            }

            //打印机api
            $url = 'line.php?id='.$sid . '&store='.$store; //跳转到原来页面
            $post = 'http://42.121.124.104:60002';//POST指向的API链接
            $dingdan = '<1B40><1B40><1B40><1D2111><1B6101>美西西皇茶<0D0A><0D0A><1B6100><1D2100><0D0A>
                        <1D2111><1B6101>你的单号是'.$num.'<0D0A><0D0A><1B6100><1D2100><0D0A>
                        <1B2A>http://'.$_SERVER['HTTP_HOST'].'/royaltea'.'/waiting.php?'.'num='.$num.'&store='.$store.'<1B2A>'; //二维码内容
            $dayinjisn =$_SESSION['dayinjisn'];
            $dingdanID = implode("",$dingdanID);
            $pages = 1;
            $replyURL = 'http://42.121.124.104:60002';
            $data = array(
                'dingdanID'=>'dingdanID='.$dingdanID, //订单号
                'dayinjisn'=>'dayinjisn='.$dayinjisn, //打印机ID号
                'dingdan'=>'dingdan='.$dingdan, //订单内容
                'pages'=>'pages='.$pages, //联数
//        'qrcode'=>'qrcode='.$qrcode,
                'replyURL'=>'replyURL='.$replyURL); //回复确认URL
            $post_data = implode('&',$data);
            $result = $this->postData($post,$post_data);
            echo $result;

            //如果执行成功
            if($query){
                echo "<script language='javascript'>
                        alert('出单成功');
                        location.href='$url';
                        </script> ";




            }else{
                echo "<script language='javascript'>
                        alert('出单失败');
                        location.href='$url';
                        </script> ";
            }
        }

    }

    function sucess($url,$query){
        if($query){
            echo "<script>location.href='$url';</script>";
              return $query;
        }else{
            echo "<script language='javascript'>
                        alert('失败');
                        location.href='$url';
                        </script> ";
        }
    }

    function postData($url, $data)
    {
        $ch = curl_init();
        $timeout = 300;
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转 （很重要）
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, "http://127.0.0.1/");   //构造来路
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        //ob_start();
        $handles = curl_exec($ch);  //获取返回结果
        //$result = ob_get_contents() ;
        //ob_end_clean();
        //close connection
        curl_close($ch);
        //return $result;
        return $handles;
    }


}