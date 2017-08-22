<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>标签列表</title>

        <link href="./static/css/mine.css" type="text/css" rel="stylesheet" />
        <link href="./static/css/page.css" type="text/css" rel="stylesheet" />
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：标签管理-》标签列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="tag_add.php">【添加标签】</a>
                </span>
            </span>
        </div>
        <div></div>
            <?php include('./function/page.class.php');
            $url1="./lib/_tag.php";
            $url2="tag_edit.php";
            $p=new page('tag',$url1,$url2,3);
            $p->run();
            ?> 


 
        </div>
    </body>
</html>