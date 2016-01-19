<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/18
 * Time: 下午4:26
 */
//通过参数形式连接数据库
 try{
     $dsn = 'mysql:host=localhost;dbname=royaltea';
     $username = 'root';
     $password = 'root';
     $pdo = new PDO($dsn,$username,$password);
    var_dump($pdo);
 }catch (PDOException $e){
     echo $e->getMessage();
 }

