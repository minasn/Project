<?php 
	require_once('../connect.php');
	$store_tele       =$_POST['store_tele'];
	$store_password   =$_POST['store_password'];
	$store_rePassword =$_POST['store_rePassword'];
	$store_check=$_POST['store_check'];
	echo $store_check;
	// if($store_password !== $store_rePassword){
	// 	echo "<script> alert('密码不相同');</script>";
	// 	echo "<script> document.location='../store_register.html'</script>";
		

	// }
	// if(!preg_match("/^[0-9]{11}/","12123456783"))
	// 	echo "请输入手机号";

	// $s="call p_store_register('18721382261','1')";
	// $result=mysql_query($s);
	// $row=mysql_fetch_row($result);

	
	// if($row[0]=='!'){
	// 	echo "<script> alert('手机号已经存在');</script>";
	// 	echo "<script> document.location='../store_register.html'</script>";
	// }else{
	// 	echo "<script> alert('注册成功');</script>";
	// 	echo "<script> document.location='../store_register.html'</script>";

	// }

	
 ?>