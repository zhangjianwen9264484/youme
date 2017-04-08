<?php
  $pdo = new PDO("mysql:local=localhost;dbname=db_youme","root","root");
  $pdo -> query("set names utf8;");
  $id = $_GET['id'];
  date_default_timezone_set('Asia/Shanghai');
  $up_date = date("Y-m-d");
  $sql = "select * from tb_article where id = $id";
  $res = $pdo -> query($sql);
  $row = $res -> fetch();
  // var_dump($row);
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>修改文章</title>
   </head>
   <body>
     <form class="" method="post" action="art_alt_other.php">
       <input type="hidden" name="hidden" value="<?php echo $row['id'] ?>">
       <input type="text" name="headline" value="<?php echo $row['headline']; ?>"><br />
       <textarea name="content" rows="50" cols="200"><?php echo $row['content']; ?></textarea>
       <input type="submit" name="sub" value="修改">
     </form>
   </body>
 </html>
