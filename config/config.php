<?php


	class mysql{

		private $conn;
		private $db_host;
		private $db_user;
		private $db_password;
		private $db_name;

		function __construct($db_host,$db_user,$db_password,$db_name){
			//构造函数，传入connect函数中
			$this->db_host = $db_host;
			$this->db_user = $db_user;
			$this->db_password = $db_password;
			$this->db_name = $db_name;
			$this->connect();
		}

		function connect(){
			//数据库连接函数
			$this->conn = mysql_connect($this->db_host,$this->db_user,$this->db_password) or die("数据库连接失败".mysql_errno().":".mysql_error());
			mysql_select_db($this->db_name,$this->conn) or die('打开数据库失败'.mysql_errno());
			mysql_set_charset('utf8');
			return $this->conn;
		}

		function S($tb_name,$array,$where=null){
			//语句:select * from table where `user`=$user ....
			foreach ($array as $key => $value) {
				//拆解: `user` = $user
				$select[] = '`'.$key.'`='.$value;
			}
			$select = implode(' and ', $select);
			//如果where为空，那就为空，否则，就等于输入的字符串
			$where = $where == null?null:$where;
			$sql = 'SELECT * FROM {$table} where'.$select.' '.$where;
			// return $sql;
			print_r ($sql);
		}

		function fetch_array($sql){
			$query = mysqli_query($sql);
			$res = mysqli_fetch_array($query);
			return $res;

		}

	}
$db = new mysql("localhost",'root','root','royaltea');



?>