<?php
$dsn="mysql:host=localhost;dbname=blog";
try{
	$db=new PDO($dsn,'root','root');
}catch(PDOException $e){
	die("错误：".$e->getMessage());
}