<?php
include('../function/db.class.php');
$db=new db();
if(isset($_GET['act'])){
	$act=$_GET['act'];
	switch($act){
		case 'add':
		// var_dump($_POST);
		// die();
		$title=$_POST['title'];
		$author=$_POST['author'];
		$cate_id=$_POST['cate_id'];
		$content=$_POST['content'];
		$thumb=getthumb();
		$thumb=addslashes($thumb);
		// echo $thumb;die();
		$time=time();
		if(isset($_POST['tag'])){
			$tag=gettag();
		}else{
			$tag='';
		}
		$sql="insert into art(cate_id,tag,title,author,thumb,content,time) values($cate_id,'$tag','$title','$author','$thumb','$content','$time')";


		
			$url="../art_list.php";
			$db->add($sql,$url);
		break;
		case 'del':
		$id=$_GET['id'];
		$sql="delete from art where id=$id";
		$db->del($sql);
		break;

		case 'edit':
		$id=$_GET['id'];
		// echo $id;die();
		// var_dump($_POST);
		$title=$_POST['title'];
		$author=$_POST['author'];
		$cate_id=$_POST['cate_id'];
		$content=$_POST['content'];
		$thumb=getthumb();
		$time=time();
		if(isset($_POST['tag'])){
			$tag=gettag();
		}else{
			$tag='';
		}
		$sql="update art set cate_id=$cate_id,tag='$tag',title='$title',author='$author',thumb='$thumb',content='$content',time='$time' where id=$id";
		$url="../art_list.php";
		$db->update($sql,$url);
		break;
		


	}
}



//返回缩略图路径
function getthumb(){
	if($_FILES['thumb']['tmp_name']!=''){
		$file=$_FILES['thumb'];
		if($file['error']==0){
			$list=array("image/jpeg","image/jpg","image/png","image/gif");
			if(!in_array($file['type'],$list)){
				echo "<script>alert('非法图片类型！');window.history.back();</script>";
				exit();
			}
			//定义文件保存路径
			    $path=dirname(dirname(dirname(__FILE__))).'\upload';
				$info=pathinfo($file['name']);
				$filename=date("ymdHis").rand(10,99).'.'.$info['extension'];
				$realpath=$path.'\\'.$filename;
				//执行文件上传
				if(move_uploaded_file($file['tmp_name'], $realpath)){
					return $realpath='../upload/'.$filename;
				}else{
			echo "<script>alert('图片上传失败！');window.history.back();</script>";
			exit();
		}
				
			


		}else{
			echo "<script>alert('图片上传失败！');window.history.back();</script>";
			exit();
		}
	}else{
		// $path="./static/upload";
		// return $realpath=$path.'/default.png';
		return;
	}
}

//返回标签 如：标签1,标签3
function gettag()
{
		include("../function/conn.php");
	    $tag=$_POST['tag'];
		$where="where ";
		foreach($tag as $v){
			$where.="id=$v or ";
		}
		$sql="select name from tag ".trim($where,'or ');
		$res=$db->query($sql);
		$tag=array();
		while($row=$res->fetch()){
			$tag[]=$row[0];
		}
		return $tag=implode(',',$tag);

}


/*
// echo $path="../static/upload";die();
$file=$_FILES['thumb'];
//错误号判断
if(!$file['error']==0){
	die("上传文件错误 ".$file['error']);
}
//类型过滤
	$type_list=array("image/jpeg","image/jpg","image/png","image/gif");
if(!in_array($file['type'],$type_list)){
		die("文件类型错误");
	}
//定义文件保存路径
$path="../static/upload";
$info=pathinfo($file['name']);
$filename=date("ymdHis").rand(10,99).'.'.$info['extension'];
$realpath=$path.'/'.$filename;

//执行文件上传，先判断是否是一个上传文件
if(is_up
	loaded_file($file['tmp_name'])){
	if(move_uploaded_file($file['tmp_name'],$realpath)){
		echo 11111111;
	}else{
		echo 222222222;
	}
}




*/