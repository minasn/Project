<?php
  require_once('connect.php');
    session_start();
    
    if($_SESSION['store_tele']){
	    $store_tele=$_SESSION['store_tele'];
	    $query = mysql_query("select * from t_store where store_phone=$store_tele;");
		//session_unset($_SESSION['store_tele']);
    }else{
    	echo "<script> document.location='./store_login.html'</script>"; 
    }


 
 

  if($query&&mysql_num_rows($query)){
    $row = mysql_fetch_assoc($query);
   }
   else{echo "<script>alert('失败请重新登录');document.location='store_login.html';</script>";}
?>   


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>商家登录</title>
	</head>
		<body style="background-color: #F8F8F8;">
<div class="container">
	       <div class="lg-a"align="left">
            <a id="SN_DOMAIN" href="" title="药店" name="Logo"><img class="lg-logo" src="../image/logo.png" alt="苏宁易购"/></a>
            </div>
            <div class="advice"align="right">
            	<a href="#"><span class="glyphicon glyphicon-envelope"></span>我想对“登录”提意见</a>
            </div>
</div>
<div class="container">
   <nav class="navbar btn-success" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed glyphicon glyphicon-align-justify" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false" >
      	</button>
      </div>
  <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#" style="color: #000000;">首页<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="#"style="color: #000000;">登录<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="#"style="color: #000000;">注册<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #000000;">我的药店 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"style="color: #000000;">申请开店</a></li>
            <li><a href="#"style="color: #000000;">药店信息管理</a></li>
            <li><a href="#"style="color: #000000;">药品管理</a></li>
             <li><a href="#"style="color: #000000;">订单处理</a></li>
            </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
       <div class="row">
  <div class="col-lg-12">
    <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">搜索方式 <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">药店</a></li>
          <li><a href="#">药品</a></li>
          <li><a href="#">症状</a></li>
          </ul>
      </div>
      <input type="text" class="form-control" aria-label="...">
      	</div>
      <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>搜索</button>
    </div>
   </div>
  </form>
  </div>
  </div>
</nav>
</div>
<div class="container" >
	
		<div class="row">
	<div class="jumbotron">
		
		<div class="row">
		<div class="col-md-7">
				    <div id="myCarousel" class="carousel slide" data-ride="carousel">
   <!-- 轮播（Carousel）指标 -->
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
   </ol>   
   <!-- 轮播（Carousel）项目 -->
   <div class="carousel-inner">
      <div class="item active">
         <img src="img/Img_Login.jpg" alt="First slide">
         	<div class="carousel-caption"><span style="font-size: 40px;">广告1</span></div>
      </div>
      <div class="item">
         <img src="img/Img_login2.jpg" alt="Second slide">
         	<div class="carousel-caption"><span style="font-size: 40px;">广告2</span></div>
      </div>
      <div class="item">
         <img src="img/Img_Login3.jpg" alt="Third slide">
         	<div class="carousel-caption"><span style="font-size: 40px;">广告3</span></div>
      </div>
      <div class="item">
         <img src="img/Img_Login4.jpg" alt="Fourth slide">
         	<div class="carousel-caption"><span style="font-size: 40px;">广告4</span></div>
      </div>
   </div>
   <!-- 轮播（Carousel）导航 -->
   <a class="carousel-control left" href="#myCarousel" 
      data-slide="prev">&lsaquo;</a>
   <a class="carousel-control right" href="#myCarousel" 
      data-slide="next">&rsaquo;</a>
</div> 

		</div>

      <div class="col-md-4" style="background-color: white;">
        <form method="post" action="store_admin/store_requestOpen_handle.php" enctype="multipart/form-data">
          <p class="form-title" style="font-weight: bold;font-size: 25px;" >欢迎申请开店</p>
          <div row>
            <div class="col-md-12">提示：为确保您的申请能通过，请填写真实信息。并选择适合您的宣传图</div>
            <div class="col-md-4" style="height:20px"></div>
          </div>
          <div class="form-group">
          <input type="text" class="form-control " id="storename" name="storename"  value="<?php if(!empty($row['store_permit'])){
            if($row['store_permit']!=0){
           echo $row['store_name'];}}?>"
  <?php 
            if($row['store_permit']==1||$row['store_permit']==2){
  echo 'readonly';}?> placeholder="输入店名" ></div>
          <div row>
            <div class="col-md-7"></div>
            <div class="col-md-4" style="height:7px"></div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="storeaddr" name="storeaddr"value="<?php if(!empty($row['store_permit'])){
            if($row['store_permit']!=0){
  echo $row['store_address'];}}?>"
  <?php 
            if($row['store_permit']==1||$row['store_permit']==2){
  echo 'readonly';}?> placeholder="输入地址"></div>
          <div row>
            <div class="col-md-7"></div>
            <div class="col-md-4" style="height:7px"></div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="storekeepname" name="storekeepname" value="<?php if(!empty($row['store_permit'])){
            if($row['store_permit']!=0){
  echo $row['store_keep_surname'];}}?>"
  <?php 
            if($row['store_permit']==1||$row['store_permit']==2){
  echo 'readonly';}?> placeholder="输入备案人姓名"></div>
          <div row>
            <div class="col-md-7"></div>
            <div class="col-md-4" style="height:7px"></div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="storekeepID" name="storekeepID" value="<?php if(!empty($row['store_permit'])){
            if($row['store_permit']!=0){
  echo $row['store_keep_id'];}}?>"
  <?php 
            if($row['store_permit']==1||$row['store_permit']==2){
  echo 'readonly';}?> placeholder="输入备案人身份证号码"></div>
          <div row>
            <div class="col-md-7"></div>
            <div class="col-md-4" style="height:7px"></div>
          </div>
          <div class="form-group">
            <input type="file" class="form-control"  required id="storepic" name="storepic"></div>
          <div row>
            <div class="col-md-7"></div>
            <div class="col-md-4" style="height:7px"></div>
          </div>

          <button type="submit" class="btn btn-success btn-block">提交申请</button>
          <a href="store_register.html">免费注册></a>
        </form>
      </div>
	    <div class="col-md-1"></div>
			</div>
	</div>		

		</div>
	   
	  </div>
	   <footer>
	   	<div class="container" align="center">
	   		<span >Copyright.......</span>
	   	</div>
	   	
	   </footer>
    	</body>
    	
</html>
