<!--显示一个新药请求的详情-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	require_once '../mysql.func.php';
	$link=connectAndSelectDB();//连接数据库,定义在mysql.func.php中
	$sql="select * from t_newdrug where newdrug_id ='{$_REQUEST['id']}'";
	$rows=fetchAll($sql,$link);
	foreach($rows as $row){
		echo "药品ID：".$row['newdrug_id']."<br>";
		echo "通用名称：".$row['newdrug_gname']."<br>";
		echo "英文名称：".$row['newdrug_ename']."<br>";
		echo "商品名称：".$row['newdrug_name']."<br>";
		echo "成分：".$row['newdrug_element']."<br>";
		echo "规格：".$row['newdrug_specify']."<br>";
		echo "用法用量：".$row['newdrug_quantity']."<br>";
		echo "注意事项：".$row['newdrug_matter']."<br>";
		echo "包装：".$row['newdrug_pack']."<br>";
		echo "批文编号：".$row['newdrug_number']."<br>";
		echo "不良反应：".$row['newdrug_react']."<br>";
		echo "禁忌：".$row['newdrug_avoid']."<br>";
	}
?>
<input type="button" value="同意" class="btn" onclick="showDrugDetail(<?php echo $row['drug_id'];?>)">
<input type="button" value="拒绝" class="btn" onclick="showDrugDetail(<?php echo $row['drug_id'];?>)">
</body>
</html>