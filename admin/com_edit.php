<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改评论</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./static/css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：评论管理-》修改评论信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="javascript:window.history.back();">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>
        <?php include('./function/conn.php');
            $id=$_GET['id'];
            $sql="select * from com where id=$id";
            $res=$db->query($sql);
            $v=$res->fetch();
            ?>
        <div style="font-size: 13px;margin: 10px 5px">
            <form action="./lib/_com.php?act=edit&id=<?php echo $v['id']; ?>" method="post">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>昵称</td>
                    <td><input type="text" name="nickname" value="<?php echo $v['nickname'];?>" /></td>
                </tr>
                <tr>
                    <td>所属文章</td>
                    <td>
                    <select name="a_id">
                    <?php
                    include('./function/conn.php');


                    $res=$db->query("select id from art");
                    echo "<option value=''>请选择</option>";
                    while($row=$res->fetch()){
                        if($row['id']==$v['a_id']){
                        echo "<option value=".$row['id']." selected>{$row['id']}</option>"; 
                        }
                        echo "<option value=".$row['id'].">{$row['id']}</option>";
                    }

                    ?>
                    </select>

                    </td>
                </tr>
                <tr>
                    <td>评论信息</td>
                    <td><textarea name="message"><?php echo $v['message'];?></textarea></td>
                </tr>
               
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>