<?php
@include_once('../lib/database.php');
@include_once('../helpers/format.php');

?>

<?php 
class brand
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_brand($LSP_TEN){
        $LSP_TEN = $this -> fm -> validation ($LSP_TEN);
        $LSP_TEN = mysqli_real_escape_string($this->db->link, $LSP_TEN);

        if(empty($LSP_TEN)){
            $alert = "<span class='error'> Tên sản phẩm không được trống!!!</span>";
            return $alert;
        }else{
            $query = "INSERT INTO loai_sp(LSP_TEN) VALUES ('$LSP_TEN')";
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
    public function show_brand (){
        $query = "SELECT * FROM loai_sp ORDER BY LSP_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_brand($LSP_TEN,$id){
        $LSP_TEN = $this -> fm -> validation ($LSP_TEN);
        $LSP_TEN = mysqli_real_escape_string($this->db->link, $LSP_TEN);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($LSP_TEN)){
            $alert = "<span class='error'> Tên sản phẩm không được trống!!!</span>";
            return $alert;
        }else{
            $query = "UPDATE loai_sp SET LSP_TEN = '$LSP_TEN' WHERE LSP_MA = '$id'";
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

    public function delete_brand($id) {
        $query = "DELETE FROM loai_sp WHERE LSP_MA = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'> Xóa sản phẩm thành công!</span>";
            return $alert; 
        }else{
            $alert = "<span class='error'> Xóa sản phẩm thất bại!!!</span>";
            return $alert; 
        }   
    }
    public function getbrandbyId($id){
        $query = "SELECT * FROM loai_sp WHERE LSP_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>