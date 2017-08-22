<?php
// var_dump($_POST);die();
include('../function/db.class.php');
$db=new db();
switch($act=$_GET['act']){
	case 'add':
	$a_id=$_GET['a_id'];
	$nickname=$_POST['nickname'];
	$message=$_POST['message'];
	$time=time();
	$sql="insert into com(a_id,nickname,message,time) values($a_id,'$nickname','$message','$time')";
	// $url=dirname(dirname(dirname(__FILE__))).'/index/blog.php';
	// echo $url;die();
	$db->add($sql);
	break;
	case 'del':
	$id=$_GET['id'];
	$sql="delete from com where id=$id";
	$db->del($sql);
	break;
	case 'edit':
	$id=$_GET['id'];
	$a_id=$_POST['a_id'];
	$nickname=$_POST['nickname'];
	$message=$_POST['message'];
	$time=time();
	$sql="update com set a_id=$a_id,nickname='$nickname',message='$message',time='$time' where id=$id";
	$url="../com_list.php";//修改成功跳转页面
	$db->update($sql,$url);
}