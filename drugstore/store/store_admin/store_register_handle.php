<?php 
	require_once('../connect.php');
	
	$store_tele       =$_POST['store_tele'];
	$store_password   =$_POST['store_password'];
	$store_rePassword =$_POST['store_rePassword'];

	if($store_password !== $store_rePassword){
		echo "<script> alert('密码不相同');</script>";
		echo "<script> document.location='../store_register.html'</script>";
		
	}
	if(!preg_match("/^[0-9]{11}/",$store_tele)){
		echo "<script> alert('请输入正确的手机号');</script>";
		echo "<script> document.location='../store_register.html'</script>";
	}

	//$store_sePWD=md5(sha1($store_password));
	
	$s="call p_store_register('$store_tele','$store_password')";
	$result=mysql_query($s);
	$row=mysql_fetch_row($result);

	
	if($row[0]=='!'){
		echo "<script> alert('手机号已经存在');</script>";
		echo "<script> document.location='../store_register.html'</script>";
	}else{
		echo "<script> alert('注册成功');</script>";
		echo "<script> document.location='../store_login.html'</script>";

	}

	
 ?>