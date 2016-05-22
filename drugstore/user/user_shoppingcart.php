<?php
	require_once('connect.php');
	//require_once('mysql.func.php');
//if(!empty($_POST)){
//	$drug_id=$_POST['addShop'];
//	$sql="select *from t_drug where drug_id=$drug_id";
//    $result=mysql_query($sql);
//    $row = mysql_fetch_assoc($result);
//}
	session_start();
	$user_name=$_SESSION['user'];
	// $user_name='18721382260';
	$sql="select * from t_order";
	$result=mysql_query($sql);
	$max_idx=0;
	while($row=mysql_fetch_assoc($result)) {
		if ($max_idx < $row['order_id']) {
			$max_idx = $row['order_id'];
		}
	}

	$max_idx=$max_idx+1;

	//用户名
	$sql="select * from t_car where use_username='$user_name'";

	$result=mysql_query($sql);


	while($row=mysql_fetch_assoc($result)){

		$arrayInsert=array('order_id'=>$max_idx,'user_username'=>$row['use_username'],'store_id'=>$row['store_id'],'drug_id'=>$row['drug_id'],'car_amount'=>$row['car_amount']);
		$id=insert('t_order',$arrayInsert);

	}

//	delete('t_car',"use_username='$user_name'");


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	  <script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<title>我的购物车</title>
		</head>
	<body>
		<div class="container">
	       <div class="lg-a"align="left">
            <a id="SN_DOMAIN" href="" title="药店" name="Logo"><img class="lg-logo" src="../image/logo.png" alt="苏宁易购"/></a>
            </div>
            <div class="user"align="right">

				<div class="dropdown pull-right">
					 <a href="#" data-toggle="dropdown" class="dropdown-toggle">用户名001<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">我的VIP</a>
						</li>
						<li>
							<a href="./user_accountinfo.html">个人中心</a>
						</li>
						<li>
							<a href="#">账号设置</a>
						</li>
						<li>
							<a href="#">意见反馈</a>
						</li>
						<li>
							<a href="#">退出</a>
						</li>

					</ul>
				</div>

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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #000000;">我的订单 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"style="color: #000000;">待支付</a></li>
            <li><a href="#"style="color: #000000;">待收货</a></li>
            <li><a href="#"style="color: #000000;">待评价</a></li>
             <li><a href="#"style="color: #000000;">修改订单</a></li>
            </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #000000;">客服服务<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"style="color: #000000;">帮助中心</a></li>
            <li><a href="#"style="color: #000000;">退换货</a></li>
            <li><a href="#"style="color: #000000;">建议反馈</a></li>
             <li><a href="#"style="color: #000000;">在线咨询</a></li>
            </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
       <div class="row">
  <div class="col-lg-12">
    <div class="input-group">
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
<div class="container">
	<table id="cartTable"  class="cart table table-condensed" >
		<thead>
			<tr>
				<th style="width:60px;"><label><input class="check-all check" type="checkbox" /> 全选</label></th>
				<th><label>药品信息</label></th>
				<th style="width:100px;"><label>单价</label></th>
				<th style="width:120px;"><label>数量</label></th>
				<th style="width:100px;"><label>小计</label></th>
				<th style="width:40px;"><label>操作</label></th>
			</tr>
		</thead>
		<tbody>

		<?php
			//for($cur=0;$cur<4;$cur++) {
		//'SELECT * from t_car a,t_drug b where a.use_username='12345678907' and a.drug_id=b.drug_id'

			//$sql="select * from t_car where use_username='$user_name'";
		$sql="SELECT * from t_car a,t_drug b where a.use_username='$user_name' and a.drug_id=b.drug_id";
			$result=mysql_query($sql);
			
			while($row=mysql_fetch_assoc($result)){
				?>

				<tr>
					<td><input class="check-one check" type="checkbox"/><?php echo $row['store_id']?></td>
					<td class="goods">
						<a href="#"><img src="../image/logo.jpg"></a><label><?php echo $row['drug_name'] ?></label>
					</td>
					<td class="number small-bold-red"><span>76.55</span></td>
					<td class="input-group">
						<span class="input-group-addon minus">-</span>
						<input type="text" class="number form-control input-sm" value="1"/>
						<span class="input-group-addon plus">+</span>
					</td>
					<td class="subtotal number small-bold-red">76.55</td>
					<td class="operation"><span class="delete btn btn-xs btn-primary">删除</span></td>
				</tr>
				<?php
			}
			//delete('t_car',"use_username='$user_name'");
		?>

		</tbody>
	</table>
	<div class="navfooter" align="center">
		                   <nav>
                        <ul class="pagination pagination-sm">
                            <li class="disabled">
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
	</div>


	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div style="border-top:1px solid gray;padding:4px 10px;">
				<div class="row">
					<div class="col-md-11">
						<div style="margin-left:20px;" class="pull-right total">
					<label>金额合计:<span class="currency">￥</span><span id="priceTotal" class="large-bold-red">0.00</span></label>
				</div>
				<div class="pull-right">
					<label>您选择了<span id="itemCount" class="large-bold-red" style="margin:0 4px;"></span>种产品型号，共计<span id="qtyCount" class="large-bold-red" style="margin:0 4px;"></span>件</label>
				</div>
				<div class="pull-right selected" id="selected">
					<span id="selectedTotal"></span>
				</div>
					</div>
					<form method="POST" action="user_admin/user_shoppingcart_handle.php">
					<div class="col-md-1">
					 <!-- <button type="button" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>去结算
                        </button> -->
                        <button type="submit" class="btn btn-primary btn-sm">去结算</button>
					</div>
					</form>
					
				</div>


			</div>

		</div>
	</div>
	<script>
		$(cartTable).find(":checkbox").click(function() {
        //全选框单击
        if ($(this).hasClass("check-all")) {
            var checked = $(this).prop("checked");
            $(cartTable).find(".check-one").prop("checked", checked);
            }
        var items = $(cartTable).find("tr:gt(0)");
     	$(cartTable).find(".check-all").prop("checked", items.find(":checkbox:checked").length == items.length);
         getTotal();
    });

    /*
     * 计算购物车中每一个产品行的金额小计
     *
     * 参数 row 购物车表格中的行元素tr
     *
     */
    function getSubTotal(row) {
	var price = parseFloat($(row).find("span:first").text()); //获取单价
        var qty = parseInt($(row).find(":text").val()); //获取数量
        var result = price * qty; //计算金额小计
        $(row).find(".subtotal").text(result.toFixed(2)); //将计算好的金额小计写入到“小计”栏位中
    };

    /*
     * 计算购物车中产品的累计金额
     *
     *
     */
    function getTotal() {
	var qtyTotal = 0;
        var itemCount = 0;
        var priceTotal = 0;
        $(cartTable).find("tr:gt(0)").each(function() {
   	    if ($(this).find(":checkbox").prop("checked") == true) { //如果选中
                itemCount++; //累加产品品种数量
                qtyTotal += parseInt($(this).find(":text").val()); //累计产品购买数量
                priceTotal += parseFloat($(this).find(".subtotal").text()); //累计产品金额
            }
        });
        $("#itemCount").text(itemCount);
        $("#qtyCount").text(qtyTotal);
	$("#priceTotal").text(priceTotal.toFixed(2));
    };

