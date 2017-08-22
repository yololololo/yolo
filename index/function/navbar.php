<?php
//分页导航条，返回字符串
public function nav($id)
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
                      $page_banner.="<span class='active'>{$i}</span>";
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

                  // $page_banner.="</div>";
                  return $page_banner;
}