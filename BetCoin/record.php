


<?php
require("DBconnect.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>交易紀錄</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-static/">

    

    <!-- Bootstrap core CSS -->
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
    <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">BetCoin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                首頁
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="home.php">介紹</a></li>
               
              </ul>
        
            </li>
          </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                賽局
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="listAfterLogin.php">籃球</a></li>
               
              </ul>
            
              
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                賽事表
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="tableafterlogin.php">籃球</a></li>
                
              </ul>

              
              
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                會員
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                
                <!-- <li><a class="dropdown-item" href="login.php">登入</a></li>
                <li><a class="dropdown-item" href="register.php">註冊</a></li> -->
                <a class="dropdown-item" href="table account data.php">會員資料</a>
                <li><a class="dropdown-item" href="logout.php">登出</a></li>
                 
              </ul>             
            </li>
          </ul>
        </div>
 
    </nav>
        
        
    
      <!-- <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>&nbsp&nbspUser&nbsp&nbsp&nbsp</strong>
          <font size="2">$8000&nbsp&nbsp&nbsp</font>	
          
          
        </a>
        
      </div> -->
    </div></nav>
      <!--<main class="container">
        <div class="bg-light p-1 rounded">
          <h1>Navbar example</h1>
          
         
        </div>
      </main>-->

      <!--<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>-->
    </div>
  </div>
</nav>

        </center>
        </div>
    </body>
</html>
<html>
    
        <!-- <link href="../css/backStage.css?version=1" rel="stylesheet" type="text/css"> -->
    </header>
    <body>
        
        </div>
        

        <!-- <div class="content" style="font-size:42px; width:83%;"> -->
        <center>
        <table class="table">
  <thead class="thead-dark">
    <tr>
    
<h4><b>交易紀錄</b></h4>
<table class="table">
  <thead class="thead-dark">
    <tbody>
    <tr>
      <th scope="col">投注時間</th>
     
      <th scope="col">來源</th> 
      <th scope="col">金額</th> 
    
    </tr>
  </thead>
      
     
      
    </tr>
  </thead>

  <?php
                    
                    if(isset($_GET["uNo"])){
                        $uNo=$_GET["uNo"];
                    
                    $SQL="SELECT * FROM money where uNo='$uNo'";
                   
                    //搜尋所有資料
                    $result=mysqli_query($link,$SQL); 
                    if($result){
                      while($row=mysqli_fetch_assoc($result)){    
                    
                            echo "<tr>";
                            echo "<td width='300' valign='middle'>".$row["changeTime"]."</td>";
                            echo "<td width='300' valign='middle'>".$row["sourceFrom"]."</td>";
                            echo "<td width='300' valign='middle'>".$row["changeAmount"]."</td>";                          
                            echo "</tr>";
                        }
                        }

                        
                    
                    ?>


                            

                          
                           <?php                        
                    
                            echo "</tr>";
                        
                        
                      }
                
                    ?>

        
            
        </center>
        </div>
    </body>
</html>                           
                        

 
  <tbody>
 
  
    </tr>
  </tbody>
</table>



    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>



</html>