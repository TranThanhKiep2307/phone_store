<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');
?>

<?php 
class customers
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_customers($data){
        $KH_TEN = mysqli_real_escape_string($this->db->link, $data['KH_TEN']);
        $KH_SDT = mysqli_real_escape_string($this->db->link, $data['KH_SDT']);
        $KH_EMAIL = mysqli_real_escape_string($this->db->link, $data['KH_EMAIL']);
        $KH_DIACHI = mysqli_real_escape_string($this->db->link, $data['KH_DIACHI']);
        $KH_PASSWORD = mysqli_real_escape_string($this->db->link, md5($data['KH_PASSWORD']));

        if($KH_TEN == "" || $KH_SDT == "" || $KH_EMAIL == "" || $KH_DIACHI == "" || $KH_PASSWORD == ""){
            $alert = "<span class='error'>Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            $check_email = "SELECT * FROM khachhang WHERE KH_EMAIL ='$KH_EMAIL' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if($result_check){
                $alert = "<span class='error'>Email đã tồn tại!!!</span>";
                return $alert;
            }else{
                $query = "INSERT INTO khachhang(KH_TEN, KH_SDT, KH_EMAIL, KH_DIACHI, KH_PASSWORD) 
                VALUES ('$KH_TEN','$KH_SDT','$KH_EMAIL','$KH_DIACHI','$KH_PASSWORD')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'> Đăng ký thành công!</span>";
                    return $alert; 
                }else{
                    $alert = "<span class='error'> Đăng ký thất bại!!!</span>";
                    return $alert; 
                }
            }
        }
    }
    public function login_customers($data){
        $KH_TEN = mysqli_real_escape_string($this->db->link, $data['KH_TEN']);
        $KH_PASSWORD = mysqli_real_escape_string($this->db->link, md5($data['KH_PASSWORD']));

        if($KH_TEN == "" || $KH_PASSWORD == ""){
            $alert = "<span class='error'>Tên hoặc mật khẩu không được trống!!!</span>";
            return $alert;
        }else{
            $check_login = "SELECT * FROM khachhang WHERE KH_TEN = '$KH_TEN' AND KH_PASSWORD = '$KH_PASSWORD'";
            $result_check = $this->db->select($check_login);
            if($result_check){
                $value = $result_check ->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('customer_id',$value['KH_TEN']);
                Session::set('customer_password',$value['KH_PASSWORD']);
                header('Location:checkout.php');
            }else{
                $alert = "<span class='error'>Tên hoặc mật khẩu không đúng!!!</span>";
            return $alert;
            }
        }
    }
}
?>