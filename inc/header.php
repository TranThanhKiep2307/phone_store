<?php 
	@include('config/config.php');
	@include('lib/session.php');
	Session::init();
?>
<?php
	@include_once('lib/database.php');
	@include_once('helpers/format.php');
	
	spl_autoload_register(function ($class) {
		include 'classes/' . $class . '.php';
	});
	
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cs = new customers();
	$cat = new category();
	$product = new product();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<link rel="shortcut icon" href="img/lg.png" type="">
		<title>PHONESTORE</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Gõ những gì bạn cần...">
									<button class="search-btn" ><a href="store.php">Tìm kiếm</button></a>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Yêu thích</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>
										<div class="qty">
										<?php 
												$check_cart = $ct->check_cart();
												if($check_cart){
													$sl = Session::get("sl");
													echo $sl;
												}else{
													echo 0;
												}	
											?>
										</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
										<?php
											$getproduct_cart = $ct -> getproduct_cart();
											if($getproduct_cart){
												$subtotal = 0;
												$sl = 0;
												while($result = $getproduct_cart ->fetch_assoc()){
										?>
											<div class="product-widget">
												<div class="product-img">
													<img src="admin/uploads/<?php echo $result['SP_HINHANH']?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#"><?php echo $result['SP_TEN']?></a></h3>
													<h4 class="product-price">
														<span class="qty"><?php echo 'x'.$result['GH_SOLUONG']?>
														</span><?php 
															$total = $result['SP_GIA'] * $result['GH_SOLUONG'];
                    										echo $total ?>
													</h4>
												</div>
												<!-- <button class="delete"><i class="fa fa-close"></i></button> -->
											</div>
											<?php
												}
											}
											?>
										</div>
										<div class="cart-summary">
											<small>
											<?php 
												$check_cart = $ct->check_cart();
												if($check_cart){
													$sl = Session::get("sl");
													echo $sl.' '.'sản phẩm được chọn';
												}else{
													echo 'Không có sản phẩm';
												}	
											?>
											</small>
											<h5> 
											<?php 
												$check_cart = $ct->check_cart();
												if($check_cart){
													$sum = Session::get("sum");
													echo 'Tổng tiền:'.' '.$sum.' '.'VNĐ';
												}else{
													echo 'Giỏ hàng rỗng';
												}
												
											?>
											</h5>
										</div>
										<div class="cart-btns">
											<a href="cart.php">Xem giỏ hàng</a>
											<a href="checkout.php">Thanh toán<i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<?php
									if(isset($_GET['customer_id'])){
										$del_cart = $ct->del_all_cart();
										Session::destroy();
									}
								?>
								<div>
								<?php 
								$login_check = Session::get('customer_login'); 
								if($login_check==false){ 
									echo '<a href="login.php">
									<i class="fa fa-user-o"></i>
									<span>Đăng nhập</span>
									</a>
									</div>'; 
								}else{ 
									echo '<a class= "dropdown" href="?customer_id='.Session::get('customer_id').'">
									<i class="fa fa-user-o"></i>
									<span>Xin chào '.Session::get('customer_ten').'</span>
									<i class="fa fa-arrow-circle-right">Đăng xuất</i>
									</a>
									</div>'; 
								}	
								?>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="<?php echo ($activate == "index" ? "active" : "")?>"> <a href="index.php">Trang chủ</a></li>
						<li class="<?php echo ($activate == "phone" ? "active" : "")?>"><a href="phone.php">Điện thoại</a></li>
						<li class="<?php echo ($activate == "accessories" ? "active" : "")?>"><a href="accessories.php">Phụ kiện</a></li>
						<?php
							$check_cart = $ct->check_cart();
							if($check_cart==true){
								echo '<li class="'.($activate == "cart" ? "active" : "").'"><a href="cart.php">Giỏ hàng</a></li>';
							}else{
								echo '';
							}
						?>
						<?php
							$login_check = Session::get('customer_login');
							if($login_check==false){
								echo '';
							}else{
								echo '<li class="'.($activate == "profile" ? "active" : "").'"><a href="profile.php">Tài khoản</a></li>';
							}
						?>

						
						
					</ul>				
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->