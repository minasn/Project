<?php 

require_once('../connect.php');
session_start();
$user_tele     =$_POST['user_tele'];
$user_password =$_POST['user_password'];

if(){
	$_SESSION['user']=true;
}else{
	die("用户名密码错误");
}



 ?>