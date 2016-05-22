<!--删除药品页面-->
<?php
	require_once '../mysql.func.php';
	require_once '../common.func.php';
	require_once '../page.func.php';
	$pageSize=8;
	if(isset($_REQUEST['page'])){
		$page=(int)$_REQUEST['page'];
	}
	else{
		$page=1;
	}
	//$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
	$link=connectAndSelectDB();//连接数据库,定义在mysql.func.php中
	//$sql="select drug_id,drug_gname,drug_pack,drug_number from t_drug order by drug_id";
	//$rows=fetchAll($sql,$link);
	$sql="select * from t_drug";
	$totalRows=getResultNum($sql,$link);
	$totalPage=ceil($totalRows/$pageSize);
	//$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select  drug_id,drug_gname,drug_pack,drug_number from t_drug  limit {$offset},{$pageSize}";
	$rows=fetchAll($sql,$link);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="styles/backstage.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="details">
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">药品ID</th>
                                <th width="35%">通用名称</th>
                                <th width="35%">包装</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><?php echo $row['drug_id'];?></label></td>
                                <td><?php echo $row['drug_gname'];?></td>
                                <td><?php echo $row['drug_pack'];?></td>
                                <td align="center"><input type="button" value="删除" class="btn" onclick="showDrugDetail(<?php echo $row['drug_id'];?>)"></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">
	function showDrugDetail(id){
			window.location="showDragDetail.php?id="+id;
	}
</script>
</body>
</html>