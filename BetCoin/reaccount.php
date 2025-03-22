<html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>修改匯款帳號</title>
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
<h1>修改匯款帳號</h1>
</div>
<form action="reaccountConfirm.php" method="post">
</div>
    <div class="col-md-7 col-lg-8">
    <h4 class="mb-3"></h4>
    <form class="needs-validation" novalidate>
    <div class="row g-3">

            <div class="col-12">
              <label for="text" class="form-label">請輸入新匯款帳號 <span class="text-muted"></span></label>
              <input type="text" class="form-control" name="bankAccount" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "14" placeholder="" required>
            </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" >更新</button>
        </form>
      </div>
    </div>
  </center>  
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022 BetCoin</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </form></body>
</html>





</form>


