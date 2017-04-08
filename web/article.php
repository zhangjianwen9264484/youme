<?php
	// header("Content-Type:text/html;charset=UTF-8");
	$art_id = @$_GET['id'];
	$pdo = new PDO("mysql:local=localhost;dbname=db_youme","root","root");
	$pdo -> query("set names utf8;");
	$res = $pdo -> query("select * from tb_article where art_id = $art_id");
	$row = $res -> fetch();
	$content = str_replace(" ","<br />",$row['content']);
	// echo $row['tag_1'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Language" content="zh-CN" />
	<meta name="keywords" content="你我网,圈圈说,汉中,汉中圈圈,你我,如是观,心理,感情,youmew" />
	<meta name="description" content="你我网，缘自圈圈说，记载着圈圈的生活过往，只为留住那份曾经的感动；圈圈，又名小尤，前半生执著于感情，命途多舛，故孑然一身。" />
	<title>​<?php echo $row['headline']; ?> - 大生活 - 你我网 </title>
	<link rel="stylesheet" rev="stylesheet" href="./style/style.css" type="text/css" media="screen" />
    <link rel="shortcut icon" href="/favicon.ico" />
	<script src="./style/common.js" type="text/javascript"></script>
	<script src="./style/c_html_js_add.js" type="text/javascript"></script>
	<script src="./style/custom.js" type="text/javascript"></script>
	<script type="text/javascript">var cateurl="http://www.youmew.com/catalog.asp?cate=2"</script>
</head>
<body class="single">
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
<div class="post single-post cate2 auth1">
	<div class="post-nav"><a class="l" href="article.php?id=<?php if($art_id-1 <= 0){echo "1";}else{echo $art_id-1;} ?>" title="">« 上一篇</a><a class="r" href="article.php?id=<?php echo $art_id+1; ?>" title="">下一篇 »</a></div>
	<h4 class="post-date">​<?php echo $row['up_date']; ?></h4>
	<h2 class="post-title">​<?php echo $row['headline']; ?>​</h2>
	<div class="post-body">​<?php echo $content; ?></div>
	<?php
	echo "<h5 class='post-tags'>Tags: <span class='tags'><a href='tags.php?tags=".$row['9']."'>".$row[9]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row['10']."'>".$row[10]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row['11']."'>".$row[11]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row['12']."'>".$row[12]."</a>&nbsp;&nbsp;<a href='tags.php?tags=".$row['13']."'>".$row[13]."</a>&nbsp;&nbsp;</span></h5>";
	?>
	<h6 class="post-footer">
		发布:圈圈 | 分类:​<?php echo $row['class']; ?> | 评论:​<?php  ?> | 浏览:<?php  ?>
		<script type="text/javascript">AddViewCount(75)</script>
	        <br />
        <!-- AD BEGIN -->
        <br />
<div style="width:660px;" align="center">

</div>
        <!-- AD END -->
    </h6>
</div>
<ul class="msg mutuality">
	<li class="tbname">相关文章:</li>
	<li class="msgarticle">
		<?php
			// header("Content-Type:text/html;charset=UTF-8");
			$class = $row['class'];
			$res_1 = $pdo -> query("select * from tb_article where class = '$class'");
			// $row_1 = $res_1 -> fetch();
			// echo $row['tag_1'];
			foreach ($res_1 as $key => $row_1) {
				$art_id_1 = $row_1['id'];
				$headline = $row_1['headline'];
				$time = $row_1['up_date'];
				if ($art_id_1 == $art_id) {
					// $row_1 = $res_1 -> fetch();
					// echo $row['headline'];
					continue;
				}
				echo "<p><a href='article.php?id=".$art_id_1."'>".$headline."</a>&nbsp;&nbsp;".$time."</p>";
			}
		?>
	</li>
</ul>
<ul  class="msg msghead">
	<li class="tbname">留言列表:</li>
</ul>
<ins style="display:none;" id="AjaxCommentBegin"></ins>

<!-- <ul class="msg" id="cmt1475">
	<li class="msgname"><img class="avatar" src="http://cn.gravatar.com/avatar/e762b2d63651344d2ca3db6bcef8286b?s=40&d=mm" alt="" width="32"/>&nbsp;<span class="commentname"><a href="http://www.youmew.com/zb_system/function/c_urlredirect.asp?url=h6t4t3p0%3A5%2F0%2F5b8a8i4k5e9%2E3r7e2n3w2u7y3i1%2E8c6o7m1%2F5" rel="nofollow" target="_blank">​<?php  ?></a></span><br/><small>&nbsp;发布于&nbsp;​<?php  ?>&nbsp;&nbsp;<span class="revertcomment"><a href="#comment" onclick="RevertComment('1475')">回复该留言</a></span></small></li>
	<li class="msgarticle">​<?php  ?><a style="display:none;" id="AjaxCommentEnd1475"></a></li>
