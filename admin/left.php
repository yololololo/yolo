<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="./static/css/admin.css" type="text/css" rel="stylesheet" />
        <script language=javascript>
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body>
        <table height="100%" cellspacing=0 cellpadding=0 width=170 
               background=./static/images/menu_bg.jpg border=0>
               <tr>
                <td valign=top align=middle>
                    <table cellspacing=0 cellpadding=0 width="100%" border=0>

                        <tr>
                            <td height=10></td></tr></table>
                            <!-- 0、栏目管理 -->
                    <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=./static/images/menu_bt.jpg><a 
                                    class=menuparent onclick=expand(0) 
                                    href="javascript:void(0);">栏目管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child0 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="cate_list.php" 
                                   target='right'>栏目列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="cate_add" 
                                   target='right'>添加栏目</a></td></tr>
                      
                        <tr height=4>
                            <td colspan=2></td></tr></table>

                                <!-- 1、文章管理 -->
                              <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=./static/images/menu_bt.jpg><a 
                                    class=menuparent onclick=expand(1) 
                                    href="javascript:void(0);">文章管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child1 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="art_list.php" 
                                   target='right'>文章列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="art_add" 
                                   target='right'>添加文章</a></td></tr>
                      
                        <tr height=4>
                            <td colspan=2></td></tr></table>

                                <!-- 2、标签管理 -->
                              <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=./static/images/menu_bt.jpg><a 
                                    class=menuparent onclick=expand(2) 
                                    href="javascript:void(0);">标签管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child2 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="tag_list.php" 
                                   target='right'>标签列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="tag_add" 
                                   target='right'>添加标签</a></td></tr>
                      
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                                <!-- 3、评论管理 -->
                              <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=./static/images/menu_bt.jpg><a 
                                    class=menuparent onclick=expand(3) 
                                    href="javascript:void(0);">评论管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child3 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="com_list.php" 
                                   target='right'>评论列表</a></td></tr>
                      
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                            <!-- 4、日签管理 -->
                               <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=./static/images/menu_bt.jpg><a 
                                    class=menuparent onclick=expand(4) 
                                    href="javascript:void(0);">日签管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child4 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="words_list.php" 
                                   target='right'>日签列表</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="words_add" 
                                   target='right'>添加日签</a></td></tr>
                      
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                            <!-- 5、联系管理 -->
                               <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=./static/images/menu_bt.jpg><a 
                                    class=menuparent onclick=expand(5) 
                                    href="javascript:void(0);">和我联系</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child5 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="con_list.php" 
                                   target='right'>联系人信息</a></td></tr>
                      
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                   <!-- 6、个人管理 -->
                    <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=./static/images/menu_bt.jpg><a 
                                    class=menuparent onclick=expand(6) 
                                    href="javascript:void(0);">个人管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child6 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>

                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="admin_edit.php" 
                                   target='right'>修改口令</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="./static/images/menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   onclick="if (confirm('确定要退出吗？')) return true; else return false;" 
                                   href="login.php?act=logout" 
                                   target=_parent>退出系统</a></td></tr></table></td>
                <td width=1 bgcolor=#d1e6f7></td>
            </tr>
        </table>
    </body>
</html>