<?php 
$activate = "register";
ob_start();
@include('inc/header.php');
?>
<link rel="stylesheet" href="css/login.css">
<script src="js/login.js"></script>    
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $insert_customers = $cs->insert_customers($_POST);
    }   
?>        
<main>                                
        <form class="form" action="" method="POST">
            <h2 class="title">ĐĂNG KÝ</h2>
               <?php
						if(isset($insert_customers)){
                     echo $insert_customers;
                  }
					?>
                     <input class="form__input" type="text" name="KH_TEN" placeholder="Tên tài khoản"  >
                     <input class="form__input" type="number" name="KH_SDT" placeholder="Số điện thoại"  >
                     <input class="form__input" type="text" name="KH_EMAIL" placeholder="Email" >
                     <input class="form__input" type="text" name="KH_DIACHI" placeholder="Địa chỉ" >
                     <input class="form__input" type="password" name="KH_PASSWORD" placeholder="Password">
                      <!-- <input class="form__input" type="password" name="KH_PASSWORD" placeholder="Nhập lại Password"> -->
                    <!-- <div>
                        <input type="checkbox" checked> Đồng ý với những điều khoản của chúng tôi</i>
                    </div> -->
                    <div>
                        <i>Đã có tài khoản!!!</i>
                        <a class="buttonregister" href="login.php">Đăng Nhập</a>
                        <style>
                           a.buttonregister{
                              color: #D10024;
                              text-decoration:underline;
                              font-weight: bold;
                           }
                        </style>
                     </div>
                    <button type="submit" name = "submit" class="form__button ">ĐĂNG KÝ</button>                                      
        </form>
        <br/>
        <br/>
        </main>                            
</form>

<?php 
@include('inc/footer.php');
?>	