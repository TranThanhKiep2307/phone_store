<?php
$activate = "profile";
ob_start();
@include('inc/header.php');
?>
  
<?php
	$login_check = Session::get('customer_login');
	if($login_check==false){
		header('Location:login.php');
	}
?>
<?php 
    $id = Session::get('customer_id');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit-infor'])
        ) {
        $update_customers = $cs->update_customers($_POST,$id);
    }   
?>
 
<link rel="stylesheet" href="css/login.css">
<script src="js/login.js"></script>  
<main>
    <form class="form" action="" method="POST">
        <h2 class="title">Thông tin cá nhân</h2>
            <?php
            if(isset($update_customers)){
                echo $update_customers;
            }
            ?>
            <?php
            $id = Session::get('customer_id');
            $get_customers = $cs->show_customers($id);
            if ($get_customers){
                while($result = $get_customers->fetch_assoc()){ 
            ?>
            <label><input class="form__input" type="text" name="KH_TEN" placeholder="<?php echo $result['KH_TEN']?>"></label>
            <label><input class="form__input" type="number" name="KH_SDT" placeholder="<?php echo $result['KH_SDT']?>"></label>
            <label><input class="form__input" type="email" name="KH_EMAIL" placeholder="<?php echo $result['KH_EMAIL']?>"></label>
            <label><input class="form__input" type="text" name="KH_DIACHI" placeholder="<?php echo $result['KH_DIACHI']?>"></label>
            <label><input class="form__input" type="password" id= "KH_PASSWORD" name="KH_PASSWORD" placeholder="Nhập mật khẩu mới để đổi"></label>
            <button type="submit" name="submit-infor" class="form__button ">Sửa thông tin</button>
            <?php
                    }
                }
            ?>
        </div>
    </form>
    <br/>
    <br/>
</main>


<?php
@include('inc/footer.php');
?>