<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');
?>

<?php 
class product
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_product($data,$files){
        $SP_TEN       = mysqli_real_escape_string($this->db->link, $data['SP_TEN']);
        $danhmuc      = mysqli_real_escape_string($this->db->link, $data['danhmuc']);
        $loai_sp      = mysqli_real_escape_string($this->db->link, $data['loai_sp']);
        $SP_MOTA      = mysqli_real_escape_string($this->db->link, $data['SP_MOTA']);
        $SP_GIA       = mysqli_real_escape_string($this->db->link, $data['SP_GIA']);
        $SP_MAU       = mysqli_real_escape_string($this->db->link, $data['SP_MAU']);
        $SP_TRANGTHAI = mysqli_real_escape_string($this->db->link, $data['SP_TRANGTHAI']);
        $SP_TINHTRANG = mysqli_real_escape_string($this->db->link, $data['SP_TINHTRANG']);

        //Kiểm tra và lấy hình ảnh cho vào thư mục uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['SP_HINHANH']['name'];  
        $file_size = $_FILES['SP_HINHANH']['size'];  
        $file_temp = $_FILES['SP_HINHANH']['tmp_name'];
        
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($SP_TEN == "" || $danhmuc == "" || $loai_sp == "" || $SP_MOTA == "" || $SP_GIA == "" || $SP_MAU == ""
        || $SP_TRANGTHAI == "" || $SP_TINHTRANG == "" || $file_name == ""){
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO sanpham(SP_TEN, DMSP_MA, LSP_MA, SP_MOTA, SP_GIA, SP_MAU, SP_TRANGTHAI, SP_TINHTRANG, SP_HINHANH) 
            VALUES ('$SP_TEN','$danhmuc','$loai_sp','$SP_MOTA','$SP_GIA','$SP_MAU','$SP_TRANGTHAI','$SP_TINHTRANG','$unique_image')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'> Thêm sản phẩm thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Thêm sản phẩm thất bại!!!</span>";
                return $alert; 
            }
           
        }

    }
    public function show_product (){
        $query = "SELECT sanpham.*, danhmuc.DMSP_TEN, loai_sp.LSP_TEN
        FROM sanpham INNER JOIN danhmuc ON sanpham.DMSP_MA = danhmuc.DMSP_MA
        INNER JOIN loai_sp ON sanpham.LSP_MA = loai_sp.LSP_MA 
        order by sanpham.SP_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($data,$files,$id){

        $SP_TEN       = mysqli_real_escape_string($this->db->link, $data['SP_TEN']);
        $danhmuc      = mysqli_real_escape_string($this->db->link, $data['danhmuc']);
        $loai_sp      = mysqli_real_escape_string($this->db->link, $data['loai_sp']);
        $SP_MOTA      = mysqli_real_escape_string($this->db->link, $data['SP_MOTA']);
        $SP_GIA       = mysqli_real_escape_string($this->db->link, $data['SP_GIA']);
        $SP_MAU       = mysqli_real_escape_string($this->db->link, $data['SP_MAU']);
        $SP_TRANGTHAI = mysqli_real_escape_string($this->db->link, $data['SP_TRANGTHAI']);
        $SP_TINHTRANG = mysqli_real_escape_string($this->db->link, $data['SP_TINHTRANG']);
        
        //Kiểm tra và lấy hình ảnh cho vào thư mục uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['SP_HINHANH']['name'];  
        $file_size = $_FILES['SP_HINHANH']['size'];  
        $file_temp = $_FILES['SP_HINHANH']['tmp_name'];
        
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($SP_TEN == "" || $danhmuc == "" || $loai_sp == "" || $SP_MOTA == "" || $SP_GIA == "" || $SP_MAU == ""
        || $SP_TRANGTHAI == "" || $SP_TINHTRANG == ""){
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Chọn ảnh để up
                if($file_size > 204800){
                    $alert = "<span class='error'> Kích thước ảnh quá lớn!!! Bạn chỉ được upload ảnh dưới 20GB</span>";
                    return $alert;
                }elseif(in_array($file_ext, $permited) == false)
                {
                    $alert = "<span class='error'> Bạn chỉ được upload hình thuộc định dạng: - ".implode(',',$permited)."</span>";
                    return $alert;
                }
                $query = "UPDATE sanpham SET 
                SP_TEN = '$SP_TEN', DMSP_MA = '$danhmuc', LSP_MA = '$loai_sp', SP_MOTA = '$SP_MOTA', SP_GIA = '$SP_GIA', 
                SP_MAU = '$SP_MAU', SP_TRANGTHAI = '$SP_TRANGTHAI', SP_TINHTRANG = '$SP_TINHTRANG', SP_HINHANH = '$unique_image'
                WHERE SP_MA = '$id'";
            }else{
                //Không chọn ảnh
                $query = "UPDATE sanpham SET 
                SP_TEN = '$SP_TEN', DMSP_MA = '$danhmuc', LSP_MA = '$loai_sp', SP_MOTA = '$SP_MOTA', SP_GIA = '$SP_GIA', 
                SP_MAU = '$SP_MAU', SP_TRANGTHAI = '$SP_TRANGTHAI', SP_TINHTRANG = '$SP_TINHTRANG'
                WHERE SP_MA = '$id'";
            }
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'> Sửa sản phẩm thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Sửa sản phẩm thất bại!!!</span>";
                return $alert; 
            }
            
        }
    }
    public function delete_product($id) {
        $query = "DELETE FROM sanpham WHERE SP_MA = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'> Xóa sản phẩm thành công!</span>"; 
            return $alert; 
        }else{
            $alert = "<span class='error'> Xóa sản phẩm thất bại!!!</span>";
            return $alert; 
        }   
    }
    public function getproductbyId($id){
        $query = "SELECT * FROM sanpham WHERE SP_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    //end back-end
    public function getproduct_feathered(){
        $query = "SELECT sanpham.*, danhmuc.DMSP_TEN
        FROM sanpham INNER JOIN danhmuc ON sanpham.DMSP_MA = danhmuc.DMSP_MA  
        WHERE SP_TRANGTHAI = '0'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_new(){
        $query = "SELECT sanpham.*, danhmuc.DMSP_TEN
        FROM sanpham INNER JOIN danhmuc ON sanpham.DMSP_MA = danhmuc.DMSP_MA 
        order by sanpham.SP_MA DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_details($id){
        $query = "SELECT sanpham.*, danhmuc.DMSP_TEN, loai_sp.LSP_TEN
        FROM sanpham INNER JOIN danhmuc ON sanpham.DMSP_MA = danhmuc.DMSP_MA
        INNER JOIN loai_sp ON sanpham.LSP_MA = loai_sp.LSP_MA 
        WHERE sanpham.SP_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>