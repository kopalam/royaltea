<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 15/12/26
 * Time: 下午2:56
 * 函数处理增删改查
 */
class royaltea{
    private $tablename;
    private $array;
    private $where;
    private $sid;

    function __construct($tablename,$array,$where,$sid){
        $this->tablename = $tablename;
        $this->array = $array;
        $this->where = $where;
        $this->sid = $sid;
    }


    //插入数据库信息
    function insert($table,$array)
    {
        //insert 语句 insert into tablename (`array1`...) VALUE ('array1'...);
        $keys = "`" . implode("`,`", array_keys($this->array)) . "`";//调取数组中的键值
        $values = "'" . implode("','", array_values($this->array)) . "'";//调取数组中的键名

        $sql = "INSERT INTO {$this->tablename}({$keys}) VALUES($values)";
        $query = mysql_query($sql);
//        print_r($sql);
        //return mysql_insert_id();
        if ($query) {
            echo '录入成功';
        } else {
//            echo '录入失败' . mysql_error();
            echo $sql.mysql_error();
        }
    }
    function select($tablename,$array,$where)  {
        //查询信息 SELECT * FROM tablename Where .....
        foreach ($this->array as $key => $value) {
            $select[]='`'.$key.'`='.$value;
        }
        $select = implode(' and ',$select);
        $select = $select==null?null:$slect;
        $where = $this->where ==null?null:$this->where;
        $sql = "SELECT * FROM {$this->tablename}".$where.' '.$select;
    }

    function update($table,$array,$where=null){
        foreach($array as $key =>$value ){
            $string[]='`'.$key.'`='.$value;
        }
        $string = implode(',',$string);
        $where = $where ==null?null:"where".$where;
        $sql = "UPDATE '{$table}' set ".$string.' '.$where;
        print_r($sql);
//        $query = mysql_query($sql);
//        return $query;
    }

    function del($tablename,$sid){

        $sql = "DELETE FROM $this->tablename WHERE `sid` = '{$sid}' LIMIT 1";
        $query = mysql_query($sql);
        if($query){
            header('location:list.php');
        }else{
            echo '录入失败'.mysql_error();
        }
    }

    function totalRow($sql){
        $query = mysql_query($sql);
        $result = mysql_num_rows($query);
        return $result;
    }

    function fetch_array($sql){
        $query = mysql_query($sql);
        $result = mysql_fetch_array($query);
        return $result;
    }


}