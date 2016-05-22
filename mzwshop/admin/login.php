<!--登录页面-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>

<!--[if IE 6]>
<script type="text/javascript" src="../js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="../js/ie6Fixpng.js"></script>
<![endif]-->
<link href="styles/main.css" rel="stylesheet" type="text/css">
<link href="styles/reset.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="headerBar">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="login.php"><img src="images/logo_index.png" alt="慕课网"></a>
			</div>
			<h3 class="welcome_title">欢迎管理员登陆</h3>
		</div>
	</div>
</div>

<div class="loginBox">
	<div class="login_cont">
	<form action="doLogin.php" method="post"><!--调用doLogin.php-->
			<ul class="login">
				<li class="l_tit">管理员帐号</li>
				<li class="mb_10"><input type="text"  name="adminName" placeholder="请输入管理员帐号"class="login_input user_icon"></li>
				<li class="l_tit">密码</li>
				<li class="mb_10"><input type="password"  name="adminPwd" class="login_input password_icon"></li>
				<li><input type="submit" value="" class="login_btn"></li>
			</ul>
		</form>
	</div>
</div>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">简介</a><i>|</i><a href="#">公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2016 - 2016 版权所有&nbsp;&nbsp;&nbsp;沪ICP备09037834号&nbsp;&nbsp;&nbsp;沪ICP证B1034-8373号&nbsp;&nbsp;&nbsp;上海市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>
