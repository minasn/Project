 <html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /></head>
<body>
  <?php
  require_once('../connect.php');

       $user_tel=$_POST['user_tel'];
	   $user_password=$_POST['user_password'];
	   $user_repassword=$_POST['user_repassword'];



	   if($user_password!==$user_repassword){
		   echo "<script>alert('两次输入密码必须相同');</script>";
		   echo "<script> document.location='../user_register.html'</script>";  
		}

		if(!preg_match("/^[0-9]{11}/",$user_tel)){
		   echo "<script>alert('请输入正确手机号格式');</script>";
		   echo "<script> document.location='../user_register.html'</script>";
		}
		

		$user_sePWD=md5(sha1($user_password));
		$sql="call p_user_register('$user_tel','$user_password')";
		$result=mysql_query($sql) or die("SQL语句执行失败");
		$row = mysql_fetch_row($result);

		  
		if($row[0]=="!"){
		   
		   echo "<script>alert('手机号重复');</script>";
		   echo "<script> document.location='../user_register.html'</script>";
		   }
		   if($row[0]=="#"){
		   
		   echo "<script>alert('注册成功');</script>";
		   echo "<script> document.location='../user_login.html'</script>";
		   }


		?>
		</body></html>