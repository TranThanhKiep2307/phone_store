<?php
$activate = 'phone';
@include('inc/header.php');
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<h3 class="breadcrumb-header">Regular Page</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Blank</li>
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
			if (isset($_GET['timkiem'])) {
				$timkiem = $_GET['timkiem'];
				$category = isset($_GET['category']) ? $_GET['category'] : 0;
				$phones = $product->search($timkiem, $category);
				while ($row = mysqli_fetch_assoc($phones)) {
					echo '<div class="col-md-4 col-xs-6">
							<div class="product">
								<div class="product-img">
									<img src="admin/uploads/' . $row['SP_HINHANH'] . '" alt="">
									<div class="product-label">
										<span class="sale">-30%</span>
										<span class="new">NEW</span>
									</div>
								</div>
								<div class="product-body">
									<h3 class="product-name"><a href="#">' . $row['SP_TEN'] . '</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">' . $row['SP_GIA'] . " VNĐ" . '</del></h4>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="product-btns">
										<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
										<!-- <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button> -->
										<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">' . $fm->textShorten($row['SP_MOTA'], 200) . '</span></button>
									</div>
								</div>
								<div class="add-to-cart">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>
							</div>
						</div>';
				}
			} else {
				echo 'Không tìm thấy sản phẩm';
			}
			?>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<?php
@include('inc/footer.php');
?>