<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
@include('../classes/category.php');
?>
<?php 
$cat= new category();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$DMSP_TEN = $_POST['DMSP_TEN'];

	$insert_cart = $cat->insert_category($DMSP_TEN);
  }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
               <div class="block copyblock">
               <?php 
                if(isset($insert_cart)){
                    echo $insert_cart;
                }
                ?>
                 <form action="addcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name = "DMSP_TEN" placeholder="Thêm danh mục sản phẩm" class="medium" />
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