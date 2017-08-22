<style>
 .article { margin:0 0 20px 0;  padding:30px 20px;  width:610px;}
 .article span.butons a { margin:0 5px 0 0;  color:#9a9a9a; padding:1px 10px; text-decoration:none;  border:1px solid #ebe8e8; background:#fbfbfc;}
 .article span.butons a:hover { border:1px solid #d9f0ff; background:#40b5ff; color:#fff; text-decoration:none;}
 .article span.butons a.active {  border:1px solid #ebe8e8;  background:#40b5ff; color:#fff; text-decoration:none;}
</style>
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
   $page_banner='';
                  if($this->page>1){
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=1'>首页</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page-1)."'>Prev</a>";
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
                      $page_banner.="<a href=''class='active'> {$i} </a>";
                    }else{
                      $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$i'> {$i} </a>";
                    }
                  }
                    if($this->total>$this->showpage&&$this->total>$this->page+$offset){
                    $page_banner.="……<a href='".$_SERVER['PHP_SELF']."?page={$this->total}'>{$this->total}</a>";
                  }

                  if($this->page<$this->total){
                  $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page+1)."'>Next</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$this->total'>尾页</a>";
                  }

                  $page_banner.="<form action='".$_SERVER['PHP_SELF']."' method='get'>";
                  $page_banner.="跳转到<input type='text' name='page'  size='2'>页";
                  $page_banner.="<input type='submit' value='GO'></form>";

                  // $page_banner.="</div>";
                  return $page_banner;
}
}

$m=new model('com');
$m->b();
?>
<div class="article" style="padding:5px 20px 2px 20px; background:none; border:0;">
          <p><span class="butons"><?php echo $m->c();?> <a href="#" class="active">1</a></span></p>
        </div>




