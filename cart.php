<?php
$activate = 'phone';
ob_start();
@include('inc/header.php');
?>
<?php
    if (isset($_GET['GH_MA'])) {
        $GH_MA = $_GET['GH_MA'];
		$delete_cart = $ct -> delete_cart($GH_MA);
    }
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
		$GH_MA = $_POST['GH_MA'];
		$GH_SOLUONG = $_POST['GH_SOLUONG'];
        $up_quantity_cart = $ct-> up_quantity_cart($GH_SOLUONG, $GH_MA);
    }  
 ?>
<style>
    table.display{
        margin: 0 auto;
        clear: both;
        width: 100%;
    }
</style>
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
                <div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách đơn hàng</h2>
        <div class="block">  
			<?php
			if(isset($up_quantity_cart)){
				echo $up_quantity_cart;
			}
			?>
			<?php
			if(isset($delete_cart)){
				echo $delete_cart;
			}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Tên sản phẩm</th>
					<th>Giá sản phẩm</th>
					<th>Hình ảnh sản phẩm</th>
					<th>Màu sản phẩm</th>
					<th>Số lượng sản phẩm</th>
                    <th>Chỉnh sửa sản phẩm</th>
					<th>Tổng giá sản phẩm</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$getproduct_cart = $ct -> getproduct_cart();
				if($getproduct_cart){
                    $subtotal = 0;
					while($result = $getproduct_cart ->fetch_assoc()){
			?>
				<tr class="odd gradeX">
					<td><?php echo $result['SP_TEN']?></td>
					<td><?php echo $result['SP_GIA']?></td>
					<td><img src="admin/uploads/<?php echo $result['SP_HINHANH']?>" width="60px"></td>
                    <td><?php echo $result['SP_MAU']?></td>
					<td>
                        <style>
                            input[type=number]{
                                border: none;
                                width: 50px;
                            }
                            input[type=submit]{
                                border: none;
                                color: #fff;
                                background-color: #2B2D42; 
                                border-radius: 10px;
                            }
                        </style>
                        <form action="" method="post">
							<input type="hidden" name="GH_MA" value="<?php echo $result['GH_MA']?>">
                            <input type="number" name="GH_SOLUONG" value="<?php echo $result['GH_SOLUONG']?>" min = "1">
                            <input type="submit" name="submit" value="Cập nhật">
                        </form>
                    </td>
                    <td><a onclick =  "return confirm ('Bạn có chắc muốn xóa không???')" href="?GH_MA=<?php echo $result['GH_MA']?>">Xóa sản phẩm</a></td>
					<td><?php 
                    $total = $result['SP_GIA'] * $result['GH_SOLUONG'];
                    echo $total?></td>
					
				</tr>
			<?php
                $subtotal += $total;
				}
			}
			?>
			</tbody>
		</table>
		<?php 
			$check_cart = $ct -> check_cart();
			if($check_cart){
		?>
        <table style="float:right; text-align: left;" width = "40%">
            <tr>
                <th>Tổng đơn giá : </th>
                <td><?php echo $subtotal?></td>
            </tr>
            <tr>
                <th>Thuế VAT : </th>
                <td>10%</td>
            </tr>
            <tr>
                <th>Tổng giá trị đơn có thuế : </th>
                <td><?php 
                $vat = $subtotal*0.1;
                $gtotal = $subtotal + $vat;
                echo $gtotal?></td>
            </tr>
        </table>
		<?php
		}else{
			echo 'Giỏ hàng của bạn đang trống!!! Hãy thêm sản phẩm vào!!!';
		}
		?>
       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php
@include('inc/footer.php');
?>