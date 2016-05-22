<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	require_once 'configs.php';
/**
 *连接数据库
 *@return resources
 */
	function connectAndSelectDB(){
		$link=mysql_connect(DB_HOST,DB_USER,DB_PWD)
			or die("数据库连接失败Error".mysql_errno().":".mysql_error());
		mysql_set_charset(DB_CHARSET);
		mysql_select_db(DB_DBNAME) or die("指定数据库打开失败");
		return $link;
	}
	
	//插入操作
	function insert($sql){
		mysql_query($sql);
		return mysql_insert_id();
	}
	
	//更新操作
	function update($sql){
		mysql_query($sql);
		return mysql_affected_rows();
	}
	
	//删除操作
	function sqldelete($sql){
		mysql_query($sql);
		return mysql_affected_rows();
	}
	
/**
 *得到指定一条记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$link){
	$result=mysql_query($sql,$link);
	$row=mysql_fetch_array($result);
	return $row;
}
	
/**
 * 得到结果集中所有记录 ...
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql,$link){
	$result=mysql_query($sql,$link);
	while(@$row=mysql_fetch_array($result)){
		$rows[]=$row;
	}
	return $rows;
}
	
/**
 * 得到结果集中的记录条数
 * @param unknown_type $sql
 * @return number
 */
function getResultNum($sql,$link){
	$result=mysql_query($sql,$link);
	return mysql_num_rows($result);
}
	
?>