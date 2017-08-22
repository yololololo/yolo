<?php 
include('top.php');
include('./function/model.class.php');
$m=new model('words',5);
$rows=$m->b();
// var_dump($rows);

?>

    <!-- mainbar开始！ -->
   <div class="mainbar">
   <?php
   foreach($rows as $v){

    ?>

          <div class="article" style="padding:5px 20px 2px 20px; background:none; border:0;">
          <h2><span><em>
          <?php if(!empty($v['person'])){
            echo $v['person'];
          }else{
            echo "有人";
          }

           ?>
          </span> 说</em></h2><div class="clr"></div>
          <p style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;<em><?php echo $v['words']; ?></em></p>
          <?php 
            if(!empty($v['source'])){
            echo " <p style='text-align: right ;'><em>——《{$v['source']}》</em></p>";
          }
          ?>
          <p style="text-align: right ;"><em> <?php echo date("M dS，Y \a\\t  H:i a",$v['time']);?></em></p>
        </div>

        <?php } ?>
          <div class="article" style="padding:5px 20px 2px 20px; background:none; border:0;">
          <p><span class="butons"><?php echo $m->c(); ?></span></p>
        </div>
       
      </div>

    <!-- mainbar结束！ -->
  
<?php include('buttom.php');