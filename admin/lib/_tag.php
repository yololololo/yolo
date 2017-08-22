<?php
include('../function/db.class.php');
$db=new db();
if(isset($_GET['act'])){
	$act=$_GET['act'];
	switch($act){
		case 'add':
		$name=$_POST['tag_name'];
		//检查标签名是否重复
		$sql="select * from tag where name='$name'";
		$res=$db->query($sql);
		if($res->rowCount()){
			echo "<script>alert('标签名重复');window.history.back();</script>";
			exit();
		}else{
			$sql="insert into tag(name) values('{$name}')";
			$url="../tag_list.php";
			$db->add($sql,$url);
		}
		break;
		case 'del':
		$id=$_GET['id'];
		$sql="delete from tag where id=$id";
		$db->del($sql);
		break;

		case 'edit':
		$id=$_GET['id'];
		$name=$_POST['tag_name'];
		$sql="select * from tag where name='$name'";
		$res=$db->query($sql);
		if($res->rowCount()){
			echo "<script>alert('标签名重复');window.history.back();</script>";
			exit();
		}else{
			$sql="update tag set name='$name'where id=$id";
			$url="../tag_list.php";
			$db->update($sql,$url);

		}
		break;
		


	}
}


