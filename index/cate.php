<?php include('top.php');
include('./function/model.class.php');
if(!isset($_GET['id'])) die('非法用户！');
$id=$_GET['id'];
$m=new model('art');
$rows=$m->b1($id);;

// var_dump($rows);
// die();

?>

    <!-- mainbar开始！ -->

        <div class="mainbar">
        <!-- 文章开始 -->

          <?php 
          if(empty($rows)) echo "<center>暂无内容</center>w";
          foreach($rows as $v){ ?> 

          <div class="article">
          <h2><span><?php echo $v['title'] ?></span></h2>
          <div class="clr"></div>
          <p>Posted on <?php echo date('Y-m-d H:i:s',$v['time']) ?> by <?php echo $v['author']; ?>, with<a href="#"> Comments 18</a></p>
          <?php if($v['thumb']!=''){
            echo "<img src='{$v['thumb']}' width='613' height='193' alt='image' />";
          }
          
          ?>
          <div class="clr"></div>
          <!-- 文章内容 -->
          <?php if(strlen($v['content'])>100){
                  echo mb_substr($v['content'],0,100,'utf-8').'…………';
            }else{
              echo $v['content'];
            }

             ?>
          <p><a href="art.php?a_id=<?php echo $v['id'] ?>">更多</a></p>
        </div>

      <?php } ?>
       
        <!-- 文章结束 -->

       
        <div class="article" style="padding:5px 20px 2px 20px; background:none; border:0;">
          <p>Page 1 of 2 <span class="butons"><?php echo $m->c1($id); ?></span></p>
        </div>
      </div>
      

    <!-- mainbar结束！ -->
  
     <?php include('buttom.php');