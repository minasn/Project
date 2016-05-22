<?php
header("Content-Type:text/html;charset=utf-8");
session_start();

//session传过来的号码，现在没传所以自己创建一个

// $_SESSION['store_tele']='111';

$storename=$_POST['storename'];
$storeaddr=$_POST['storeaddr'];
$storekeepname=$_POST['storekeepname'];
$storekeepID=$_POST['storekeepID'];

// $_SESSION['store_tele']='18721382261';





$storepic_file = $_FILES['storepic'];

$storepic_name = $storepic_file['name'];
$storepic_size=$storepic_file['size'];

$maxsize=10485760;
// $maxsize=1024;
//得到文件类型，并且都转化成小写,strrpos从零开始返回到指定字符位置
$type = strtolower(substr($storepic_name,strrpos($storepic_name,'.')+1)); 
$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型

if($storepic_file['error']==0){
	if($storepic_size>$maxsize){
		echo "<script>alert('上传文件大小不符合规范');document.location='../store_requestOpen.php';</script>";
	}

	//判断文件类型是否被允许上传
	if(!in_array($type, $allow_type)){
	  //如果不被允许，则直接停止程序运行
	 echo "<script>alert('请上传照片类型的文件');document.location='../store_requestOpen.php';</script>";
	}
	//判断是否是通过HTTP POST上传的
	if(!is_uploaded_file($storepic_file['tmp_name'])){
	  return ;//程序停止
	}


	if(!getimagesize($storepic_file['tmp_name'])){
		exit('不是真正的图片类型');
	}


	//$path_file="../pic/".$_SESSION['store_tele'];
	$path_file="../pic/".$_SESSION['store_tele'];
	$path_des=$path_file.'/bg.'.$type;

	if(!file_exists($path_file)){
		mkdir ($path_file);//如果不存在该用户文件夹，则创建该用户文件夹
	}

	//$storepic_file['tmp_name']上传产生的临时文件移动到$path_des其中已包含生成文件名
	if(move_uploaded_file($storepic_file['tmp_name'],$path_des)){
	 //上传的文件目前在1872172628文件夹的bg.jpg,若为其他格式，则为bg.其他格式
	  echo "<script>alert('上传成功');</script>";
	  //echo "<script>document.location='../store_requestOpen.html';</script>";//成功后跳转页面未定
	  
	}else{
	  echo "<script>alert('上传失败请重试');document.location='../store_requestOpen.php';</script>";
	}
}else{
		switch ($fileInfo['error']) {
			case '1':
				echo "上传文件超过了PHP配置文件中upload_max_filesize选项的值";
				break;
			case '2':
				echo "超过了表单MAX_FILE_SIZE限制的大小";
				break;
			case '3':
				echo "文件部分被上传";
				break;
			case '4':
				echo "没有选择上传文件";
				break;
			case '6':
				echo "没有找到临时目录";
				break;
			case '7':
			case '8':
				echo "系统错误";
				break;
			default:
				break;
		}
	}


?>