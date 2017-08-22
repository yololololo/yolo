<?php 
include('top.php');
include('./function/conn.php');
if(!isset($_GET['a_id'])) die('非法操作');
$a_id=$_GET['a_id'];
$sql="select * from art where id=$a_id";
$res=$db->query($sql);
$v=$res->fetch();

?>

    <!-- mainbar开始！ -->
   <div class="mainbar">
        <div class="article">
          <h2><?php echo $v['title'] ?></h2><div class="clr"></div>
          <p><?php echo $v['author']; ?><span>&nbsp;&bull;&nbsp;</span> <?php echo date('Y-m-d H:i:s',$v['time']); ?></p>
          <!-- 图片 -->
           <?php if($v['thumb']!=''){
            echo "<img src='{$v['thumb']}' width='613' height='193' alt='image' />";
          }
          
          ?>
          <!-- 文章内容 -->
            <?php echo $v['content']; ?>
          <p>标签: <?php echo $v['tag']; ?></p>
        </div>
         <!-- 评论 -->
         <?php
          include('./function/model.class.php');
          $com=new model('com');
          $rows=$com->b2($v['id']);
          // var_dump($rows);die();
          ?>

         <div class="article">
          <h2 style="float:left;">评论 &nbsp;&nbsp;</h2><div style="margin-top:15px ;">共有<?php echo $com->num;?>条</div><div class="clr"></div>
           <?php
          foreach($rows as $row){
          ?>
          <div class="comment">
            <a href="#"><img src="./static/images/userpic.gif" width="40" height="40" alt="user" class="userpic" /></a>
            <p><a href="#"><?php echo $row['nickname'];?></a> Says:<br />
            <?php echo date("M dS，Y \a\\t  H:i a",$row['time']);?></p>
            <div><?php echo $row['message'];?></div>
          </div>
           <?php } ?>
            <!-- 分页开始 -->
        <div class="article">
          <p><span class="butons"><?php echo $com->c2($v['id']); ?></span></p>
        </div>
        </div>
            <!-- 分页结束 -->

          <!-- 评论结束-->
         
         
      
        <div class="article">
          <h2>留言</h2><div class="clr"></div>
          <form action="../admin/lib/_com.php?act=add&a_id=<?php echo $v['id']; ?>" method="post" id="leavereply">
          <ol><li>
            <label for="nickname">姓名</label>
            <input id="name" name="nickname" class="text" />
          </li><li>
            <label for="message">信息</label>
            <textarea id="message" name="message" rows="8" cols="50"></textarea>
          </li><li>
            <input type="submit" name="sub" value="提交" />
            <div class="clr"></div>
          </li></ol>
          </form>
        </div>
      </div>

    <!-- mainbar结束！ -->
  
<?php include('buttom.php');