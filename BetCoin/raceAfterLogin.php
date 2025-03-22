<?php
session_start();
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
    <title>籃球</title>

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
                <li><a class="dropdown-item" href="home after login.php">介紹</a></li>
               
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
 
    
    </div></nav>
      
    </div>
  </div>
</nav>

        </center>
        </div>
    </body>
</html>
<html>
    
      
    </header>
    <body>
        
        </div>
       
        <center>
        <table class="table">
 

        
            <?php
            
              if(isset($_GET["gno"])){
                $gno=$_GET["gno"];
              
              
              
              $SQL="SELECT * FROM game where no='$gno'";
              $result=mysqli_query($link,$SQL);
              $row=mysqli_fetch_assoc($result);
              
                // if($searchResult){
                   
                    ?>
                    
                    </tr>
         
              
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                    </tr>
                   
       
                    </tr>
                  
                </form>
                    <?php
                   
                            $SQLTeam1="SELECT * FROM team WHERE no=".$row["t1No"];
                            $resultTeam1=mysqli_query($link,$SQLTeam1);
                            $team1Name=mysqli_fetch_assoc($resultTeam1);

                            $SQLTeam2="SELECT * FROM team WHERE no=".$row["t2No"];
                            $resultTeam2=mysqli_query($link,$SQLTeam2);
                            $team2Name=mysqli_fetch_assoc($resultTeam2);
                            

                            echo "<tr>";
                            
                            ?>
                            
    <div class="container">

      <!-- <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"> -->
        <center><div class="col">
         
            <br>
            
            
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $row["channelParameter"];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           
            <table style="" >

                            <td><h3> <span class="badge bg-secondary"><?php  echo $team1Name["teamName"]." ".$row["team1Odds"]; ?> </span></p></td>
                            <td ></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
     
                            <td> <h3><span class="badge bg-secondary"><?php  echo $team2Name["teamName"]." ".$row["team2Odds"]; ?></span></p></td>

                            <?php
                           
                            echo"</tr>";               
                          }  ?>
                    
                 </p>   
                  <!-- <div class="album py-5 bg-light"> -->
                 
                </table>
                <div></div>
                <br></br>
                <?php
                  echo "</br>";
                  date_default_timezone_set('Asia/Taipei');
                  $today = date('Y-m-d H:i:s');
                  if(strtotime($today)>strtotime($row["gameStartTime"])){
                  ?>
                  <center><h1>已超過下注時間</h1></center>
                  <?php
                  }else{
                    ?>
                      <center><button class="w-45 btn btn-primary btn-lg"  type="submit" onclick="location.href='bet.php?gno=<?php  echo $row['no']; ?>'">&emsp;&emsp; &emsp;  &emsp; &emsp; &emsp;&emsp; &emsp; 開始下注&emsp;&emsp;  &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; </button>  </center>
                    <?php
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