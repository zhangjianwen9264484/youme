<?php
	$keywords = $_POST['edtSearch'];
	$pdo = new PDO("mysql:local=localhost;dbname=db_youme","root","root");
	$pdo -> query("set names utf8;");
	$res = $pdo -> query("select * from tb_article where headline like '%$keywords%' or content like '%$keywords%' or lead like '%$keywords%'");
	// $row = $res -> fetch();
	// var_dump($row);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Language" content="zh-CN" />
	<meta name="keywords" content="你我网,圈圈说,汉中,汉中圈圈,你我,如是观,心理,感情,youmew" />
	<meta name="description" content="你我网，缘自圈圈说，记载着圈圈的生活过往，只为留住那份曾经的感动；圈圈，又名小尤，前半生执著于感情，命途多舛，故孑然一身。" />
	<title>Search:<?php echo $_POST['edtSearch']; ?> - _ - 你我网 </title>
	<link rel="stylesheet" rev="stylesheet" href="./style/style.css" type="text/css" media="screen" />
    <link rel="shortcut icon" href="/favicon.ico" />
	<script src="./style/common.js" type="text/javascript"></script>
	<script src="./style/c_html_js_add.js" type="text/javascript"></script>
	<script src="./style/custom.js" type="text/javascript"></script>
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
	<li><a href="index.php">首页</a></li><li><a href="list.php?class='大生活'" title="感悟生活点滴">大生活</a></li><li><a href="shadow.php?class='光影斑斓'" title="光与影的艺术">光影斑斓</a></li><li><a href="ifture?class='如是观'" title="一切有为法，如梦幻泡影，如露亦如电，应作如是观。">如是观</a></li><li><a href="http://www.youmew.com/t/" target="_blank" title="还是以前的圈圈微博！">圈圈说</a></li><li><a href="http://www.youmew.com/guestbook.html" title="沟通从这里开始">留言本</a></li>
</ul>
		</div>
		<div id="divMain">
<div class="post single-post cate0 auth0">
	<h4 class="post-date"></h4>
	<h2 class="post-title">Search:<?php echo $_POST['edtSearch']; ?></h2>
	<div class="post-body"> <p>
<?php
	foreach ($res as $key => $row) {
		$id = $row['id'];
		// var_dump($row);
		echo "<br/><font size='+0.5'><a target='_blank' href='article.php?id=".$id."'>".$row['headline']."</a></font>";
	 	echo "<br/><font color='green'>article.php</font>
		<br/>".$row['content']."
		<br/>
		<br/>
		</p> <p>";
	}
?>
</p></div>
	<h6 class="post-footer"></h6>
</div>



		</div>
		<div id="divSidebar">

<dl class="function" id="divSearchPanel">
<dt class="function_t">搜索</dt>
<dd class="function_c">
<div><div id="mod_searchpanel" style="display:none;"><script type="text/javascript">LoadFunction('searchpanel');</script></div></div>
</dd>
</dl><dl class="function" id="divTags">
<dt class="function_t">按标签浏览</dt>
<dd class="function_c">
	<ul><li class="tag-name tag-name-size-2"><a href="tags.php?tags=觉悟">觉悟<span class="tag-count"> (18)</span></a></li><li class="tag-name tag-name-size-3"><a href="tags.php?tags=人生">人生<span class="tag-count"> (26)</span></a></li><li class="tag-name tag-name-size-2"><a href="tags.php?tags=摄影">摄影<span class="tag-count"> (15)</span></a></li><li class="tag-name tag-name-size-2"><a href="tags.php?tags=爱情">爱情<span class="tag-count"> (11)</span></a></li><li class="tag-name tag-name-size-3"><a href="tags.php?tags=心情">心情<span class="tag-count"> (34)</span></a></li><li class="tag-name tag-name-size-3"><a href="tags.php?tags=生活">生活<span class="tag-count"> (28)</span></a></li><li class="tag-name tag-name-size-1"><a href="tags.php?tags=音乐">音乐<span class="tag-count"> (6)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=规则">规则<span class="tag-count"> (5)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=夕阳">夕阳<span class="tag-count"> (1)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=寂寞">寂寞<span class="tag-count"> (3)</span></a></li><li class="tag-name tag-name-size-1"><a href="tags.php?tags=过往">过往<span class="tag-count"> (8)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=西乡">西乡<span class="tag-count"> (3)</span></a></li><li class="tag-name tag-name-size-1"><a href="tags.php?tags=回忆">回忆<span class="tag-count"> (8)</span></a></li><li class="tag-name tag-name-size-0"><a href="tags.php?tags=旅行">旅行<span class="tag-count"> (1)</span></a></li></ul>
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
<!-- 2016-7-21 10:39:49 -->
