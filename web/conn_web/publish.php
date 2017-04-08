<?php
	date_default_timezone_set('Etc/GMT-8');//时区的转换

	@session_start();
	$art_id = @$_GET['id'];
	$mes_name = @$_POST['inpName'];
	$mes_mail = @$_POST['inpEmail'];
	$mes_page = @$_POST['inpHomePage'];
	$mes_verify = @$_POST['inpVerify'];
	$message = @$_POST['txaArticle'];
	// $verify = @$_POST['inpVerify'];
	$mes_time = date('Y-m-d H:i:s',time());

	// echo $mes_time.'</br>';
	// echo $message.'</br>';
	// echo $mes_name.'</br>';
	// echo $mes_mail.'</br>';
	// echo $_SESSION['code'].'</br>';
	// echo $mes_verify;
	$pdo = new PDO("mysql:host=localhost;dbname=db_youme","root","root");
	$pdo -> query("set names utf8;");
	$sql = "insert into tb_message(art_id,message,mes_name,mes_mail,mes_time) values('$art_id','$message','$mes_name','$mes_mail','$mes_time')";
	if(isset($_POST['btnSumbit'])){
		if($mes_name == ''){
			echo "<script>alert('名字不能为空!');</script>";
		}else if($mes_verify == ''){
			echo "<script>alert('验证码不能为空!');</script>";
		}else if($_SESSION['code'] == $mes_verify){
			$pdo->exec($sql);
			echo "<script>location='article.php?id=".$id."'</script>";
		}else{
			echo "<script>alert('验证码错误!');</script>";
		}
	}

 ?>