<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
@include('../classes/category.php');
?>
<?php 
    $cat = new category();

    if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
        echo "<script>window.location = 'catlist.php'</script>";
    } else {
        $id = $_GET['catid'];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $DMSP_TEN = $_POST['DMSP_TEN'];
        $update_cart = $cat->update_category($DMSP_TEN,$id);
    }
   
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock">
               <?php 
                if(isset($update_cart)){
                    echo $update_cart;
                }
                ?>
                <?php
                    $get_cate_name = $cat -> getcatbyId($id);
                    if($get_cate_name){
                        while($result = $get_cate_name -> fetch_assoc()){
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value= "<?php echo $result['DMSP_TEN'] ?>" name = "DMSP_TEN" placeholder="Sửa danh mục sản phẩm" class="medium" />
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