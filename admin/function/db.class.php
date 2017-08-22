<?php
class db
{
	public $db;
	
	public function __construct()
	{
		include('conn.php');
		$this->db=$db;

	}

	//添加操作，如果添加成功则跳转到url,否则返回上一页面
	public function add($sql,$url='')
	{
		$res=$this->db->exec($sql);
		if($res){
			//我又把等号==写成赋值号=了，然后各种纠错，傻呀
			if($url==''){
				echo "<script>alert('添加成功');window.history.back();</script>";exit();
			}else{
				echo "<script>alert('添加成功');location.href='{$url}';</script>";exit();
			}
		}else{
			echo "<script>alert('添加失败');window.history.back();</script>";exit();
		}

	}

	//删
	public function del($sql)
	{
		$res=$this->db->exec($sql);
		if($res){
			// echo "<a href="javascript:if(confirm('确实要删除吗?'))location='jb51.php?id='">删除</
			echo "<script>alert('删除成功');window.history.back();</script>";exit();
		}else{
			echo "<script>alert('删除失败');window.history.back();</script>";exit();
		}
	}

	//改
	public function update($sql,$url)
	{
		$res=$this->db->exec($sql);
		if($res){
			echo "<script>alert('修改成功');location.href='{$url}';</script>";exit();
		}else{
			echo "<script>alert('修改失败');window.history.back();</script>";exit();
		}
	}

	public function query($sql)
	{
		$res=$this->db->query($sql);
		return $res;

	}

}

