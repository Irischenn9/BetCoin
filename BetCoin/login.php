<?php
session_start();
require("DBconnect.php");
?>




<html>
<html lang="zh-TW">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    
    <head>
    <title>登入</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


<link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
  <center>
<div class="container">
  <main>
    <br>
    
    <div class="py-5 text-center">
    <center><h1>登入</h1></center>
    </div>

<form action="login.php" method="post" syle="width:60%; margin:0px auto;">
  


    
</div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3"></h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
          <div class="col-12">
          <label for="username" class="form-label">電子郵件</label>
              <div class="input-group has-validation">
              <input type="email" class="form-control" name="email" placeholder="電子郵件" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">密碼 <span class="text-muted"></span></label>
              <input type="password" class="form-control" name="pwd" placeholder="密碼" required>
            </div>

          <hr class="my-4">
          <div>






    
          <!-- <input type="button" name="submit" value="登入" class="w-50 btn btn-primary btn-lg"  /> -->
    <br/> <center><input type="submit" value="登入" class="w-50 btn btn-primary btn-lg" ></center>
</form>
</div><div>
      <a href='forget.php'>忘記密碼</a>
          
        </div></form>
      </div>
    </div>
  </center>  
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022 BetCoin</p>
    <ul class="list-inline">
      <!-- <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li> -->
    </ul>
  </footer>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
      </form></form></body>
      
</html>




<?php



if (isset($_POST["email"])){
    if($_POST["email"]!=null){

        $email=$_POST["email"];
        $pwd=$_POST["pwd"];
        $SQL="SELECT*FROM users WHERE email='$email' AND pwd='$pwd'";
        $result=mysqli_query($link,$SQL);
        $row=mysqli_fetch_assoc($result);
        $total=mysqli_num_rows($result);
        
        if($total==1){
        // if (mysqli_num_rows($result)==1){ 
            //$_SESSION["login"]="Yes";
            //setcookie("email","pwd",$email,$pwd,time()+17280);
            $_SESSION['no']=$row['no'];
           if($row["role"]=="A"){
            header('Location:backstage/user/userInsert.php');

           }else{
            header('Location:home after login.php');
           }
           
           
           
        }else{
           
            echo"<script type='text/javascript'>";
            echo"alert('帳號密碼輸入錯誤');";
            echo"</script>";
            // echo"<meta http-equiv='Refresh' content='0;url=login.php'>";
        }
            

     

    }else{
    
        // echo"您尚未輸入帳號密碼";


    }
}else{

    // echo"歡迎登入請輸入帳號密碼";
}

    


?>


</html>