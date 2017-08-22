<?php
include('../function/db.class.php');
$db=new db();
if(isset($_GET['act'])){
	$act=$_GET['act'];
	switch($act){
		case 'add':
		$name=$_POST['cate_name'];
		//检查栏目名是否重复
		$sql="select * from cate where name='$name'";
		$res=$db->query($sql);
		if($res->rowCount()){
			echo "<script>alert('栏目名重复');window.history.back();</script>";
			exit();
		}else{
			$time=time();
			$sql="insert into cate(name,time) values('{$name}','{$time}')";
			$url="../cate_list.php";
			$db->add($sql,$url);
		}
		break;
		case 'del':
		$id=$_GET['id'];
		$sql="delete from cate where id=$id";
		$db->del($sql);
		break;

		case 'edit':
		$id=$_GET['id'];
		$name=$_POST['cate_name'];
		$sql="select * from cate where name='$name'";
		$res=$db->query($sql);
		if($res->rowCount()){
			echo "<script>alert('栏目名重复');window.history.back();</script>";
			exit();
		}else{
			$time=time();
			$sql="update cate set name='$name',time='$time' where id=$id";
			$url="../cate_list.php";
			$db->update($sql,$url);

		}
		break;
		


	}
}


