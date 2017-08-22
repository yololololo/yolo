 <script type="text/javascript">
        function check(url,id){
            if(confirm('确定删除？')){
                location.href=url+"?act=del&id="+id;
            }
        }
        </script>
<?php
class page
{
  public $db;
  public $page;//当前页
  public $table;//表格名称
  public $total;//总页数
  public $pagesize;//每页显示的记录数
  public $showpage;//分页导航条显示的页码数量
  public $url1;//删除操作的url
  public $url2;//编辑操作的url
	public function __construct($table,$url1='',$url2='',$pagesize="3",$showpage="3")
	{
		include('conn.php');
    $this->table=$table;
    $this->url1=$url1;
    $this->url2=$url2;
    $this->pagesize=$pagesize;
    $this->showpage=$showpage;
    $this->db=$db;
    
  }

//表头,返回由字段名构成的一维数组
  public function a()
  {
    $th=array();
    $sql="desc $this->table";
    $res=$this->db->query($sql);
    while($row=$res->fetch()){
     $th[]=$row['Field'];
    }
    return $th;
  }
//表内容，返回二维数组
public function b()
{
  $rows=array();
   $this->page=@$_GET['page']?$_GET['page']:1;//当前页码
                  //计算总页数
                  $sql="select count(*) from $this->table";
                  $res=$this->db->query($sql);
                  $num=$res->fetchColumn();//总记录数
                  $this->total=ceil($num/$this->pagesize);//总页数
                  $offset=($this->showpage-1)/2;//偏移量

                  $sql="select * from $this->table order by id desc limit ".($this->page-1)*$this->pagesize.','.$this->pagesize;
                  $res=$this->db->query($sql);
                  $rows=$res->fetchAll(PDO :: FETCH_NUM);
                  return $rows;
}
//分页导航条
public function c()
{
   $offset=($this->showpage-1)/2;//偏移量
   $page_banner="<div class='page'>";
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
                      $page_banner.="<span class='current'>{$i}</span>";
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

                  $page_banner.="</div>";
                  return $page_banner;
}

public function run()
{
  //输出表头
  echo "<table width='100%'><tbody><tr style='font-weight: bold;'>";
          $th=$this->a();
          for($i=0;$i<count($th);$i++){
            echo "<th>$th[$i]</th>";
          }
          if(!empty($this->url1)||!empty($this->url2)){
            echo "<th>操作</th>";
          }
          // echo "<th>操作</th>";
  echo "</tr>";
  //输出表内容
  $rows=$this->b();
          for($i=0;$i<count($rows);$i++){
            echo "<tr>";
            for($j=0;$j<count($rows[$i]);$j++){
              echo "<td>{$rows[$i][$j]}</td>";
            }
            // <a href='javascript: onclick=check($a)'>删除</a>

            // $url='"{$this->url1}?act=del&id={$rows[$i][0]}"';
            // echo "<td><a href='javascript:".$a."location=".$url.";'>删除</a>"; 
            // echo "&nbsp;&nbsp;| <a href='{$this->url2}?act=edit&id={$rows[$i][0]}'>修改</a></td>";  

            // echo "<td><a href='javascript:if(confirm("确实要删除吗?")) 
            // location="{$this->url1}?act=del&id={$rows[$i][0]}"'>删除</a>&nbsp;&nbsp;|
            // <a href='{$this->url2}?act=edit&id={$rows[$i][0]}'>修改</a></td>";
            
            if(!empty($this->url1)&&!empty($this->url2)){
            echo "<td width='100px'><a href='{$this->url1}?act=del&id={$rows[$i][0]}'>删除</a>&nbsp;&nbsp;|
            <a href='{$this->url2}?act=edit&id={$rows[$i][0]}'>修改</a></td>";
            echo "</tr>";
          }elseif(!empty($this->url1)&&empty($this->url2)){
             echo "<td><a href='{$this->url1}?act=del&id={$rows[$i][0]}'>删除</a></td>";
            echo "</tr>";
          }

            /*echo "<td><a href='{$this->url1}?act=del&id={$rows[$i][0]}'>删除</a>&nbsp;&nbsp;|
            <a href='{$this->url2}?act=edit&id={$rows[$i][0]}'>修改</a></td>";
            echo "</tr>";
          }*/
        }

  //输出分页导航条
  echo " <tr ><td style='padding:20px;background:white;' colspan='20' style='text-align: center;'>{$this->c()}</td><tr></tbody></table>";
}



	}



