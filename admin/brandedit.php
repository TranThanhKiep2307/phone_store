<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
@include('../classes/brand.php');
?>
<?php 
    $brand = new brand();

    if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
        echo "<script>window.location = 'brandlist.php'</script>";
    } else {
        $id = $_GET['brandid'];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $LSP_TEN = $_POST['LSP_TEN'];
        $update_brand = $brand->update_brand($LSP_TEN,$id);
    }
   
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa thương hiệu</h2>
               <div class="block copyblock">
               <?php 
                if(isset($update_brand)){
                    echo $update_brand;
                }
                ?>
                <?php
                    $get_brand_name = $brand -> getbrandbyId($id);
                    if($get_brand_name){
                        while($result = $get_brand_name -> fetch_assoc()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value= "<?php echo $result['LSP_TEN'] ?>" name = "LSP_TEN" placeholder="Sửa sản phẩm" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                <?php
                  }
                } 
                ?>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>