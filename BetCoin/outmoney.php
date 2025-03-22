<?php
session_start();
include_once('DBconnect.php');



    // $SQL="SELECT * FROM users where no='$no'";
    // $SQL="SELECT * FROM moneytransfer where uNo=$no ";
    // $result=mysqli_query($link,$SQL);
    // $row=mysqli_fetch_assoc($result);


?>
<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>提款</title>
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

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
  <center>
<div class="container">
  <main>
    <br>

<div class="py-5 text-center">
<h1>提款</h1>
</div>
<form action="outmoney.php" method="post">
</div>
    <div class="col-md-7 col-lg-8">
    <h4 class="mb-3"></h4>
    <form class="needs-validation" novalidate>
    <div class="row g-3">
<form action ="addmoney.php"method="post">   
            <div class="col-12">
              <!-- <label for="text" class="form-label"><h4><b>銀行代號:</b> &nbsp 700 (中華郵政) <span class="text-muted"></span></label></br>
    </br>
              <label for="text" class="form-label"><h4><b>帳號:</b>&nbsp 24221101-0067147 <span class="text-muted"></span></label></br>
    </br>
              <label for="text" class="form-label"><h4><b>戶名:</b>&nbsp Betcoin <span class="text-muted"></span></label></br>
              </div> -->

              </br>         
              <div class="col-12">
              <label for="text" class="form-label">提款</label>
              <div class="input-group has-validation">
              <input type="text" class="form-control" name="amount" placeholder="" required>
              
            </div></div>
    </br>
    </br>
    </br>
    </br>
    
            <center><input type="submit" name="submit" value="送出" class="w-50 btn btn-primary btn-lg" ></center>
            

          <hr class="my-4">

          <!-- <button class="w-100 btn btn-primary btn-lg" type="submit" >更新</button> -->
        </form>
      </div>
    </div>
  </center>  
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022 BetCoin</p>
    <ul class="list-inline">
     
    </ul>
  </footer>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </form></body>
</html>





</form>

<?php

if(isset($_POST["amount"])){
  
$uNo=$_SESSION['no'];
$amount=$_POST["amount"];


$SQL="INSERT INTO moneytransfer (no, uNo,amount, inOrOut, comfirm, askDate, comfirmDate) VALUES (NULL,'$uNo','$amount','O',default ,default ,default )";


            $insert=mysqli_query($link,$SQL);
            if($insert){
               
                echo"<script type='text/javascript'>";
                echo"alert('提款成功');";
                echo"</script>";
               echo"<meta http-equiv='Refresh' content='0;url=table account data.php'>";
            }
        else{
            
            echo"<script type='text/javascript'>";
            echo"alert('提款失敗');";
            echo"</script>";
           echo"<meta http-equiv='Refresh' content='0;url=outmoney.php'>";
        }
    }   
?>
   
               