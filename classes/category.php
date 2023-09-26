<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');

?>

<?php 
class category
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_category($DMSP_TEN){
        $DMSP_TEN = $this -> fm -> validation ($DMSP_TEN);
        $DMSP_TEN = mysqli_real_escape_string($this->db->link, $DMSP_TEN);

        if(empty($DMSP_TEN)){
            $alert = "<span class='error'> Danh mục sản phẩm không được trống!!!</span>";
            return $alert;
        }else{
            $query = "INSERT INTO danhmuc(DMSP_TEN) VALUES ('$DMSP_TEN')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'> Thêm danh mục sản phẩm thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Thêm danh mục sản phẩm thất bại!!!</span>";
                return $alert; 
            }

           
        }

    }
    public function show_category (){
        $query = "SELECT * FROM danhmuc ORDER BY DMSP_MA DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_category($DMSP_TEN,$id){
        $DMSP_TEN = $this -> fm -> validation ($DMSP_TEN);
        $DMSP_TEN = mysqli_real_escape_string($this->db->link, $DMSP_TEN);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($DMSP_TEN)){
            $alert = "<span class='error'> Danh mục sản phẩm không được trống!!!</span>";
            return $alert;
        }else{
            $query = "UPDATE danhmuc SET DMSP_TEN = '$DMSP_TEN' WHERE DMSP_MA = '$id'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'> Cập nhật danh mục sản phẩm thành công!</span>";
                return $alert; 
            }else{
                $alert = "<span class='error'> Cập nhật danh mục sản phẩm thất bại!!!</span>";
                return $alert; 
            }

           
        }
    }

    public function delete_category($id) {
        $query = "DELETE FROM danhmuc WHERE DMSP_MA = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'> Xóa danh mục sản phẩm thành công!</span>";
            return $alert; 
        }else{
            $alert = "<span class='error'> Xóa danh mục sản phẩm thất bại!!!</span>";
            return $alert; 
        }   
    }
    public function getcatbyId($id){
        $query = "SELECT * FROM danhmuc WHERE DMSP_MA = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>