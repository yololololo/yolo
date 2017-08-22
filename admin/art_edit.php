<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>编辑文章</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./static/css/mine.css" type="text/css" rel="stylesheet">
        <script type="text/javascript">
        function check(){
            // alert('11');
           if(document.myform.cate_id.value=='0'){
            alert('请选择所属栏目！');
            return false;
           }
        }
        </script>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：文章管理-》编辑文章信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="javascript:window.history.back();">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>
        <?php 
        include('./function/conn.php');
        $id=$_GET['id'];
        $sql="select * from art where id=$id";
        $res=$db->query($sql);
        $v=$res->fetch(PDO :: FETCH_ASSOC);
        // var_dump($row);die();
        //标签处理
        $str=array();
        $flag=array();
            $str=explode(',', $v['tag']);
             $sql="select * from tag";
             $res=$db->query($sql);
             $rows=$res->fetchAll();
             foreach ($rows as $v1) {
                $flag[$v1['id']]='';
                 foreach($str as $v2){
                    if($v1['name']==$v2){
                        $flag[$v1['id']]='checked';
                    }
                 }
             }
        // var_dump($flag);die();
        
        //栏目处理
        $flag1=array();
        $sql="select * from cate";
        $res=$db->query($sql);
        while($row1=$res->fetch()){
            $flag1[$row1['id']]='';
            if($v['cate_id']==$row1['id']){
                $flag1[$row1['id']]="selected";
            }
        }
        // var_dump($flag1);die();

        ?>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="./lib/_art.php?act=edit&id=<?php echo $id; ?>" method="post" name="myform" enctype="multipart/form-data" onsubmit="return check()">
              <table border="1" width="100%" class="table_a">
                <tr>
                    <td>文章标题</td>
            <td><input type="text" name="title" required="required" value="<?php echo $v['title'];?>" /></td>
                </tr>
                 <tr>
                    <td>作者</td>
                    <td><input type="text" name="author" value="<?php echo $v['author']; ?>"/></td>
                </tr>
                <tr>
                    <td>标签</td>
                    <td>
                       
                            <?php
                            include('./function/conn.php');
                            $sql="select * from tag";
                            $res=$db->query($sql);
                            while($row=$res->fetch()){
                                $id=$row['id'];
                              echo "<label><input type='checkbox' name='tag[]' value='{$row['id']}'' $flag[$id]>{$row['name']}</label>";
                            }
                            
                            ?>
                        
                    </td>
                </tr>
                <tr>
                    <td>所属栏目</td>
                    <td>
                        <select name="cate_id" id="cate" >
                            <option value="0">请选择</option>
                            <?php
                                $sql="select * from cate";
                                $res=$db->query($sql);
                                while($row=$res->fetch()){
                                    $id=$row['id'];
                                    echo " <option $flag1[$id]  value='{$row[0]}'>{$row['name']}</option>";
                                }
                           
                            ?>
                        </select>
                        <font color="red" >*所属栏目不得为空</font>
                    </td>
                </tr>
               
                <tr>
                    <td>缩略图</td>
                    <td><input type="file" name="thumb" /></td>
                </tr>
                <tr>
                    <td>内容</td>
                    <td><?php  $a='test'; ?>
                    <!-- error!这里内容显示不出来 -->
                        <textarea name="content" id='content' style="width: 600px;height: 400px;">
                          <?php echo $v['content'];?>
                        </textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="提交">
                    </td>
                </tr>  
            </table>
            </form>
            <?php echo $v['content'];?>
        </div>
         <!-- 加载编辑器的容器 -->
      
                            <script id="container" name="content" type="text/plain">
                                    这里写你的初始化内容
                               
                            </script>
                            <!-- 配置文件 -->
                            <script type="text/javascript" src="./static/ueditor/ueditor.config.js"></script>
                            <!-- 编辑器源码文件 -->
                            <script type="text/javascript" src="./static/ueditor/ueditor.all.js"></script>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('content');
                               
                            </script>
    </body>
</html>