<?php
@include('../lib/session.php');
session::checkLogin();
@include('../lib/database.php');
@include('../helpers/format.php');
?>

<?php 
class adminlogin
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function login_admin($AD_username,$AD_password){
        $AD_username = $this -> fm -> validation ($AD_username);
        $AD_password = $this -> fm -> validation ($AD_password);

        $AD_username = mysqli_real_escape_string($this->db->link, $AD_username);
        $AD_password = mysqli_real_escape_string($this->db->link, $AD_password);

        if(empty($AD_username)||empty($AD_password)){
            $alert = "Tài khoản và mật khẩu không được trống!!!";
            return $alert;
        }else{
            $query = "SELECT * FROM admin WHERE AD_username = '$AD_username' AND AD_password = '$AD_password'LIMIT 1";
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                session::set('adminlogin', true);
                session::set('AD_id',$value['AD_id']);
                session::set('AD_username',$value['AD_username']);
                session::set('AD_ten',$value['AD_ten']);
                header('location:index.php');
            }else{
                $alert = "Tài khoản và mật khẩu không được trống!!!";
                return $alert;
            }
        }

    }
}
?>