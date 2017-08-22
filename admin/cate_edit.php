<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改栏目</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./static/css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：栏目管理-》修改栏目信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="javascript:window.history.back();">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
           <?php
                    include('./function/conn.php');
                    $id=$_GET['id'];
                    $sql="select * from cate where id=$id";
                    $res=$db->query($sql);
                    $row=$res->fetch();
                    ?>
            <form action="./lib/_cate.php?act=edit&id=<?php echo $row[0]; ?>" method="post">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>栏目名称</td>
                 

                    <td><input type="text" name="cate_name" value="<?php echo $row['name'];?>" /></td>
                    
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