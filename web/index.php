<?php
  // error_reporting (E_ALL & ~E_NOTICE);
  // header("Content-Type:text/html;charset=UTF-8");
  // var_dump($_GET['id']);
  $id = @$_GET['id'];
  $pdo = new PDO("mysql:local=localhost;dbname=db_youme","root","root");
  // $sql = ;
  $pdo -> query("set names utf8;");
  // if (isset($_GET['page'])) {
    if (@$_GET['page'] == '') {
      $page = 0;
    }else{
      $page = @$_GET['page']*10-10;
    }
  // }else {
    // $page = 0;
  // }
  $count = $pdo -> query("select count(*) from tb_article");
  $res = $pdo -> query("select * from tb_article limit $page,10");
  $row = $count -> fetch();
  $pageall = ceil(intval($row[0])/10);
  // var_dump($pageall);
  // foreach ($res as $key => $row) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Language" content="zh-CN" />
	<meta name="keywords" content="你我网,圈圈说,汉中,汉中圈圈,你我,如是观,心理,感情,youmew" />
	<meta name="description" content="你我网，缘自圈圈说，记载着圈圈的生活过往，只为留住那份曾经的感动；圈圈，又名小尤，前半生执著于感情，命途多舛，故孑然一身。" />
	<title>你我网  - www.Youmew.com</title>
	<link rel="stylesheet" rev="stylesheet" href="./style/style.css" type="text/css" media="screen" />
    <link rel="shortcut icon" href="/favicon.ico" />
	<script src="./style/common.js" type="text/javascript"></script>
	<script src="./style/c_html_js_add.js" type="text/javascript"></script>
	<script src="./style/custom.js" type="text/javascript"></script>
	<link rel="alternate" type="application/rss+xml" href="./style/feed.css" title="你我网 " />
</head>
<body class="multi default">
<div id="divAll">
	<div id="divPage">
	<div id="divMiddle">
		<div id="divTop">
			<h1 id="BlogTitle"><a href="index.php"><img src="./images/LOGO.gif" alt="你我网" onMouseover="shake(this,'onmouseout')" /></a></h1>
			<!-- <h3 id="BlogSubTitle">www.Youmew.com</h3> -->
		</div>
		<div id="divNavBar">
<ul>
<li><a href="index.php">首页</a></li><li><a href="list.php?class='大生活'" title="感悟生活点滴">大生活</a></li><li><a href="shadow.php?class='光影斑斓'" title="光与影的艺术">光影斑斓</a></li><li><a href="ifture.php?class='如是观'" title="一切有为法，如梦幻泡影，如露亦如电，应作如是观。">如是观</a></li><li><a href="http://www.youmew.com/t/" target="_blank" title="还是以前的圈圈微博！">圈圈说</a></li><li><a href="http://www.youmew.com/guestbook.html" title="沟通从这里开始">留言本</a></li>
</ul>
		</div>
		<div id="divMain">
      <?php
      foreach ($res as $key => $row) {
        // var_dump($row);
        
echo "<div class='post multi-post cate4 auth1'>";
	echo "<h4 class='post-date'>";echo $row['up_date'];echo "</h4>";
	echo "<h2 class='post-title'>";echo "<a href='article.php?id=".$row[0]."'>";echo $row[2];echo "</a></h2>";
	echo "<div class='post-body'><p>";echo $row['lead'];echo "</p></div>";
	echo "<h5 class='post-tags'>Tags: <span class='tags'><a href='tags.php?tags=".$row[9]."'>".$row[9]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row[10]."'>".$row[10]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row[11]."'>".$row[11]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row[12]."'>".$row[12]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row[13]."'>".$row[13]."</a>&nbsp;&nbsp;</span></h5>";
  $row_id = $row['art_id'];
  $mes_sum_num = $pdo->query("select count(message) from tb_message where art_id = $row_id");
  $mes_sum = $mes_sum_num->fetch();
  $sum = $mes_sum[0];
  if($_SERVER["HTTP_HOST"] == "http://youme.com/web/article.php?id='$id'"){
    $insert = "update tb_article set views = views+1 where art_id = $row_id";
    $pdo -> exec($insert);
  }
  $see = "select views from tb_article where art_id = $row_id";
  $see_row = $pdo->query($see);
  while($see_res = $see_row->fetch()){
    $see_num = $see_res[0];
  }

	echo "<h6 class='post-footer'>
		发布:圈圈 | 分类:".$row[14]." | 评论:".$sum." | 浏览:".$see_num."| <a href='article.php?id=".$row[0]."'>阅读全文 > </a>
	</h6>";
echo "</div>";
}
 ?>
