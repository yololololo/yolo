<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加日签</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./static/css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：日签管理-》添加日签信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="javascript:window.history.back();">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="./lib/_words.php?act=add" method="post">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>Person</td>
                    <td><input type="text" name="person"  /></td>
                </tr>
                 <tr>
                    <td>Words</td>
                    <td><input type="text" name="words" required="required" /></td>
                </tr>
                 <tr>
                    <td>Source</td>
                    <td><input type="text" name="source" /></td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html>