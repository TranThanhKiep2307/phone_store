<?php 
@include('../classes/adminlogin.php');
?>
<?php 
$class= new adminlogin();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$AD_username = $_POST['AD_username'];
	$AD_password = MD5($_POST['AD_password']);

	$login_check = $class->login_admin($AD_username,$AD_password);
  }
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Quản trị viên</h1>
			<span> <?php
			if(isset($login_check)){
				echo $login_check;
			}
			?></span>
			<div>
				<input type="text" placeholder="Username"  name="AD_username"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="AD_password"/>
			</div>
			<div>
				<input type="submit" value="Đăng nhập" />
			</div>
		</form><!-- form -->
		<!-- <div class="button">
			<a href="#">Ngue</a>
		</div>button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>