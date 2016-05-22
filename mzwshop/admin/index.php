<!--管理员首页-->
<?php
	require_once 'checkAdminLogin.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员首页</title>
<link href="styles/backstage.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">药千家后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fr">
            <b>欢迎您
            <?php 
				if(isset($_SESSION['adminName'])){
					echo $_SESSION['adminName'];
				}
            ?>
            
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="icon icon_i">首页</a><span></span><a href="adminLogout.php" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span onclick="show('menu1','change1')" id="change1">+</span>审核管理</h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="showAllNewStoreRequire.php" target="mainFrame">药店审核</a></dd>
                            <dd><a href="showAllNewDrugQequire.php" target="mainFrame">新药审核</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu2','change2')" id="change2">+</span>药品管理</h3>
                        <dl id="menu2" style="display:none;">
                        	<dd><a href="searchAllDrags.php" target="mainFrame">所有药品</a></dd>
                            <dd><a href="addOneDrug.php" target="mainFrame">添加药品</a></dd>
                            <dd><a href="deleteDrug.php" target="mainFrame">删除药品</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span  onclick="show('menu3','change3')" id="change3" >+</span>药店管理</h3>
                        <dl id="menu3" style="display:none;">
                            <dd><a href="showAllDrugStore.php" target="mainFrame">药店信息</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>