<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    @include('../classes/brand.php');
?>
<?php
	$brand = new brand();

	if (isset($_GET['delid'])) {
        $id = $_GET['delid'];
		$delete_brand = $brand -> delete_brand($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh mục sản phẩm</h2>
                <div class="block">
				<?php 
                if(isset($delete_brand)){
                    echo $delete_brand;
                }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_brand = $brand -> show_brand();
							if($show_brand){
								$i = 0;
								while ($result = $show_brand -> fetch_assoc()){
									$i++;
					?>
							<tr class="odd gradeX">
								<td> <?php echo $i; ?></td>
								<td><?php echo $result['LSP_TEN']?></td>
								<td><a href="brandedit.php?brandid=<?php echo $result['LSP_MA'] ?>">Edit</a> || 
								<a onclick =  "return confirm ('Bạn có chắc muốn xóa không???')" href="?delid=<?php echo $result['LSP_MA'] ?>">Delete</a></td>
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

