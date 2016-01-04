<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 15/12/27
 * Time: 下午4:53
    分页类
 */
class page{

    private $total; //总记录
    private $pagesize; //每页显示条数
    private $limit;
    private $page; //当前页码
    private $pagenum; //总页码
    private $url; //地址
    private $bothnum; //两边保持数字分页的量

    //构造方法初始化
    public  funtion __construct($_total,$_pagesize){
    $this->total = $_total?$total:1; //如果总记录大于1就等于总记录，否则酒等于1
    $this->pagesize = $_pagesize;
    $this->pagenum = ceil($this->total/$this->pagesize);
    $this->page = $page;
    $this->limit = "LIMIT".($this->page-1)*$this->pagesize.",$this->pagesize";
    $this->url = $this->seturl();
    $this->bothnum = 2;
}

//拦截器
    private function __get($_key){
    return $this->key;
}
    //获取当前页码
    private funtion setPage(){
    if(!empty($_GET['page'])){//如果获取的page参数不是为空
    if($_GET['page'] > 0){
        if($_GET['page'] > $this->pagenum){
            return $this->pagenum;
        }else{
            return $_GET['page'];
        }
    }else{
        reutrn 1;
    }

    }else{
        return 1;
    }
  }
    //获取地址
    private function setUrl(){
    $_url = $_SERVER['$_REQUEST_URI'];
    $_par = parse_url($_url);;
    if(isset($_par['query'])){
        parse_str($_par['query'],$_query);
        unset($_query['page']);
        $_url = $par['path'].'?'.http_build_query($_query);
    }
    return $_url;
}
    private funtion pagelist(){
        //数字目录
        for($i=$this->bothnum;$i>=1;$i--){
            $_page = $this->page-$i;
                if($_page<1) continne;
            $_pagelist .= '<a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a>';
        }
            $_pagelist .= '<span class="me">'.$this->page.'</span>';

    }

}
