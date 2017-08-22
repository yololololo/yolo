<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta http-equiv="Pragma" content="no-cache"> 
<meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Expires" content="0"> 
<title>后台登录</title> 
<link href="./static/css/login.css" type="text/css" rel="stylesheet"> 
</head> 
<body> 

<div class="login" style="background-color: rgba(255,255,255,0.2);">
    <div class="message">欢迎登录</div>
    <div id="darkbannerwrap"></div>
    <form action="./lib/_login.php" method="post" >
		<input name="action" value="login" type="hidden">
		<input name="username" placeholder="用户名" required="" type="text">
		<hr class="hr15">
		<input name="password" placeholder="密码" required="" type="password">
		<hr class="hr15">
		<input name="mycode" placeholder="验证码" required="" type="text" id="code">
		<img src="./function/ValidateCode.php" id='_code'>
		<hr class="hr15">
		<input value="登录" style="width:100%;" type="submit">
		<hr class="hr20">
		<!-- 帮助 <a onClick="alert('请联系管理员')">忘记密码</a> -->
	</form>

	
</div>

<div class="copyright">© 2017 by <a href="http://www.mycodes.net/" target="_blank">yolo</a></div>

</body>
</html>
<?php
if(isset($_GET['errno'])){
	if($_GET['errno']==1){
		echo "<script>alert('验证码错误');</script>";
	}elseif($_GET['errno']==2){
		echo "<script>alert('用户不存在');</script>";
	}elseif($_GET['errno']==3){
		echo "<script>alert('密码错误');</script>";
	}
}
if(isset($_GET['act'])&&$_GET['act']=='logout'){
	session_start();
	session_destroy();
	header('location:../index');
}