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
    $pd = new product();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $insert_product = $pd->insert_product($_POST,$_FILES);
    }   
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <div class="block">
        <?php 
                if(isset($insert_product)){
                    echo $insert_product;
                }
                ?>               
         <form action=" 0" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name = "SP_TEN" placeholder="Nhập tên sản phẩm" class="medium" />
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
                            <option value="<?php echo $result['DMSP_MA']?>"><?php echo $result['DMSP_TEN']?></option>
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
                            <option value="<?php echo $result['LSP_MA']?>"><?php echo $result['LSP_TEN']?></option>
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
                        <textarea name="SP_MOTA" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá gốc</label>
                    </td>
                    <td>
                        <input type="text" name="SP_GIA" placeholder="Nhập giá sản phẩm" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh sản phẩm</label>
                    </td>
                    <td>
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
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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