</ul> -->
<!-- <ul class="msg" id="cmt1475">
	<li class="msgname"><img class="avatar" src="http://cn.gravatar.com/avatar/e762b2d63651344d2ca3db6bcef8286b?s=40&d=mm" alt="" width="32"/>&nbsp;<span class="commentname"><a href="http://www.youmew.com/zb_system/function/c_urlredirect.asp?url=h6t4t3p0%3A5%2F0%2F5b8a8i4k5e9%2E3r7e2n3w2u7y3i1%2E8c6o7m1%2F5" rel="nofollow" target="_blank">任务易</a></span><br/><small>&nbsp;发布于&nbsp;2016-6-23 9:43:54&nbsp;&nbsp;<span class="revertcomment"><a href="#comment" onclick="RevertComment('1475')">回复该留言</a></span></small></li>
	<li class="msgarticle">“戒”博主的思想高深，我等不知哪里去理解<a style="display:none;" id="AjaxCommentEnd1475"></a></li>
</ul> -->
<?php include('conn_web/leavword.php'); ?>
<a style="display:none;" id="AjaxCommentEnd1365"></a></li>
</ul>
<ins style="display:none;" id="AjaxCommentEnd"></ins>

<div class="post" id="divCommentPost">
	<p class="posttop"><a name="comment">发表留言:</a><small><a rel="nofollow" id="cancel-reply" href="#divCommentPost" style="display:none;">取消回复</a></small></p>

	<form id="frmSumbit" target="_self" method="post" action="article.php?id=<?php echo $art_id; ?>" >
	<input type="hidden" name="inpId" id="inpId" value="" />
	<input type="hidden" name="inpArticle" id="inpArticle" value="" />
	<input type="hidden" name="inpRevID" id="inpRevID" value="" />
	<p><input type="text" name="inpName" id="inpName" class="text" value="" size="28" tabindex="1" /> <label for="inpName">名称（必填）</label></p>
	<p><input type="text" name="inpEmail" id="inpEmail" class="text" value="" size="28" tabindex="2" /> <label for="inpEmail">邮箱</label></p>
	<p><input type="text" name="inpHomePage" id="inpHomePage" class="text" value="" size="28" tabindex="3" /> <label for="inpHomePage">网站链接</label></p>
	<p><input type="text" name="inpVerify" id="inpVerify" class="text" value="" size="28" tabindex="4" /> <label for="inpVerify">验证（必填）</label> <img style="border:1px solid silver;width:60px;height:20px;" src="conn_web/code.php" alt="验证码很忙，请等等" title="" onclick="javascript:this.src='conn_web/code.php?tm='+Math.random();"/></p>
	<p><label for="txaArticle">正文（必填）(留言最长字数:1000)</label></p>
	<p><textarea name="txaArticle" id="txaArticle" onchange="GetActiveText(this.id);" onclick="GetActiveText(this.id);" onfocus="GetActiveText(this.id);" class="text" cols="50" rows="4" tabindex="5" ></textarea></p>
	<p><input name="btnSumbit" type="submit" tabindex="6" value="提交" class="button" />
	<input type="checkbox" name="chkRemember" value="1" id="chkRemember" /> <label for="chkRemember">记住我,下次回复时不用重新输入个人信息</label></p>
	<script language="JavaScript" type="text/javascript">objActive="txaArticle";ExportUbbFrame();</script>
	</form>
	<?php include('conn_web/publish.php'); ?>
	<p class="postbottom">◎欢迎参与讨论，请在这里发表您的看法、交流您的观点。</p>
	<script language="JavaScript" type="text/javascript">LoadRememberInfo();</script>
</div>
		</div>
		<div id="divSidebar">

<dl class="function" id="divSearchPanel">
<dt class="function_t">搜索</dt>
<dd class="function_c">
<div><div id="mod_searchpanel" style="display:none;"><script type="text/javascript">LoadFunction('searchpanel');</script></div></div>
</dd>
</dl><dl class="function" id="divComments">
<dt class="function_t">最新留言</dt>
<dd class="function_c">
<?php require('conn_web/left_leavword.php'); ?>
<!-- <ul>
	<li style="text-overflow:ellipsis;"><a href="http://www.youmew.com/post/77.html#cmt1474" title="2016-6-20 9:31:36 post by 任务易">要钱还是要脸，这是这个社会应该思考的</a></li>
</ul> -->
</dd>
</dl><dl class="function" id="divMisc">
<dt class="function_t">分享到：</dt>
<dd class="function_c">
<ul><li><img src="http://www.youmew.com/zb_system/image/logo/weixin.jpg" height="110" width="110" border="0" alt="你我网微信公众平台" title="微信扫一扫，关注圈圈的最新消息。" /></li><li><!-- Baidu Button BEGIN --><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到百度贴吧" href="#" class="bds_tieba" data-cmd="tieba"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a></div><script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["sqq","weixin","qzone","tsina","tieba","douban"],"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script><!-- Baidu Button END --></li><li><a href="http://www.youmew.com/feed.asp" target="_blank"><img src="http://www.youmew.com/zb_system/image/logo/rss.png" height="31" width="88" border="0" alt="订阅本站的 RSS 2.0 新闻聚合" /></a></li></ul>
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
<!-- 2016-6-23 1:59:46 -->
