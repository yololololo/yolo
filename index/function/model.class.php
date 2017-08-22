<?php
class model
{
  public $db;
  public $page;//当前页
  public $model;//表格名称
  public $num;//总记录数
  public $total;//总页数
  public $pagesize;//每页显示的记录数
  public $showpage;//分页导航条显示的页码数量
	public function __construct($model,$pagesize="2",$showpage="3",$db='blog')
	{
		include('conn.php');
    $this->model=$model;
    $this->pagesize=$pagesize;
    $this->showpage=$showpage;
    $this->db=$db;
    
  }

//表头,返回由字段名构成的一维数组
  public function a()
  {
    $th=array();
    $sql="desc $this->model";
    $res=$this->db->query($sql);
    while($row=$res->fetch()){
     $th[]=$row['Field'];
    }
    return $th;
  }
//字段值，返回$res
public function b0()
{
  $tbody=array();
   $this->page=@$_GET['page']?$_GET['page']:1;//当前页码
                  //计算总页数
                  $sql="select count(*) from $this->model";
                  $res=$this->db->query($sql);
                  $num=$res->fetchColumn();//总记录数
                  $this->total=ceil($num/$this->pagesize);//总页数
                  $offset=($this->showpage-1)/2;//偏移量
                  $sql="select * from $this->model  limit ".($this->page-1)*$this->pagesize.','.$this->pagesize;
                  $res=$this->db->query($sql);
                  return $res;
}
//字段值，返回二维数组$rows
public function b()
{
  $tbody=array();
   $this->page=@$_GET['page']?$_GET['page']:1;//当前页码
                  //计算总页数
                  $sql="select count(*) from $this->model";
                  $res=$this->db->query($sql);
                  $num=$res->fetchColumn();//总记录数
                  $this->total=ceil($num/$this->pagesize);//总页数
                  $offset=($this->showpage-1)/2;//偏移量

                  $sql="select * from $this->model order by id desc limit ".($this->page-1)*$this->pagesize.','.$this->pagesize;
                  $res=$this->db->query($sql);
                  $rows=$res->fetchAll(PDO :: FETCH_ASSOC);
                  return $rows;
}

//分页导航条
public function c()
{
   $offset=($this->showpage-1)/2;//偏移量
   // $page_banner="<div class='page'>";
   $page_banner="";
                  if($this->page>1){
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=1'>首页</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page-1)."'>上一页</a>";
                  }

                  //初始化
                
                  if($this->total>$this->showpage){
                    if($this->page>$offset+1){
                      $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=1'>1</a>……";
                      $start=$this->page-$offset;
                      $end=($this->page+$offset)<$this->total?($this->page+$offset):$this->total;
                    }else{
                      $start=1;
                      $end=$this->showpage;
                    }
                  }else{
                    $start=1;
                    $end=$this->total;
                  }
                  
                  for($i=$start;$i<=$end;$i++){
                    if($i==$this->page){
                      $page_banner.="<a href='' class='active'> {$i} </a>";
                    }else{
                      $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$i'> {$i} </a>";
                    }
                  }
                    if($this->total>$this->showpage&&$this->total>$this->page+$offset){
                    $page_banner.="……<a href='".$_SERVER['PHP_SELF']."?page={$this->total}'>{$this->total}</a>";
                  }

                  if($this->page<$this->total){
                  $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page+1)."'>下一页</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$this->total'>尾页</a>";
                  }

                  $page_banner.="<form action='".$_SERVER['PHP_SELF']."' method='get'>";
                  $page_banner.="跳转到<input type='text' name='page'  size='2'>页";
                  $page_banner.="<input type='submit' value='GO'></form>";

                  // $page_banner.="</div>";
                  return $page_banner;
}

//前台栏目页面,根据get的cate_id进行查询
public function b1($id)
{
   $this->page=@$_GET['page']?$_GET['page']:1;//当前页码
                  //计算总页数
                  $sql="select count(*) from $this->model where cate_id=$id";
                  $res=$this->db->query($sql);
                  $num=$res->fetchColumn();//总记录数
                  $this->total=ceil($num/$this->pagesize);//总页数
                  $offset=($this->showpage-1)/2;//偏移量

                  $sql="select * from $this->model where cate_id=$id order by id desc limit ".($this->page-1)*$this->pagesize.','.$this->pagesize;
                  $res=$this->db->query($sql);
                  $rows=$res->fetchAll(PDO :: FETCH_ASSOC);
                  return $rows;
}


