<?php 

require_once('../connect.php');
session_start();
$user_tele     =$_POST['user_tele'];
$user_password =$_POST['user_password'];

//$user_sePWD=md5(sha1($user_password));
if(!preg_match("/^[0-9]{11}/",$user_tele)){
       echo "<script>alert('手机格式错误！');</script>";
	   echo "<script> document.location='../user_login.html'</script>";
		}
$sql = "select * from t_user where user_username=$user_tele and user_password='$user_password'";
$query = mysql_query($sql);
	if($query&&mysql_num_rows($query)){
		$_SESSION['user']=$user_tele;
		echo "<script>alert('登陆成功');</script>";
		echo "<script> document.location='../user_search_result.php'</script>";
	}else{
		//echo mysql_error();
		echo "<script>alert('用户名/密码错误');</script>";
		echo "<script> document.location='../user_login.html'</script>";
	}


 ?>