<?php

$dingdanID=array();
while(count($dingdanID)<5)
{
    $dingdanID[]=rand(1,5);
    $dingdanID=array_unique($dingdanID);
}
echo implode("",$dingdanID);


