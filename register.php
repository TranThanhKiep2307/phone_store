<?php 
$activate = "register";
@include('inc/header.php');
?>
<link rel="stylesheet" href="css/login.css">
<script src="js/login.js"></script>          
<main>                                
        <form class="form" onsubmit="return checkformsignup(this)"  action="addlist.php">
            <h2 class="title ">ĐĂNG KÝ</h2>
                    
                      <input class="form__input" type="text" placeholder="Username" id="US_NAME" >
                      <input class="form__input" type="text" placeholder="Email" id="email">
                      <input class="form__input" type="text" placeholder="Địa chỉ" id="KH_DIACHI">
                      <input class="form__input" type="password" placeholder="Password" id="password">
                      <input class="form__input" type="password" placeholder="Nhập lại Password" id="password">
                    <div>
                        <input type="checkbox" checked> Đồng ý với những điều khoản của chúng tôi</i>
                    </div>
                    <div>
                        <i>Đã có tài khoản!!!</i>
                        <a href="login.php">Đăng Nhập</a>
                        <style>
                           a{
                              color: #D10024;
                              text-decoration:underline;
                              font-weight: bold;
                           }
                        </style>
                     </div>
                    <button type="submit" class="form__button ">ĐĂNG KÝ</button>                                      
        </form>
        <br/>
        <br/>
        </main>                            
</form>

<?php 
@include('inc/footer.php');
?>	