<?php 
require_once('./connect.php');
require_once('mysql.func.php');

//删除
$sql=delete('t_user',"user_id=000004");

//更新
 $array=array('user_id'=>'123');
 $sql1=update('t_user',$array,"user_username=18721382261");

//插入
$arratInsert=array('user_username'=>'18721382260','user_id'=>'12345');
$sql2=insert('t_user',$arratInsert);

//查找一个
$sql3="select user_id from t_user where user_username=18721382260";
$res=fetchOne($sql3);


 ?>