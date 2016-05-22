<?php 
require_once('../connect.php');
session_start();

$user_name=$_SESSION['user'];

if(delete('t_car',"use_username='$user_name'")){
		echo "<script>alert('生成订单成功');</script>";
	   echo "<script> document.location='../user_search_result.php'</script>";
}
else{
	echo "<script>alert('生成订单失败');</script>";
	   echo "<script> document.location='../user_shoppingcart.php'</script>";
}

 ?>