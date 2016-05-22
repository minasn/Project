<!--登录操作-->
<?php 
require_once '../mysql.func.php';
require_once '../common.func.php';
require_once '../configs.php';
$link=connectAndSelectDB();//连接数据库,定义在mysql.func.php中
session_start();
$adminName=$_POST['adminName'];
$adminPwd=$_POST['adminPwd'];
	$sql="select * from t_admin where admin_username='{$adminName}' and admin_password='{$adminPwd}'";
	/*$result=mysql_query($sql,$link) or die("查询失败<br>");
	$row=mysql_fetch_array($result);
	if($row){
		$_SESSION['adminName']=$row['admin_username'];
		$_SESSION['adminPwd']=$row['admin_password'];
		alertMes("登陆成功","../index.php");
	}else{
		alertMes("用户名或密码不正确，重新登陆","../login.php");
	}*/
	if($row=fetchOne($sql,$link)){
		$_SESSION['adminName']=$row['admin_username'];
		$_SESSION['adminPwd']=$row['admin_password'];
		alertMes("登陆成功","index.php");
	}
	else{
		alertMes("用户名或密码不正确，重新登陆","login.php");
	}
?>