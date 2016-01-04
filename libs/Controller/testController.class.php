<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 15/12/18
 * Time: 下午1:48
 */
//控制器 testController.class.php

    class testController{
        function show(){
            $testModel = new testModel();
            $data = $testModel->get();
            $testView = new testView();
            $testView->display($data);
        }
    }