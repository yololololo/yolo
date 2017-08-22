<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>文章列表</title>

        <link href="./static/css/mine.css" type="text/css" rel="stylesheet" />
        <link href="./static/css/page.css" type="text/css" rel="stylesheet" />

        <script type="text/javascript">
        function check(id){
            if(confirm('确定删除？')){
                location.href="./lib/_art.php?act=del&id="+id;
            }
        }
        </script>
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：文章管理-》文章列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="art_add.php">【添加文章】</a>
                </span>
            </span>
        </div>
        <div></div>
          <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>文章标题</td>
                        <td>作者</td>
                        <td>所属栏目</td>
                        <td>标签</td>
                        <td>缩略图</td>
                        <td>创建时间</td>
                        <td align="center">操作</td>
                    </tr>

                      <?php
              include('./function/conn.php');
              $page=@$_GET['page']?$_GET['page']:1;//当前页码
              $pagesize=5;//每页显示的记录数
              //计算总页数
               $sql="select count(*) from art";
               $res=$db->query($sql);
               $num=$res->fetchColumn();//总记录数
               $total=ceil($num/$pagesize);//总页数
               $showpage;//分页导航条显示的页码数量
               $sql="select * from art order by id desc limit ".($page-1)*$pagesize.','.$pagesize;
               $res=$db->query($sql);
               $rows=$res->fetchAll();
               // var_dump($rows);die();
               
               foreach ($rows as $row) {
                $sql="select name from cate where id={$row['cate_id']}";
                $res=$db->query($sql);
                $name=$res->fetch();
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['title']}</td>";
                echo "<td>{$row['author']}</td>";
                echo "<td>{$name[0]}</td>";
                echo "<td>{$row['tag']}</td>";
                echo "<td><img src='{$row['thumb']}' width='100' height='50'></td>";
                echo "<td>".date('Y-m-d H:i:s',$row['time'])."</td>";//格式化时间戳
                echo " <td><a href='javascript: onclick=check({$row['id']})'>删除</a><a href='art_edit.php?id={$row['id']}'>&nbsp;&nbsp;|&nbsp;&nbsp;修改</a></td>";
                echo "</tr>";
               }

               /*//error!以下代码只能输出一行记录
               while($row=$res->fetch()){
                $id=$row['cate_id'];
                $sql="select name from cate where id=$id";
                $res=$db->query($sql);
                // 将所属栏目id号转换为对应的栏目名称
                $sql="select name from cate where id={$row['cate_id']}";
                $res=$db->query($sql);
                $name=$res->fetch();
                echo $name[0];
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['title']}</td>";
                echo "<td>{$row['author']}</td>";
                echo "<td>{$name[0]}</td>";
                echo "<td>{$row['tag']}</td>";
                echo "<td><img src='{$row['thumb']}' width='100' height='50'></td>";
                echo "<td>".date('Y-m-d H:i:s',$row['time'])."</td>";//格式化时间戳
                echo " <td><a href='javascript: onclick=check({$row['id']})'>删除</a><a href='art_edit.php?id={$row['id']}'>&nbsp;&nbsp;|&nbsp;&nbsp;修改</a></td>";
                echo "</tr>";
               }*/
              

               //分页导航条
                $showpage=3;
                $offset=($showpage-1)/2;//偏移量
   $page_banner="<div class='page'>";
                  if($page>1){
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=1'>首页</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($page-1)."'>上一页</a>";
                  }

                  //初始化
                
                  if($total>$showpage){
                    if($page>$offset+1){
                      $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=1'>1</a>……";
                      $start=$page-$offset;
                      $end=($page+$offset)<$total?($page+$offset):$total;
                    }else{
                      $start=1;
                      $end=$showpage;
                    }
                  }else{
                    $start=1;
                    $end=$total;
                  }
                  
                  for($i=$start;$i<=$end;$i++){
                    if($i==$page){
                      $page_banner.="<span class='current'>{$i}</span>";
                    }else{
                      $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$i'> {$i} </a>";
                    }
                  }
                    if($total>$showpage&&$total>$page+$offset){
                    $page_banner.="……<a href='".$_SERVER['PHP_SELF']."?page={$total}'>{$total}</a>";
                  }

                  if($page<$total){
                  $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=".($page+1)."'>下一页</a>";
                    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?page=$total'>尾页</a>";
                  }

                  $page_banner.="<form action='".$_SERVER['PHP_SELF']."' method='get'>";
                  $page_banner.="跳转到<input type='text' name='page'  size='2'>页";
                  $page_banner.="<input type='submit' value='GO'></form>";

                  $page_banner.="</div>";

            ?> 
                  
                   
                    <tr>
                        <td colspan="20" style="text-align: center;padding:20px;">
                          <?php echo $page_banner; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>





 
        </div>
    </body>
</html>