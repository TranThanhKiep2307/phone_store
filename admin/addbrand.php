<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
@include('../classes/brand.php');
?>
<?php 
$brand = new brand();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$LSP_TEN = $_POST['LSP_TEN'];
	$insert_brand = $brand->insert_brand($LSP_TEN);
  }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm thương hiệu</h2>
               <div class="block copyblock">
               <?php 
                if(isset($insert_brand)){
                    echo $insert_brand;
                }
                ?>
                 <form action="addbrand.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name = "LSP_TEN" placeholder="Thêm thương hiệu sản phẩm" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>