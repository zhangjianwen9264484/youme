<?php
  // header("Content-Type:text/html;charset=UTF-8");
  // var_dump($_GET['id']);
  $id = @$_GET['id'];
  $tags = $_GET['tags'];
  $pdo = new PDO("mysql:local=localhost;dbname=db_youme","root","root");
  // $sql = ;
  $pdo -> query("set names utf8;");
  $res = $pdo -> query("select * from tb_article where tag_1 = '$tags' or tag_2 = '$tags' or tag_3 = '$tags' or tag_4 = '$tags' or tag_5 = '$tags'");
  // $row = $res -> fetchAll();
  // var_dump($res);
  // var_dump($row);
  // foreach ($res as $key => $row) {
  if (@$_GET['page'] == '') {
    $page = 0;
  }else{
    $page = $_GET['page']*10-10;
  }
  $count = $pdo -> query("select * from tb_article where class = '如是观'");
  $res = $pdo -> query("select * from tb_article where class = '如是观' limit $page,10");
  $row = $count -> fetch();
  $pageall = ceil(intval($row[0])/10);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Language" content="zh-CN" />
	<meta name="keywords" content="你我网,圈圈说,汉中,汉中圈圈,你我,如是观,心理,感情,youmew" />
	<meta name="description" content="你我网，缘自圈圈说，记载着圈圈的生活过往，只为留住那份曾经的感动；圈圈，又名小尤，前半生执著于感情，命途多舛，故孑然一身。" />
	<title>大生活 - 你我网 </title>
	<link rel="stylesheet" rev="stylesheet" href="./style/style.css" type="text/css" media="screen" />
    <link rel="shortcut icon" href="/favicon.ico" />
	<script src="./style/common.js" type="text/javascript"></script>
	<script src="./style/c_html_js_add.js" type="text/javascript"></script>
	<script src="./style/custom.js" type="text/javascript"></script>
</head>
<body class="multi catalog">
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
			// var_dump($res);
			//   var_dump($row);

				// var_dump($row['tag_1']);
				$row_id = $row['art_id'];
			$mes_sum_num = $pdo->query("select count(message) from tb_message where art_id = $row_id");
  			$mes_sum = $mes_sum_num->fetch();
  			$sum = $mes_sum[0];
			echo "<div class='post multi-post cate4 auth1'>";
			echo "<h4 class='post-date'>";echo $row['up_date'];echo "</h4>";
			echo "<h2 class='post-title'><a href='article.php?id=".$row['id']."'>";echo $row['headline'];echo "</a></h2>";
			echo "<div class='post-body'><p>";echo $row['lead'];echo "</p></div>";
			echo "<h5 class='post-tags'>Tags: <span class='tags'><a href='tags.php?tags=".$row['9']."'>".$row[9]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row['10']."'>".$row[10]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row['11']."'>".$row[11]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row['12']."'>".$row[12]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row['13']."'>".$row[13]."</a>&nbsp;&nbsp;</span></h5>
			<h6 class='post-footer'>
			发布:圈圈 | 分类:".$row['class']." | 评论: ".$sum."| 浏览:";
			echo "<script type='text/javascript'>LoadViewCount(77)</script> | <a href='article.php?id=".$row['id']."'>阅读全文 > </a>
			</h6>";
			echo "</div>";
			}
			?>
      <div class="post pagebar"><a href="tags.php?page=<?php if(@$_GET['page']==''){echo '1';}else{if(@$_GET['page'] <= 1){echo '1';}else{echo $_GET['page']-1;}} ?>"><span class="page first-page">&laquo;</span></a>
        <?php
          for ($i=1; $i < $pageall+1; $i++) {
            echo "<a href='tags.php?page=".$i."'><span class='page'>".$i."</span></a>";
          }
         ?>
        <a href='tags.php?page=<?php if(@$_GET['page']==''){echo $pageall;}else{if(@$_GET['page']>=$pageall){echo $pageall;}else{echo @$_GET['page']+1;}} ?>'><span class="page last-page">&raquo;</span></a></div>
      		</div>
		<div id="divSidebar">

<dl class="function" id="divComments">
<dt class="function_t">最新留言</dt>
<dd class="function_c">
<?php require('conn_web/left_leavword.php'); ?>
</dd>
</dl><dl class="function" id="divMisc">
<dt class="function_t">分享到：</dt>
<dd class="function_c">
<ul><li><img src="./images/weixin.jpg" height="110" width="110" border="0" alt="你我网微信公众平台" title="微信扫一扫，关注圈圈的最新消息。" /></li><li><!-- Baidu Button BEGIN --><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到百度贴吧" href="#" class="bds_tieba" data-cmd="tieba"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a></div><script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["sqq","weixin","qzone","tsina","tieba","douban"],"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script><!-- Baidu Button END --></li><li><a href="http://www.youmew.com/feed.asp" target="_blank"><img src="./images/rss.png" height="31" width="88" border="0" alt="订阅本站的 RSS 2.0 新闻聚合" /></a></li></ul>
</dd>
</dl>

		</div>
		<div id="divBottom">
          <h3 id="BlogCopyRight"><script src="http://s20.cnzz.com/stat.php?id=681872&web_id=681872&show=pic" language="JavaScript"></script>　陕ICP备11002139号-1</h3>
			<h4 id="BlogPowerBy">Powered By <a href="http://www.rainbowsoft.org/" title="RainbowSoft Studio Z-Blog" target="_blank">Z-Blog</a>　本站遵循<a rel="license" target="_blank" title="署名-非商业性使用-禁止演绎 3.0 中国大陆许可协议" href="http://creativecommons.org/licenses/by-nc-nd/3.0/cn/"> CC BY-NC-ND 3.0 CN协议 </a>。</h4>
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
</html>
<!--266ms-->
