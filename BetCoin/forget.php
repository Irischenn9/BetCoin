<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>忘記密碼</title>
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
<h1>忘記密碼</h1>
</div>
<form action="forgetconfirm.php" method="post">
</div>
    <div class="col-md-7 col-lg-8">
    <h4 class="mb-3"></h4>
    <form class="needs-validation" novalidate>
    <div class="row g-3">

    <div class="col-12">
    <label for="email" class="form-label">電子郵件</label>
              <div class="input-group has-validation">
              <input type="email" class="form-control" name="email" placeholder="電子郵件" required>
              <div class="invalid-feedback">
              </div>
              </div>
            </div>
<!-- 
            <div class="col-12">
              <label for="password" class="form-label">請輸入新密碼 <span class="text-muted"></span></label>
              <input type="password" class="form-control" name="pwd" placeholder="密碼" required>
            </div> -->

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" >送出新密碼</button>
        </form>
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


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </form></body>
</html>






</form>


