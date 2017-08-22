<?php include('top.php');
include('./function/model.class.php');
include('./function/conn.php');
$m=new model('art',2);
$rows=$m->b();
// var_dump($rows);

?>

    <!-- mainbar开始！ -->

        <div class="mainbar">
        <!-- 文章开始 -->
          <?php foreach($rows as $v){ 
            $sql="select count(*) from com where a_id={$v['id']}";
            $res=$db->query($sql);
            $num=$res->fetchColumn();
            ?> 

          <div class="article">
          <h2><span><?php echo $v['title'] ?></span></h2>
          <div class="clr"></div>
          <p><?php echo $v['author']; ?><span>&nbsp;&bull;&nbsp;</span> <?php echo date('Y-m-d H:i:s',$v['time']); ?><span>&nbsp;&bull;&nbsp;</span>评论（<?php echo $num; ?>）</p>
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
          <p><span class="butons"><?php echo $m->c(); ?></span></p>
        </div>

      </div>
      

    <!-- mainbar结束！ -->
  
     <?php include('buttom.php');