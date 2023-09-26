<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php @include('../classes/brand.php');?>
<?php @include('../classes/category.php');?>
<?php @include('../classes/product.php');?>

<?php 
    $pd = new product();
    if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
        echo "<script>window.location = 'productlist.php'</script>";
    } else {
        $id = $_GET['productid'];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $update_pro = $pd->update_product($_POST,$_FILES,$id);
    }   
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">
        <?php 
            if(isset($update_pro)){
                echo $update_pro;
            }
        ?>
        <?php 
            $get_product_byid = $pd ->getproductbyId($id);
            if($get_product_byid){
                while($result_product = $get_product_byid->fetch_assoc()){               
        ?>        
         <form action=" " method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name = "SP_TEN" value="<?php echo $result_product['SP_TEN']?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="danhmuc">
                            <option>Chọn mã danh mục</option>
                            <?php
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while($result = $catlist -> fetch_assoc()){
                            ?>
                            <option 
                            <?php if($result['DMSP_MA']==$result_product['DMSP_MA']) { echo 'selected'; }?>
                            value="<?php echo $result['DMSP_MA']?>"><?php echo $result['DMSP_TEN']?></option>
                            <?php
                               }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="loai_sp">
                            <option>Chọn mã thương hiệu</option>
                            <?php
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while($result = $brandlist -> fetch_assoc()){
                            ?>
                            <option 
                            <?php if($result['LSP_MA']==$result_product['LSP_MA']) { echo 'selected'; }?>
                            value="<?php echo $result['LSP_MA']?>"><?php echo $result['LSP_TEN']?></option>
                            <?php
                               }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả sản phẩm</label>
                    </td>
                    <td>
                        <textarea name="SP_MOTA" class="tinymce" <?php echo $result_product['SP_MOTA']?>></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá gốc</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_product['SP_GIA']?>" name="SP_GIA"  class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh sản phẩm</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['SP_HINHANH']?>" width="70px"><br>
                        <input type="file" name="SP_HINHANH"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Trạng thái sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="SP_TRANGTHAI">
                            <option>Chọn trạng thái</option>
                            <?php
                            if($result_product['SP_TRANGTHAI']==0){
                            ?>
                                <option selected value="0">Nổi bật</option>
                                <option value="1">Không nổi bật</option>
                            <?php
                            }else{
                                ?> 
                                <option value="0">Nổi bật</option>
                                <option selected value="1   ">Không nổi bật</option>
                            <?php
                            }
                            ?>   
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


