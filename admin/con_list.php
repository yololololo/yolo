<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>联系人列表</title>

        <link href="./static/css/mine.css" type="text/css" rel="stylesheet" />
        <link href="./static/css/page.css" type="text/css" rel="stylesheet" />
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：联系人管理-》联系人列表</span>
               
            </span>
        </div>
        <div></div>
            <?php include('./function/page.class.php');
            $url1="./lib/_words.php";//删除操作url
            // $url2="cate_edit.php";
            $p=new page('contact',$url1);
            $p->run();
            ?> 


 
        </div>
    </body>
</html>