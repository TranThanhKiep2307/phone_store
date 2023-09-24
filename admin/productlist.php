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
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
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
				</tr>
			</thead>
			<tbody>
			<?php 
				$pd = new product();
				$pdlist = $pd -> show_product();
				if($pdlist){
					$i = 0;
					while($result = $pdlist ->fetch_assoc()){
						$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['SP_TEN']?></td>
					<td><?php echo $result['DMSP_MA']?></td>
					<td><?php echo $result['LSP_MA']?></td>
					<td><?php echo $result['SP_MOTA']?></td>
					<td><?php echo $result['SP_GIA']?></td>
					<td class="center"> 4</td>
					<!-- <td><a href="">Edit</a> || <a href="">Delete</a></td> -->
					<td><?php 
						if($result['SP_TRANGTHAI']==1){
							echo 'Nổi bật';
						}else{
							echo 'Không nổi bật';
						}
					?></td>
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
