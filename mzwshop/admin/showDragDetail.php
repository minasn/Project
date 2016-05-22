<!--显示药品详情-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	require_once '../mysql.func.php';
	//echo $_REQUEST['id']."<br>";
	$mzwidcount=1;
	$mzwid=(String)$_REQUEST['id'];
	//echo $mzwid."<br>";
	$mzwid2=(int)$_REQUEST['id'];
	//echo $mzwid2."<br>";
	while(floor($mzwid2/10)!=0){
		echo "okok"."<br>";
		$mzwidcount=$mzwidcount+1;
		$mzwid2=floor($mzwid2/10);
	}
	$zeroneed=6-$mzwidcount;
	//echo $mzwidcount."<br>";
	//echo $zeroneed."<br>";
	while($zeroneed!=0){
		$mzwid="0".$mzwid;
		$zeroneed=$zeroneed-1;
	}
	//echo $mzwid;
	$link=connectAndSelectDB();//连接数据库,定义在mysql.func.php中
	$sql="select * from t_drug where drug_id ='{$mzwid}'";
	$row=fetchOne($sql,$link);
	
		echo "药品ID：".$row['drug_id']."<br>";
		echo "通用名称：".$row['drug_gname']."<br>";
		echo "拼音名称：".$row['drug_cname']."<br>";
		echo "商品名称：".$row['drug_name']."<br>";
		echo "成分：".$row['drug_element']."<br>";
		echo "规格：".$row['drug_specify']."<br>";
		echo "用法用量：".$row['drug_quantity']."<br>";
		echo "注意事项：".$row['drug_matter']."<br>";
		echo "包装：".$row['drug_pack']."<br>";
		echo "批文编号：".$row['drug_number']."<br>";
		echo "不良反应：".$row['drug_react']."<br>";
		echo "禁忌：".$row['drug_avoid']."<br>";
	
?>
<img src="images/logo_index.png" width="112" height="59" />	
<input name="MyFile" type="file" />
</body>
</html>