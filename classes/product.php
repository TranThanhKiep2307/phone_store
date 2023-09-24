<?php
@include_once('../lib/database.php');
@include_once('../helpers/format.php');
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
        $SP_TEN = mysqli_real_escape_string($this->db->link, $data['SP_TEN']);
        $danhmuc = mysqli_real_escape_string($this->db->link, $data['danhmuc']);
        $loai_sp = mysqli_real_escape_string($this->db->link, $data['loai_sp']);
        $SP_MOTA = mysqli_real_escape_string($this->db->link, $data['SP_MOTA']);
        $SP_GIA = mysqli_real_escape_string($this->db->link, $data['SP_GIA']);
        $SP_TRANGTHAI = mysqli_real_escape_string($this->db->link, $data['SP_TRANGTHAI']);
        
        //Kiểm tra và lấy hình ảnh cho vào thư mục uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['SP_HINHANH']['name'];  
        $file_size = $_FILES['SP_HINHANH']['size'];  
        $file_temp = $_FILES['SP_HINHANH']['tmp_name'];
        
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($SP_TEN == "" || $danhmuc == "" || $loai_sp == "" || $SP_MOTA == "" || $SP_GIA == "" || $SP_TRANGTHAI == "" || $SP_TEN == "" || $file_name == ""){
            $alert = "<span class='error'> Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO sanpham(SP_TEN,DMSP_MA,LSP_MA,SP_MOTA,SP_GIA,SP_TRANGTHAI,SP_HINHANH) 
            VALUES ('$SP_TEN','$danhmuc','$loai_sp','$SP_MOTA','$SP_GIA','$SP_TRANGTHAI','$unique_image')";
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
        $query = "SELECT * FROM sanpham ORDER BY SP_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($SP_TEN,$id){
        $SP_TEN = $this -> fm -> validation ($SP_TEN);
        $SP_TEN = mysqli_real_escape_string($this->db->link, $SP_TEN);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($SP_TEN)){
            $alert = "<span class='error'> Tên sản phẩm không được trống!!!</span>";
            return $alert;
        }else{
            $query = "UPDATE loai_sp SET SP_TEN = '$SP_TEN' WHERE SP_MA = '$id'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'> Cập nhật sản phẩm thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Cập nhật sản phẩm thất bại!!!</span>";
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
}
?>