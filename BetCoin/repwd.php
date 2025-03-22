<html>
<html lang="zh-TW">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    
    <head>
<title>修改密碼</title>
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

<h1>修改密碼</h1>
</div>
<div><?php if(isset($message)) { echo $message; } ?></div>

<form method="post" action="repwdcomfirm.php" syle="width:60%; margin:0px auto;">
</div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3"></h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
          <div class="col-12">
          
         
            </div>



<center>請輸入原始密碼</center>  <br>
<input type="password" class="form-label"name="currentPassword"><span id="currentPassword" class="text-muted" required></span>
<br>
<center>請輸入新密碼</center>  <br>
<input type="password" class="form-label"name="newPassword"><span id="newPassword" class="text-muted" required></span>
<br>
<center>請再次輸入新密碼</center>  <br>
<input type="password" class="form-label"name="confirmPassword"><span id="confirmPassword" class="text-muted" required></span>
<br><br>
<hr class="my-4">
<center><input type="submit"class="w-50 btn btn-primary btn-lg"></center> 
      
</div></form>
      </div>
    </div>
  </center>  
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022 BetCoin</p>
  </footer>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
      </form></form></body>
      
</html>