//为数量调整的＋ －号提供单击事件，并重新计算产品小计
    /*
     * 为购物车中每一行绑定单击事件，以及每行中的输入框绑定键盘事件
     * 根据触发事件的元素执行不同动作
     *   增加数量
     *   减少数量
     *   删除产品
     *
     */
    $(cartTable).find("tr:gt(0)").each(function() {
	var input = $(this).find(":text");
	//为数量输入框添加事件，计算金额小计，并更新总计
	$(input).keyup(function() {
	var val = parseInt($(this).val());
   	if (isNaN(val) || (val < 1)) { $(this).val("1"); }
	    getSubTotal($(this).parent().parent()); //tr element
	    getTotal();
	});

	//为数量调整按钮、删除添加单击事件，计算金额小计，并更新总计
	$(this).click(function() {
	var val = parseInt($(input).val());
	if (isNaN(val) || (val < 1)) { val = 1; }

	if ($(window.event.srcElement).hasClass("minus")) {
       	    if (val > 1) val--;
	        input.val(val);
	        getSubTotal(this);
	    }
	    else if ($(window.event.srcElement).hasClass("plus")) {
	        if (val < 9999) val++;
	    	input.val(val);
		getSubTotal(this);
	    }
	    else if ($(window.event.srcElement).hasClass("delete")) {
	        if (confirm("确定要从购物车中删除此产品？")) {
	            $(this).remove();
		}
	    }
    	    getTotal();
    });
    });
	</script>

</div>

<footer>
	   	<div class="container" align="center">
	   		<span >Copyright.......</span>
	   	</div>

	   </footer>
	</body>
</html>
