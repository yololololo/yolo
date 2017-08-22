<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="./static/css/admin.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <table cellspacing=0 cellpadding=0 width="100%" 
               style="background-color: #0092FF;" border=0>
            <tr height=56>
                <td width=260><img height=56 src="./static/images/header_left.jpg" 
                                   width=260></td>
                                   <td align="left" ><font style="font-size: 16px;color:white;">Yolo's Blog</font></td>
                <td style="font-weight: bold; color: #fff; padding-top: 5px;padding-right:50px;text-align: right;" 
                    align=middle>当前用户：<?php session_start();echo $_SESSION['admin'];  ?> &nbsp;&nbsp; <a style="color: #fff" 
                                                        href="admin_edit.php" 
                                                        target='right'>修改口令</a> &nbsp;&nbsp; <a style="color: #fff" 
                                                        onclick="if (confirm('确定要退出吗？')) return true; else return false;" 
                                                        href="login.php?act=logout" target=_parent>退出系统</a> 
                </td>
                </tr></table>
        <table cellspacing=0 cellpadding=0 width="100%" border=0>
            <tr bgcolor=#1c5db6 height=4>
                <td></td>
            </tr>
        </table>
    </body>
</html>