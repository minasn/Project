<!--管理员注销-->
<?php
	session_start();
	if(isset($_SESSION['adminName'])){
		unset($_SESSION['adminName']);
	}
	$url="login.php";
	echo "<script>window.location='{$url}';</script>";
?>