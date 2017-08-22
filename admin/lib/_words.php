<?php
// var_dump($_POST);die();
include('../function/db.class.php');
$db=new db();
switch($act=$_GET['act']){
	case 'add':
	// var_dump($_POST);die();
	//这样是操作数据库里面的数据，感觉不太好，在前台更改比较合适
	// $person=empty($_POST['person'])?'佚名':$_POST['person'];
	$person=$_POST['person'];
	$words=$_POST['words'];
	$source=$_POST['source'];
	$time=time();
	$sql="insert into words(person,words,source,time) values('$person','$words','$source','$time')";
	// $url=dirname(dirname(dirname(__FILE__))).'/index/blog.php';
	// echo $url;die();
	$db->add($sql);
	break;
	case 'del':
	$id=$_GET['id'];
	$sql="delete from words where id=$id";
	$db->del($sql);
	break;
	case 'edit':
		$id=$_GET['id'];
		$person=$_POST['person'];
		$words=$_POST['words'];
		$source=$_POST['source'];
		$time=time();
		$sql="update words set person='$person',words='$words',source='$source',time='$time' where id=$id";
		$url="../words_list.php";
		$db->update($sql,$url);
		break;
		}
		
		
