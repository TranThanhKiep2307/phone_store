<?php
$activate = "index";
@include('inc/header.php');
?>
<!-- SECTION Sản phẩm mới -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Sản phẩm mới</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab2">Điện thoại</a></li>
							<li><a data-toggle="tab" href="#tab2">Phụ kiện</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<?php
								$product_new = $product->getproduct_new();
								if ($product_new) {
									while ($result_new = $product_new->fetch_assoc()) {
								?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="admin/uploads/<?php echo $result_new['SP_HINHANH'] ?>" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $result_new['DMSP_TEN'] ?></p>
												<h3 class="product-name"><?php echo $result_new['SP_TEN'] ?></h3>
												<h4 class="product-price"><?php echo number_format($result_new['SP_GIA']) . " " . "VNĐ" ?> </h4>
												<div class="product-rating">
													<a href="details.php?proid=<?php echo $result_new['SP_MA'] ?>">Xem chi tiết sản phẩm</a>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"><?php echo $fm->textShorten($result_new['SP_MOTA'], 200) ?></span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn">
													<i class="fa fa-shopping-cart"></i>
													<a href="details.php?proid=<?php echo $result_new['SP_MA'] ?>">Mua ngay</a>
												</button>
											</div>
										</div>
										<!-- /product -->
								<?php
									}
								}
								?>
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<ul class="hot-deal-countdown" data-datetime="2023-12-02T24:00:00+12:00">
						<li>
							<div id="days">
								<h3>00</h3>
								<span>Days</span>
							</div>
						</li>
						<li>
							<div id="hours">
								<h3>00</h3>
								<span>Hours</span>
							</div>
						</li>
						<li>
							<div id="minutes">
								<h3>00</h3>
								<span>Mins</span>
							</div>
						</li>
						<li>
							<div id="seconds">
								<h3>00</h3>
								<span>Secs</span>
							</div>
						</li>
					</ul>
					<h2 class="text-uppercase">Báo cáo thôiii</h2>
					<p>Cảm ơn Cô đã hỗ trợ em bài Niên luận ạ</p>
					<a class="primary-btn cta-btn" href="#">Mãi yêu cô</a>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION Sản phẩm nổi bật-->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Sản phẩm nổi bật</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab2">Điện thoại</a></li>
							<li><a data-toggle="tab" href="#tab2">Phụ kiện</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								<?php
								$product_feathered = $product->getproduct_feathered();
								if ($product_feathered) {
									while ($result = $product_feathered->fetch_assoc()) {

								?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="admin/uploads/<?php echo $result['SP_HINHANH'] ?>" alt="">
												<!-- <div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div> -->
											</div>
											<div class="product-body">

												<p class="product-category"><?php echo $result['DMSP_TEN'] ?></p>
												<h3 class="product-name"><?php echo $result['SP_TEN'] ?></h3>
												<h4 class="product-price"><?php echo number_format($result['SP_GIA']) . " " . "VNĐ" ?></h4>
												<div class="product-rating">
													<a href="details.php?proid=<?php echo $result['SP_MA'] ?>">Xem chi tiết sản phẩm</a>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"><?php echo $fm->textShorten($result['SP_MOTA'], 20) ?></span></button>
												</div>

											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn">
													<i class="fa fa-shopping-cart"></i>
													<a href="details.php?proid=<?php echo $result['SP_MA'] ?>">Mua ngay</a>
												</button>
											</div>
										</div>
										<!-- /product -->
								<?php
									}
								}
								?>
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<script>
    function updateCountdown() {
        const countdownElement = document.querySelector('.hot-deal-countdown');
        const targetDate = new Date(countdownElement.dataset.datetime).getTime();

        const daysElement = document.getElementById('days');
        const hoursElement = document.getElementById('hours');
        const minutesElement = document.getElementById('minutes');
        const secondsElement = document.getElementById('seconds');

        const now = new Date().getTime();
        const timeDifference = targetDate - now;

        const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        daysElement.children[0].innerText = formatTime(days);
        hoursElement.children[0].innerText = formatTime(hours);
        minutesElement.children[0].innerText = formatTime(minutes);
        secondsElement.children[0].innerText = formatTime(seconds);
    }

    function formatTime(time) {
        return time < 10 ? `0${time}` : time;
    }

    // Update countdown every second
    setInterval(updateCountdown, 1000);

    // Initial update
    updateCountdown();
</script>


<?php
@include('inc/footer.php');
?>