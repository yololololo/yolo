 <div class="sidebar">
        <div class="gadget">
          <h2><em>博客栏目</em></h2>
          <div class="clr"></div>
          <ul class="sb_menu">
          <?php 
          include('./function/conn.php');
          $res=$db->query("select * from cate");
          while($v=$res->fetch()){
            echo "<li><a href='cate.php?id={$v['id']}'>{$v['name']}</a></li>";
          }
           ?>
           
          </ul>
        </div>
        <div class="gadget">
        <div style="width: 100%;">
          <?php include('./function/calendar.php');?>
        </div>
         <!--  <h2><em>热门推荐</em></h2>
         <div class="clr"></div>
         <ul class="ex_menu">
           <li><a href="#" title="Website Templates">DreamTemplate</a><br />
             Over 6,000+ Premium Web Templates</li>
           <li><a href="http://www.templatesold.com" title="WordPress Themes">TemplateSOLD</a><br />
             Premium WordPress &amp; Joomla Themes</li>
           <li><a href="#" title="Affordable Hosting">ImHosted.com</a><br />
             Affordable Web Hosting Provider</li>
           <li><a href="#" title="Stock Icons">MyVectorStore</a><br />
             Royalty Free Stock Icons</li>
           <li><a href="#" title="Website Builder">Evrsoft</a><br />
             Website Builder Software &amp; Tools</li>
           <li><a href="#" title="CSS Templates">CSS Hub</a><br />
             Premium CSS Templates</li>
         </ul> -->
        </div>
        <?php include('./function/conn.php');
          $sql="select * from words order by id desc limit 1";
          $res=$db->query($sql);
          $v=$res->fetch();
         ?>
        <div class="gadget">
          <h2><em><?php echo $v['person'];?>说</em></h2>
          <div class="clr"></div>
          <p>   <img src="./static/images/test_1.gif" alt="image" width="20" height="18" /> <em><?php echo $v['words'];?></em>.<img src="./static/images/test_2.gif" alt="image" width="20" height="18" /></p>
          <p style="float:right;"><strong><?php echo date('Y/m/d',$v['time']);?></strong></p>
          </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="footer" style="text-align: center;">
      <p >(c) Copyright <a href="#">yolo</a>.</p>
      <p >email:18813293912@163.com</p>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>
