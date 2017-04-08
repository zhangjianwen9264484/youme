<?php 
	$pdo = new PDO("mysql:host=localhost;dbname=db_youme","root","root");
	$pdo -> query("set names utf8;");
	$artcle_id = $_GET['id'];
	$res = $pdo->query("select mes_name,message,mes_time from tb_message where art_id = $artcle_id order by mes_time");
	while(@$row = $res->fetch()){
		// echo $row['username']."</br>";
		// echo $row['content']."</br>";
		// echo $row['time']."</br>";
		$mail = @$row['mes_mail'];
 ?>
 <ul class="msg" id="cmt1475">
	<li class="msgname"><img class="avatar" src="images/1efcbc6ddae9dba42613d1146baaa62f.jpg" alt="系统错误" width="32"/>&nbsp;<span class="commentname"><a href="<?php echo'$mail'; ?>" rel="nofollow" target="_blank"><?php echo$row['mes_name']; ?></a></span><br/><small>&nbsp;发布于&nbsp;<?php echo $row['mes_time']; ?>&nbsp;&nbsp;<span class="revertcomment"><a href="#" onclick="">回复该留言</a></span></small></li>
	<li class="msgarticle"><?php echo $row['message']; ?><a style="display:none;" id="AjaxCommentEnd1475"></a></li>
</ul>
<?php
}
?>