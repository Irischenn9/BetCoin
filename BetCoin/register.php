<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>會員註冊</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/"> -->

    

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
     <!-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
      <h2>會員註冊</h2>
      <!--<p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>-->
    </div>
    <form action ="registerConfirm.php"method="post">

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3"></h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">

          
          <div class="col-12">
              <label for="name" class="form-label">姓名</label>
              <div class="input-group has-validation">
              <input type="text" class="form-control" name="name" placeholder="姓名" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

          
          <div class="col-12">
              <label for="email" class="form-label">電子郵件</label>
              <div class="input-group has-validation">
              <input type="email" class="form-control" name="email" placeholder="電子郵件" required>
              <div class="invalid-feedback">
                  Your email is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">密碼 <span class="text-muted"></span></label>
              <input type="password" class="form-control" name="pwd" placeholder="密碼" required>
            </div>


            <div class="col-12">
              <label for="account" class="form-label">(郵局)匯款帳號<span class="text-muted"></span></label>
              <input type="number" class="form-control" name=bankAccount oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "14" required>
              <div class="invalid-feedback">
                
              </div>
            </div>

           



          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address"required>
            <label class="form-check-label" for="same-address"  >我已閱讀並同意服務條款及隱私權政策</label>
          </div>

         
    

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" >加入會員</button>
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


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </form></body>
</html>
