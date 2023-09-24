<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    @include('../classes/brand.php');
?>
<?php
    @include('../classes/category.php');
?>
<?php
    @include('../classes/product.php');
?>
<?php
    @include_once('../helpers/format.php');
?>
<?php
	$pd = new product();
	if (isset($_GET['productid'])) {
        $id = $_GET['productid'];
		$delete_pro = $pd -> delete_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
			<?php
			if(isset($delete_pro)){
				echo $delete_pro;
			}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Mã danh mục sản phẩm</th>
					<th>Mã thương hiệu sản phẩm</th>
					<th>Mô tả sản phẩm</th>
					<th>Giá sản phẩm</th>
					<th>Hình ảnh sản phẩm</th>
					<th>Trạng thái sản phẩm</th>
					<th>Chỉnh sửa sản phẩm</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$pdlist = $pd -> show_product();
				if($pdlist){
					$i = 0;
					while($result = $pdlist ->fetch_assoc()){
						$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['SP_TEN']?></td>
					<td><?php echo $result['DMSP_TEN']?></td>
					<td><?php echo $result['LSP_TEN']?></td>
					<td><?php 
						$fm = new Format();
						echo $fm -> textShorten($result['SP_MOTA'], 25);
					?></td>
					<td><?php echo $result['SP_GIA']?></td>
					<td><img src="uploads/<?php echo $result['SP_HINHANH']?>" width="70px"></td>
					<!-- <td class="center"> 4</td> -->
					
					<td><?php 
						if($result['SP_TRANGTHAI']==1){
							echo 'Nổi bật';
						}else{
							echo 'Không nổi bật';
						}
					?></td>
					<td><a href="productedit.php?productid=<?php echo $result['SP_MA'] ?>">Edit</a> || 
					<a onclick =  "return confirm ('Bạn có chắc muốn xóa không???')" href="?productid=<?php echo $result['SP_MA'] ?>">Delete</a></td>
				</tr>
			<?php
				}
			}
			?>
			</tbody>
		</table>

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
<?php include 'inc/footer.php';?>
