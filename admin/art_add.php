<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加文章</title>
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
                <span style="float:left">当前位置是：文章管理-》添加文章信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="javascript:window.history.back();">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="./lib/_art.php?act=add" method="post" name="myform" enctype="multipart/form-data" onsubmit="return check()">
              <table border="1" width="100%" class="table_a">
                <tr>
                    <td>文章标题</td>
                    <td><input type="text" name="title" required="required" placeholder="必填字段" /></td>
                </tr>
                 <tr>
                    <td>作者</td>
                    <td><input type="text" name="author" /></td>
                </tr>
                <tr>
                    <td>标签</td>
                    <td>
                       
                            <?php
                            include('./function/conn.php');
                            $sql="select * from tag";
                            $res=$db->query($sql);
                            while($row=$res->fetch()){
                                echo "<label><input type='checkbox' name='tag[]' value='{$row['id']}'>{$row['name']}</label>";
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
                                    echo " <option value='{$row[0]}'>{$row['name']}</option>";
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
                    <td>
                        <textarea name="content" id='content' style="width: 600px;height: 400px;">
                           

                        </textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
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