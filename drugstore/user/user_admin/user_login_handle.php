<?php 

require_once('../connect.php');
session_start();
$user_tele     =$_POST['user_tele'];
$user_password =$_POST['user_password'];
if(!preg_match("/^[0-9]{11}/",$user_tele)){
       echo "<script>alert('ÇëÊäÈëÕýÈ·ÊÖ»úºÅ¸ñÊ½');</script>";
	   echo "<script> document.location='../user_login.html'</script>";
		}
$sql = "select * from t_user where user_username=$user_tele and user_password=$user_password";
$query = mysql_query($sql);
	if($query&&mysql_num_rows($query)){
		$_SESSION['user']=$user_tele;
		echo "<script>alert('»¶Ó­$_SESSION[user]ÓÃ»§£¡');</script>";//²ÉÓÃsessionµ÷ÓÃÊä³ö
		echo "<script> document.location='../user_login.html'</script>";
	}else{
		//echo mysql_error();
		echo "<script>alert('ÓÃ»§Ãû»òÃÜÂë´íÎó£¡');</script>";
		echo "<script> document.location='../user_login.html'</script>";
	}


 ?>