<!-- FOOTER -->
<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Về tôi</h3>
								<p>Sinh viên Hệ thống thông tin 02 K46.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-phone"></i>0858801302</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>kiepb2012024@student</br>.ctu.edu.vn</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Các dòng điện thoại</h3>
								<?php
									$brand_show = $br -> show_brand();
									if($brand_show){
										while($result = $brand_show ->fetch_assoc()){
								?>
								<ul class="footer-links">
								<li><a href="#"><?php echo $result['LSP_TEN']?></a></li>	
								</ul>
								<?php
									}
								}
								?>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Thông tin</h3>
								<ul class="footer-links">
									<li><a href="#">Hướng dẫn đặt hàng</a></li>
									<li><a href="#">Phản hồi đánh giá</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Khách hàng</h3>
								<ul class="footer-links">
									<li><a href="#">Tài khoản của bạn</a></li>
									<li><a href="#">Tra cứu đơn hàng</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
