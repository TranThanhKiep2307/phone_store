<?php 
$activate = "login";
@include('inc/header.php');
?>
<link rel="stylesheet" href="css/login.css">
<script src="js/login.js"></script>          
<main>                                
        <form class="form" onsubmit="return checkformsignup(this)"  action="addlist.php">
            <h2 class="title ">ĐĂNG NHẬP</h2>
                    
                      <input class="form__input" type="text" placeholder="Username" id="US_NAME" >
                      <!-- <input class="form__input" type="text" placeholder="Email" id="email"> -->
                      <input class="form__input" type="password" placeholder="Password" id="password">
                      <!-- <input class="form__input" type="password" placeholder="Nhập lại Password" id="password"> -->
                     <div>
                        <i>Chưa có tài khoản???</i>
                        <a href="register.php">Đăng ký</a>
                        <style>
                           a{
                              color: #D10024;
                              text-decoration:underline;
                              font-weight: bold;
                           }
                        </style>
                     </div>
                    <button type="submit" class="form__button ">ĐĂNG NHẬP</button>                                      
        </form>
        <br/>
        <br/>
        </main>                            
</form>

<?php 
@include('inc/footer.php');
?>	