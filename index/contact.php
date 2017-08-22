<?php include('top.php');?>

    <!-- mainbar开始！ -->
	<div class="mainbar">
        <div class="article">
          <h2><span>Contact 联系</span></h2><div class="clr"></div>
          <p>如果您有任何问题，可以通过邮件与我联系</p>
        </div>
        <div class="article">
          <h2><span>Send me</span> mail</h2><div class="clr"></div>
          <form action="../admin/lib/_contact.php?act=add" method="post" id="sendemail">
          <ol><li>
            <label for="name">Name (required)</label>
            <input id="name" name="name" class="text" required="required" />
          </li><li>
            <label for="email">Email Address (required)</label>
            <input id="email" name="email" class="text" required="required" />
          </li><li>
            <label for="website">Website</label>
            <input id="website" name="website" class="text" />
          </li><li>
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="8" cols="50"></textarea>
          </li><li>
            <input type="submit" name="sub" value="submit" />
            <div class="clr"></div>
          </li></ol>
          </form>
        </div>
      </div> 

    <!-- mainbar结束！ -->
  
<?php include('buttom.php');