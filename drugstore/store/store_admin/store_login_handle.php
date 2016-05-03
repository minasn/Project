<?php 
	require_once('../connect.php');
	session_start();


	$store_tele=$_POST['store_tele'];
	$store_password=$_POST['store_password'];
	

    $_SESSION['store_tele']=$_POST['store_tele'];
    $_SESSION['store']=false;


	//$store_swPWD=md5(sha1($store_password));


	if(!preg_match("/^[0-9]{11}/",$store_tele)){
		echo "<script> alert('手机号格式错误')</script>";
		changePage("store_login.html");
	}

	$query="select * from t_store where store_phone=$store_tele and store_password={$store_password}";
	$result=mysql_query($query);
	$isFind=mysql_num_rows($result);


	if($isFind==1){
		$_SESSION['store']=true;
		changePage("./store_requestOpen.php");
	}else{
		echo "<script> alert('用户密码错误')</script>";
		changePage("store_login.html");
	}

	function changePage($address){
		echo "<script> document.location='../$address'</script>";
	}
 ?>
 