<!--检查登录状态-->
<meta charset="utf-8">
<?php
require_once '../mysql.func.php';
//require_once '../common.func.php';

	$link=connectAndSelectDB();//连接数据库,定义在mysql.func.php中
	session_start();
	if(isset($_SESSION['adminName'])){
		$adminName=$_SESSION['adminName'];
		$adminPwd=$_SESSION['adminPwd'];
		$sql="select * from t_admin where admin_username='{$adminName}' and admin_password='{$adminPwd}'";
		if($row=fetchOne($sql,$link)){
			$_SESSION['adminName']=$row['admin_username'];
			$_SESSION['adminPwd']=$row['admin_password'];
		}
		else{
			unset($_SESSION['adminName']);
			unset($_SESSION['adminPwd']);
			$url="login.php";
			echo "<script>window.location='{$url}';</script>";
		}
	}
	else{
		$url="login.php";
		echo "<script>window.location='{$url}';</script>";
	}
?>