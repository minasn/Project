<?php 
	require_once('../connect.php');
	session_start();
	$_SESSION['store']=false;

	$store_tele=$_POST['store_tele'];
	$store_password=$_POST['store_password'];
	$store_swPWD=md5(sha1($store_password));


	if(!preg_match("/^[0-9]{11}/",$store_tele)){
		echo "<script> alert('手机号格式错误')</script>";
		// echo "<script> document.location='../store_login.html'</script>";
		changePage("store_login.html");
	}

	$query="select * from t_store where store_username='$store_tele' and store_password='$store_swPWD'";
	$result=mysql_query($query);
	$isFind=mysql_num_rows($result);
	// echo $isFind;

	if($isFind==1){
		$_SESSION['store']=true;
		changePage("store_index.html");


	}else{
		echo "<script> alert('用户密码错误')</script>";
		// echo "<script> document.location='../store_login.html'</script>";
		changePage("store_login.html");
	}
	








	function changePage($address){
		echo "<script> document.location='../$address'</script>";
	}




 ?>
 