<?php
echo strtotime('+3 hour');
echo "<br/>";
// echo time();
include './ThreadClass.php';
//创建两个线程
$chG = new Request("http://www.qq.com");
$chB = new Request("http://www.baidu.com");
$chG ->start();
// var_dump($chB ->start());
$chG->join();
$chB->join();

$gl = $chG->response;
$bd = $chB->response;
echo ($chB->response);