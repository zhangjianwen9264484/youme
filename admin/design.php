<?php
  $pdo = new PDO("mysql:local=localhost;dbname=db_youme","root","root");
  $pdo -> query("set names utf8;");
  $class_search = @$_POST['search-sort'];
  $keywords = @$_POST['keywords'];
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.php" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.php">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="">管理员</a></li>
                <li><a href="register.php">修改密码</a></li>
                <li><a href="login.php">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="design.php"><i class="icon-font">&#xe008;</i>作品管理</a></li>
                        <li><a href="design.php"><i class="icon-font">&#xe005;</i>博文管理</a></li>
                        <li><a href="design.php"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="message.php"><i class="icon-font">&#xe004;</i>留言管理</a></li>
                        <li><a href="design.php"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="design.php"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="design.php"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="system.php"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="system.php"><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="system.php"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="system.php"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                 <option value="">全部</option>
                                  <?php
                                    $res_c = $pdo -> query("select DISTINCT class,class_num from tb_article");
                                    // $row = $res_c -> fetchAll();
                                    // var_dump($row);
                                    foreach ($res_c as $key => $show_c) {
                                      echo "<option value=\"".$show_c['class_num']."\">".$show_c['class']."</option>";
                                    }
                                   ?>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post" action="conn_admin/art_del_some.php">
                <div class="result-title">
                    <div class="result-list">
                        <a href="insert.php"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" onclick="document.getElementById('myform').submit();"><i class="icon-font" ></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>标题</th>
                            <th>审核状态</th>
                            <th>点击</th>
                            <th>发布人</th>
                            <th>更新时间</th>
                            <th>评论</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        if ($class_search != "" || $keywords != "") {
                        // echo "<script>alert(\"class\");</script>";
                          if ($class_search == "") {
                            // echo "<script>alert('下拉为空');</script>";
                            // var_dump(@$class_num);
                            // var_dump($keywords);
                            $res = $pdo -> query("select * from tb_article where headline like '%$keywords%' or content like '%$keywords%'");
                            $count = $pdo -> query("select count(*) from tb_article where headline like '%$keywords%' or content like '%$keywords%'");
                          }else if($keywords == ""){
                            // echo "<script>alert('搜索框为空');</script>";
                            $res = $pdo -> query("select * from tb_article where class_num = '$class_search'");
                            $count = $pdo -> query("select count(*) from tb_article where class_num = '$class_search'");
                          }else {
                            // echo "<script>alert('全不为空');</script>";
                            $res = $pdo -> query("select * from tb_article where class_num = '$class_search' and (headline like '%$keywords%' and content like '%$keywords%')");
                            $count = $pdo -> query("select count(*) from tb_article where class_num = '$class_search' and (headline like '%$keywords%' and content like '%$keywords%')");
                            // echo "<script>alert($class_search);</script>";
                          }
                          foreach ($res as $key => $show) {
                            $show_id = $show['art_id'];
                            echo "<tr>
                               <td class=\"tc\"><input name=\"id[]\" value=\"".$show['id']."\" type=\"checkbox\"></td>
                               <td>
                                   <input name=\"ids[]\" value=\"".$show['id']."\" type=\"hidden\">
                                   <input class=\"common-input sort-input\" name=\"ord[]\" value=\"0\" type=\"text\">
                               </td>
                               <td>".$show['id']."</td>
                               <td title=\"".$show['headline']."\"><a target=\"_blank\" href=\"../web/article.php?id=".$show['id']."\" title=\"".$show['headline']."\">".$show['headline']."</a> …
                               </td>
                               <td>0</td>
                               <td>2</td>
                               <td>".$show['publisher']."</td>
                               <td>".$show['up_date']."</td>
                               <td></td>
                               <td>
                               <a class=\"link-update\" href=\"conn_admin/art_alt.php?id=".$show_id."\">修改</a>
                               <a class=\"link-del\" href=\"conn_admin/art_del.php?del_id=".$show_id."\">删除</a>
                               </td>
                           </tr>";
                          }
                        }else {
                          $res_s = $pdo -> query("select * from tb_article");
                          $count = $pdo -> query("select count(*) from tb_article");
                          foreach ($res_s as $key => $show) {
                            $show_id = $show['art_id'];
                            echo "<tr>
                               <td class=\"tc\"><input name=\"id_".$show_id."\" value=\"".$show_id."\" type=\"checkbox\"></td>
                               <td>
                                   <input name=\"ids_\" value=\"".$show['art_id']."\" type=\"hidden\">

                                   <input class=\"common-input sort-input\" name=\"ord_\" value=\"0\" type=\"text\">
                               </td>
                               <td>".$show['art_id']."</td>
                               <td title=\"".$show['headline']."\"><a target=\"_blank\" href=\"../web/article.php?id=".$show['art_id']."\" title=\"".$show['headline']."\">".$show['headline']."</a> …
                               </td>
                               <td>0</td>
                               <td>2</td>
                               <td>".$show['publisher']."</td>
                               <td>".$show['up_date']."</td>
                               <td></td>
                               <td>
                                   <a class=\"link-update\" href=\"conn_admin/art_alt.php?id=".$show_id."\">修改</a>
                                   <a class=\"link-del\" href=\"conn_admin/art_del.php?del_id=".$show_id."\">删除</a>
                               </td>
                           </tr>";
                          }
                        }
                         ?>
                    </table>
                    <?php
                      $count_show = $count -> fetch();
                     ?>
                    <div class="list-page"> <?php echo $count_show[0]; ?> 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>
