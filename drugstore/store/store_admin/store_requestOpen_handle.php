<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
$_SESSION['store_tele']='18721372628';//session传过来的号码，现在没传所以自己创建一个
$storename=$_POST['storename'];
$storeaddr=$_POST['storeaddr'];
$storekeepname=$_POST['storekeepname'];
$storekeepID=$_POST['storekeepID'];
//$storepic=$_POST['storepic'];
$storepic_file = $_FILES['storepic'];//得到传输的数据

$storepic_name = $storepic_file['name'];//得到文件名称
$type = strtolower(substr($storepic_name,strrpos($storepic_name,'.')+1)); //得到文件类型，并且都转化成小写,strrpos从零开始返回到指定字符位置
$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($type, $allow_type)){
  //如果不被允许，则直接停止程序运行
 echo "<script>alert('请上传照片类型的文件');document.location='../store_requestOpen.html';</script>";
}
//判断是否是通过HTTP POST上传的
if(!is_uploaded_file($storepic_file['tmp_name'])){
  //如果不是通过HTTP POST上传的
  return ;//程序停止
}

$path_file="../pic/".$_SESSION['store_tele'];
$path_des=$path_file.'/bg.'.$type;
if(!file_exists($path_file)){
	mkdir ($path);//如果不存在该用户文件夹，则创建该用户文件夹
}
if(move_uploaded_file($storepic_file['tmp_name'],$path_des)){//$storepic_file['tmp_name']上传产生的临时文件移动到$path_des其中已包含生成文件名
 //上传的文件目前在1872172628文件夹的bg.jpg,若为其他格式，则为bg.其他格式
  echo "<script>alert("上传成功");</script>";
  //echo "<script>document.location='../store_requestOpen.html';</script>";//成功后跳转页面未定
  
}else{
  echo "<script>alert("上传失败请重试");document.location='../store_requestOpen.html';</script>";
}



?>