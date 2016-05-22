<?php 
require_once('../connect.php');
session_start();



$username=$_SESSION['user'];
 // $username="18721382260";

$addShopDrug=$_GET['addShopDrug'];// 这个等数据库调好再改
$sql="select * from t_stdrug where drug_id='$addShopDrug'";
$res=fetchOne($sql);

// echo $res['drug_id'];

$drug_id=$res['drug_id']; //药品ID
$store_id=$res['store_id'];//店家ID
$drug_price=$res['drug_price'];


$arrayInsert=array('use_username'=>$username,'drug_id'=>$drug_id,'store_id'=>$store_id);// 密封insert语句
if(!insert('t_car',$arrayInsert)){
	echo "<script> document.location='../user_shoppingcart.php'</script>";
}else{
	echo "<script>alert('请重新添加药品');</script>";
	echo "<script> document.location='../drug_infoview.php'</script>";
}

 ?>