<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="./static/css/admin.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <table cellspacing=0 cellpadding=0 width="100%" align=center border=0>
            <tr height=28>
                <td background=./static/images/title_bg1.jpg>当前位置: </td></tr>
            <tr>
                <td bgcolor=#b1ceef height=1></td></tr>
            <tr height=20>
                <td background=./static/images/shadow_bg.jpg></td></tr></table>
        <table cellspacing=0 cellpadding=0 width="90%" align=center border=0 >
            <tr height=100>
                <td align=middle width=100><img height=100 src="./static/images/admin_p.gif" 
                                                width=90></td>
                <td width=60>&nbsp;</td>
                <td>
                    <table height=100 cellspacing=0 cellpadding=0 width="100%" >
                    <tr>
                            <td><h2>欢迎进入yolo博客管理中心！</h2></td></tr>

                        <tr>
                            <td>当前时间：<?php echo date('Y/m/d H:i:s',time()); ?></td></tr>
                            <tr>
                            <td>ip地址：<?php echo $_SERVER['REMOTE_ADDR'];  ?></td></tr>
                        </table></td></tr>
            <tr>
                <td colspan=3 height=10></td></tr></table>
      
       
<div style="text-align:center;">
<p></p>
</div>
    </body>
</html>