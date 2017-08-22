<?php
// var_dump($_POST);
include('../function/conn.php');
$name=$_POST['name'];
$email=$_POST['email'];
$website=$_POST['website'];
$message=$_POST['message'];
$time=time();
$sql="insert into contact(name,email,website,message,time) values('$name','$email','$website','$message','$time')";
$res=$db->exec($sql);
if($res){
	echo "<script>alert('发送成功');window.history.back();</script>";
}else{
	echo "<script>alert('发送失败,请稍后重试');window.history.back();</script>";
}
