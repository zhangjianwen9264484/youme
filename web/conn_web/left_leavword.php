<?php 
	$pdo = new PDO("mysql:host=localhost;dbname=db_youme","root","root");
	$pdo -> query("set names utf8;");
	$res = $pdo->query("select art_id,message,mes_name,mes_time from tb_message order by mes_time");
	while(@$row = $res->fetch()){
		// echo $row['username']."</br>";
		// echo $row['content']."</br>";
		// echo $row['time']."</br>";
 ?>
 	<ul>
	<li style="text-overflow:ellipsis;"><a href="http://pigdan.edu/php/youme/web/article.php?id=<?php echo $row['art_id']?>" title=""><?php echo $row['message']; ?></a></li>
</ul>
<?php
}
?>