<div class="post pagebar"><a href="index.php?page=<?php if(@$_GET['page']==''){echo '1';}else{if(@$_GET['page'] <= 1){echo '1';}else{echo $_GET['page']-1;}} ?>"><span class="page first-page">&laquo;</span></a>
  <?php
    for ($i=1; $i < $pageall+1; $i++) {
      echo "<a href='index.php?page=".$i."'><span class='page'>".$i."</span></a>";
    }
   ?>
  <a href='index.php?page=<?php if(@$_GET['page']==''){echo $pageall;}else{if(@$_GET['page']>=$pageall){echo $pageall;}else{echo @$_GET['page']+1;}} ?>'><span class="page last-page">&raquo;</span></a></div>
		</div>
		<div id="divSidebar">
<dl class="function" id="divSearchPanel">
<dt class="function_t">搜索</dt>
<dd class="function_c">
<div><div style="padding:0.5em 0 0.5em 1em;"><form method="post" action="search.php"><input type="text" name="edtSearch" id="edtSearch" size="12" /> <input type="submit" value="提交" name="btnPost" id="btnPost" /></form></div></div>
</dd>
</dl><dl class="function" id="divTags">
<dt class="function_t">按标签浏览</dt>
<dd class="function_c">
<ul><li class="tag-name tag-name-size-2"><a href="tags.php?tags=觉悟">觉悟<span class="tag-count"> (18)</span></a></li><li class="tag-name tag-name-size-3"><a href="tags.php?tags=人生">人生<span class="tag-count"> (26)</span></a></li><li class="tag-name tag-name-size-2"><a href="tags.php?tags=摄影">摄影<span class="tag-count"> (15)</span></a></li><li class="tag-name tag-name-size-2"><a href="tags.php?tags=爱情">爱情<span class="tag-count"> (11)</span></a></li><li class="tag-name tag-name-size-3"><a href="tags.php?tags=心情">心情<span class="tag-count"> (34)</span></a></li><li class="tag-name tag-name-size-3"><a href="tags.php?tags=生活">生活<span class="tag-count"> (28)</span></a></li><li class="tag-name tag-name-size-1"><a href="tags.php?tags=音乐">音乐<span class="tag-count"> (6)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=规则">规则<span class="tag-count"> (5)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=夕阳">夕阳<span class="tag-count"> (1)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=寂寞">寂寞<span class="tag-count"> (3)</span></a></li><li class="tag-name tag-name-size-1"><a href="tags.php?tags=过往">过往<span class="tag-count"> (8)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=西乡">西乡<span class="tag-count"> (3)</span></a></li><li class="tag-name tag-name-size-1"><a href="tags.php?tags=回忆">回忆<span class="tag-count"> (8)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=旅行">旅行<span class="tag-count"> (1)</span></a></li></ul>
</dd>
</dl><dl class="function" id="divComments">
<dt class="function_t">最新留言</dt>
<dd class="function_c">
<?php require('conn_web/left_leavword.php'); ?>
</dd>
</dl><dl class="function" id="divLinkage">
<dt class="function_t">友情链接</dt>
<dd class="function_c">
<?php
  $res_1 = $pdo -> query("select * from tb_url");
  echo "<ul>";
  for ($i=0; $i < 3; $i++) {
    if ($i==0) {
      echo "<li>";
    }
    foreach ($res_1 as $key => $row_1) {
      echo "<script l>
        function jump() {
          window.location='http://www.baidu.com';
        }
      </script>";
      echo "<a onclick='jump()' target='_blank'>";
      echo $row_1['url_name'];
      echo "</a>";
    }
    if ($i==2){
      echo "</li>";
      $li = 0;
    }
  }
  echo "</ul>";
  
 ?>
