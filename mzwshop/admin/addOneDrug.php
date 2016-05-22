<!--加一种新药-->
<?php
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<p>
  <label for="drug_id">药品ID： </label>
  <input type="text" name="drug_id" id="drug_id" /><br>
  <label for="drug_key1">关键字1： </label>
  <input type="text" name="drug_key1" id="drug_key1" /><br>
  <label for="drug_key2">关键字2： </label>
  <input type="text" name="drug_key2" id="drug_key2" /><br>
  <label for="drug_indicate">适应症： </label>
  <input type="text" name="drug_indicate" id="drug_indicate" /><br>
  <label for="drug_gname">通用名称：</label>
  <input type="text" name="drug_gname" id="drug_gname" /><br>
  <label for="drug_cname">汉语拼音：</label>
  <input type="text" name="drug_cname" id="drug_cname" /><br>
</p>
<form id="form1" name="form1" method="post" action="">
  <input type="submit" name="submitAddOneDrug" id="submitAddOneDrug" value="提交" />
</form>
<p>&nbsp;</p>
</body>
</html>