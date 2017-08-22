<?php
session_start();
include('../function/conn.php');
$user=$_POST['user'];
$pass=$_POST['pass'];
$old=$_SESSION['admin'];
$sql="update admin set user='$user',pass='$pass' where user='$old'";
$res=$db->exec($sql);
if($res){
			$_SESSION['admin']=$user;
 		    $_SESSION['adminpass']=$pass;
			echo "<script>alert('修改成功');location.href='../home.php';</script>";
			exit();
		}else{
			echo "<script>alert('修改失败');window.history.back();</script>";exit();
		}