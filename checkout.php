<?php
$activate = "checkout";
ob_start();
@include('inc/header.php');
?>
<?php
    if (isset($_GET['orderid']) && $_GET['orderid']=='order' || $_POST['GH_GHICHU']) {
        $id = Session::get('custumer_id');
		$HD_GHICHU = $_POST['HD_GHICHU'];
		$get_customers = $cs-> get_customersid($id);
		$insert_order = $ct -> insert_order($id, $HD_GHICHU);
		$delete_cart = $ct -> delete_cart($GH_MA);
		header('Location:checkout.php');
    }
 ?> 

<?php
	$login_check = Session::get('customer_login'); 
	if($login_check==false){ 
	header('Location:login.php'); 
	}	
?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
			
				<!-- row -->
				<div class="row">
					<?php 
						if(isset($insert_order)){
							echo $insert_order;
						}
					?>
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Địa chỉ của bạn</h3>
							</div>
							<?php
								$id = Session::get('customer_id');
								$get_customers = $cs->show_customers($id);
								if ($get_customers){
									while($result = $get_customers->fetch_assoc()){ 
								?>
							<div class="form-group">
								<input class="input" type="text" name="KH_TEN" value="<?php echo $result['KH_TEN']?>">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="KH_EMAIL" value="<?php echo $result['KH_EMAIL']?>">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="KH_DIACHI" value="<?php echo $result['KH_DIACHI']?>">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="KH_SDT" value="<?php echo $result['KH_SDT']?>">
							</div>
						</div>
						<!-- /Billing Details -->
						
						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" type="text" name="HD_GHICHU" placeholder="Ghi chú cho chúng tôi"></textarea>
						</div>
						<?php
									}
								}
							?>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>Sản phẩm</strong></div>
								<div><strong>Giá</strong></div>
							</div>
							<?php 
								$getproduct_cart = $ct -> getproduct_cart();
								if($getproduct_cart){
									$subtotal = 0;
									$sl = 0;
									while($result = $getproduct_cart ->fetch_assoc()){
							?>
							<div class="order-products">
								<div class="order-col">
									<div><?php echo $result['GH_SOLUONG']."x"." "?><?php echo $result['SP_TEN']?></div>
									<div><?php 
									$total = $result['SP_GIA'] * $result['GH_SOLUONG'];
                    				echo number_format($total).' '.'VNĐ'?></div>
									
								</div>
							</div>
							<?php
								$subtotal += $total;
								$sl = $sl + $result['GH_SOLUONG'];
								}
							}
							?>

							<div class="order-col">
								<?php
									$check_cart = $ct->check_cart();
									if($check_cart){
										echo '<div><strong>Tổng đơn hàng</strong></div>
										<div><strong> '. number_format($subtotal) . ' '.'VNĐ</strong></div>';
											Session::set("sum",$subtotal);
											Session::set("sl",$sl);
									}else{
										echo '';
									}
								?>
								
							</div>
							<div class="order-col">
								<?php
								$check_cart = $ct->check_cart();
								if ($check_cart) {
									$vat = $subtotal * 0.1;
									echo '<div>Thuế</div>
										  <div><strong>' . number_format($vat) . ' VNĐ</strong></div>';
								} else {
									echo '';
								}
								?>
							</div>
							<div class="order-col">
								<?php
									$check_cart = $ct->check_cart();
									if ($check_cart) {
										$vat = $subtotal * 0.1;
										$gtotal = $subtotal + $vat;
										echo '<div><strong>Tổng đơn hàng gồm thuế</strong></div>
											<div><strong class="order-total">' . number_format($gtotal) . ' VNĐ</strong></div>';
									}else{
										echo 'Giỏ hàng trống! Hãy đặt hàng <3';
									}
								?>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Thanh toán khi nhận hàng
								</label>
								<div class="caption">
									<p>Chúng tôi sẽ sớm liên hệ với bạn!!!</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								Tôi đã đọc và chấp nhận <a href="#">điều khoản và điều kiện</a>
							</label>
						</div>
						<a href="?orderid=order" name ="order"class="primary-btn order-submit">Đặt hàng</a>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<?php 
@include('inc/footer.php');
?>