//前台栏目页面分页导航条
public function c1($id)
{
   $offset=($this->showpage-1)/2;//偏移量
   $page_banner="<div class='page'>";
                  if($this->page>1){
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=1&id=$id'>首页</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page-1)."&id=$id'>上一页</a>";
                  }

                  //初始化
                
                  if($this->total>$this->showpage){
                    if($this->page>$offset+1){
                      $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=1&id=$id'>1</a>……";
                      $start=$this->page-$offset;
                      $end=($this->page+$offset)<$this->total?($this->page+$offset):$this->total;
                    }else{
                      $start=1;
                      $end=$this->showpage;
                    }
                  }else{
                    $start=1;
                    $end=$this->total;
                  }
                  
                  for($i=$start;$i<=$end;$i++){
                    if($i==$this->page){
                      $page_banner.="<span class='current'>{$i}</span>";
                    }else{
                      $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$i&id=$id'> {$i} </a>";
                    }
                  }
                    if($this->total>$this->showpage&&$this->total>$this->page+$offset){
                    $page_banner.="……<a href='".$_SERVER['PHP_SELF']."?page={$this->total}&id=$id'>{$this->total}</a>";
                  }

                  if($this->page<$this->total){
                  $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page+1)."&id=$id'>下一页</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$this->total&id=$id'>尾页</a>";
                  }

                  $page_banner.="<form action='".$_SERVER['PHP_SELF']."' method='get'>";
                  $page_banner.="跳转到<input type='text' name='page'  size='2'>页";
                  $page_banner.="<input type='hidden' name='id' value='$id'>";
                  $page_banner.="<input type='submit' value='GO'></form>";

                  $page_banner.="</div>";
                  return $page_banner;
}

//blog页面，根据文章id查询评论,返回$rows
public function b2($a_id)
{
                  $this->page=@$_GET['page']?$_GET['page']:1;//当前页码
                  //计算总页数
                  $sql="select count(*) from $this->model where a_id=$a_id";
                  $res=$this->db->query($sql);
                  $this->num=$res->fetchColumn();//总记录数
                  $this->total=ceil($this->num/$this->pagesize);//总页数
                  $offset=($this->showpage-1)/2;//偏移量
                  $sql="select * from $this->model where a_id=$a_id order by id desc limit ".($this->page-1)*$this->pagesize.','.$this->pagesize;
                  $res=$this->db->query($sql);
                  $rows=$res->fetchAll(PDO :: FETCH_ASSOC);
                  return $rows;
}





//blog页面分页导航条
public function c2($id)
{
   $offset=($this->showpage-1)/2;//偏移量
   $page_banner="";
                  if($this->page>1){
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=1&id=$id'>首页</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page-1)."&id=$id'>上一页</a>";
                  }

                  //初始化
                
                  if($this->total>$this->showpage){
                    if($this->page>$offset+1){
                      $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=1&id=$id'>1</a>……";
                      $start=$this->page-$offset;
                      $end=($this->page+$offset)<$this->total?($this->page+$offset):$this->total;
                    }else{
                      $start=1;
                      $end=$this->showpage;
                    }
                  }else{
                    $start=1;
                    $end=$this->total;
                  }
                  
                  for($i=$start;$i<=$end;$i++){
                    if($i==$this->page){
                      $page_banner.="<a href='' class='active'> {$i} </a>";
                    }else{
                      $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$i&id=$id'> {$i} </a>";
                    }
                  }
                    if($this->total>$this->showpage&&$this->total>$this->page+$offset){
                    $page_banner.="……<a href='".$_SERVER['PHP_SELF']."?page={$this->total}&id=$id'>{$this->total}</a>";
                  }

                  if($this->page<$this->total){
                  $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page+1)."&id=$id'>下一页</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$this->total&id=$id'>尾页</a>";
                  }

                 /* $page_banner.="<form action='".$_SERVER['PHP_SELF']."' method='get'>";
                  $page_banner.="跳转到<input type='text' name='page'  size='2'>页";
                  $page_banner.="<input type='hidden' name='id' value='$id'>";
                  $page_banner.="<input type='submit' value='GO'></form>";*/

                  // $page_banner.="</div>";
                  return $page_banner;
}
	}