<!-- <ul><li><a href="http://www.nszbk.com" target="_blank">逆时针博客</a>　<a href="http://www.mybiketimes.com/" target="_blank">单车岁月</a>　<a href="http://www.lopwon.com/" target="_blank">立云图志</a></li><li><a href="http://qingchun.org/"target="_blank">青春</a>　<a href="http://www.gaohaipeng.com" target="_blank">高海鹏博客</a>　<a href="http://www.ccaipu.com/" target="_blank">程晨爱蒲</a>　</li></li><li><a href="http://lusongsong.com/daohang" rel="external nofollow" target="_blank">博客大全</a>　<a href="http://bestcherish.com/" target="_blank">灰常记忆</a>　<a href="http://www.swdsblog.com" target="_blank">随望淡思</a></li><li><a href="http://www.wangzhijun.com.cn" target="_blank">王志军博客</a>　<a href="http://duonuli.com/" target="_blank">多努力网</a></li><li></li><li><a href="http://www.panoramio.com/user/youmew" target="_blank">谷歌地球相册</a></li><li><a href="http://www.youmew.com/t/post-18.html" target="_blank" title="申请链接"><span style="color:#006000;">交换友情链接</span></a></li></ul> -->
</dd>
</dl><dl class="function" id="divMisc">
<dt class="function_t">分享到：</dt>
<dd class="function_c">
<ul><li><img src="./images/weixin.jpg" height="110" width="110" border="0" alt="你我网微信公众平台" title="微信扫一扫，关注圈圈的最新消息。" /></li><li><!-- Baidu Button BEGIN --><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到百度贴吧" href="#" class="bds_tieba" data-cmd="tieba"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a></div><script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["sqq","weixin","qzone","tsina","tieba","douban"],"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script><!-- Baidu Button END --></li><li><a href="http://www.youmew.com/feed.asp" target="_blank"><img src="./images/rss.png" height="31" width="88" border="0" alt="订阅本站的 RSS 2.0 新闻聚合" /></a></li></ul>
</dd>
</dl>

		</div>
		<div id="divBottom">
      <?php
          $stmt =$pdo ->prepare("select webmaster,ICP from tb_webmasterinfo");
          $stmt ->execute();
          $rows =$stmt ->fetch(PDO::FETCH_ASSOC);
      ?>
          <h3 id="BlogCopyRight"><script src="http://s20.cnzz.com/stat.php?id=681872&web_id=681872&show=pic" language="JavaScript"></script>　<?php echo @$rows["ICP"];?></h3>
			<h4 id="BlogPowerBy">Powered By <a href="http://www.rainbowsoft.org/" title="RainbowSoft Studio Z-Blog" target="_blank"><?php echo @$rows["webmaster"];?></a>　本站遵循<a rel="license" target="_blank" title="署名-非商业性使用-禁止演绎 3.0 中国大陆许可协议" href="http://creativecommons.org/licenses/by-nc-nd/3.0/cn/"> CC BY-NC-ND 3.0 CN协议 </a>。</h4>
		</div><div class="clear"></div>
	</div><div class="clear"></div>
	</div><div class="clear"></div>
</div>
<!-- dd BEGIN -->
<script language="JavaScript1.2">
var typ=["marginTop","marginLeft"],rangeN=10,timeout=0;
function shake(o,end){
var range=Math.floor(Math.random()*rangeN);
var typN=Math.floor(Math.random()*typ.length);
o["style"][typ[typN]]=""+range+"px";
var shakeTimer=setTimeout(function(){shake(o,end)},timeout);
o[end]=function(){clearTimeout(shakeTimer)};
}
  </script>
<!-- dd END -->
</body>
</html><!-- 16ms -->
