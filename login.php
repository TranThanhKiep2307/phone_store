<?php 
$activate = "login";
ob_start();
@include('inc/header.php');
?>
<link rel="stylesheet" href="css/login.css">
<script src="js/login.js"></script>
<?php
   $login_check = Session::get('customer_login'); 
   if($login_check){ 
      header('Location:checkout.php'); 
   }	
?>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $login_customers = $cs->login_customers($_POST);
    }   
?>          
<main>                                
        <form class="form" action="" method="POST">
            <h2 class="title ">ĐĂNG NHẬP</h2>
            <?php
						if(isset($login_customers)){
                     echo $login_customers;
                  }
					?>     
                     <input class="form__input" type="text" name="KH_EMAIL" placeholder="Email"  >
                     <input class="form__input" type="password" name="KH_PASSWORD" placeholder="Mật khẩu" >
                     <div>
                        <i>Chưa có tài khoản???</i>
                        <a class="buttonlogin" href="register.php">Đăng ký</a>
                        <style>
                           a.buttonlogin{
                              color: #D10024;
                              text-decoration:underline;
                              font-weight: bold;
                           }
                        </style>
                     </div>
                    <button type="submit" name="submit" class="form__button ">ĐĂNG NHẬP</button>                                      
        </form>
        <br/>
        <br/>
        </main>                            
</form>

<?php 
@include('inc/footer.php');
?>	