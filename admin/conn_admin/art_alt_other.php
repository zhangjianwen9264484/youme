<?php
  $pdo = new PDO("mysql:local=localhost;dbname=db_youme","root","root");
  $pdo -> query("set names utf8;");
  date_default_timezone_set('Asia/Shanghai');
  $up_date = date("Y-m-d");
  $id = $_POST['hidden'];
  $headline = $_POST['headline'];
  $content = $_POST['content'];
  $sql = "update tb_article set headline = '$headline',content = '$content',up_date = '$up_date' where id = $id";
  $res = $pdo -> exec($sql);
  if ($res) {
    echo "<script>alert('修改成功!');location='../design.php'</script>";
  }
 ?>
