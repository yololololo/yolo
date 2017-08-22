<?php
session_start();
 $code=$_SESSION['code'];//验证码正确的值
 $mycode=$_POST['mycode'];
if($mycode==$code){
	unset($_SESSION['code']);
 require_once('../function/conn.php');
 $username=$_POST['username'];
 $password=$_POST['password'];
$sql="select * from admin where user='{$username}'";
$res=$db->query($sql);
 if($row=$res->fetch(PDO :: FETCH_ASSOC)){
 	if($row['pass']==$password){
 		$_SESSION['admin']=$username;
 		$_SESSION['adminpass']=$password;
 	header("location:../home.php");
 	}else{
 	header("location:../login.php?errno=3");//密码错误
 	}
 }else{
 	header("location:../login.php?errno=2");//用户不存在
 }
}else{
	header("location:../login.php?errno=1");//验证码错误
}
