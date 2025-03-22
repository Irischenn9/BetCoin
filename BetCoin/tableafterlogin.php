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
                <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>-->
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
                <li><a class="dropdown-item" href="table account data.php">會員資料</a></li>
                <li><a class="dropdown-item" href="logout.php">登出</a></li>
                <!-- <li><a class="dropdown-item" href="#">註冊</a></li> -->
                <!-- <li><a class="dropdown-item" href="#">餘額查詢</a></li> -->
                
              </ul>

              
              
            </li>
          </ul>
        </div>


    
    
    </div></nav>
    
    </div>
  </div>
</nav>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">賽局開始時間</th>
      <th scope="col"></th>
      <th scope="col">隊伍1</th>
      <th scope="col"></th>
      <th scope="col">隊伍2</th>
      <th scope="col">隊伍1賠率</th> 
      <th scope="col">隊伍2賠率</th>
      <th scope="col">隊伍一勝負</th>
     
      
    </tr>
  </thead>
                <form action="tableafterlogin.php" method="post" enctype="multipart/form-data">
                <!-- <table border="3px" style="border-collapse:collapse;"> -->
                    <tr class="tableTitle" style="background-color:#6B6B6B;">
                       
                    </tr>
                   
       
                    </tr>
                  
                </form>
                    <?php
                    $SQL="SELECT * FROM game where outcome!='未知'";
                    //搜尋所有資料
                    $result=mysqli_query($link,$SQL);     
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $SQLTeam1="SELECT * FROM team WHERE no=".$row["t1No"];
                            $resultTeam1=mysqli_query($link,$SQLTeam1);
                            $team1Name=mysqli_fetch_assoc($resultTeam1);

                            $SQLTeam2="SELECT * FROM team WHERE no=".$row["t2No"];
                            $resultTeam2=mysqli_query($link,$SQLTeam2);
                            $team2Name=mysqli_fetch_assoc($resultTeam2);

                            echo "<tr>";
                            echo "<td  width='300' valign='middle'>".$row["gameStartTime"]."</td>";
                            echo "<td width='80'>";
                            echo "<img src=".$team1Name["icon"]." style='width:60%; height:30%' align=left>";
                            echo "</td>";
                            echo "<td  valign='middle'>".$team1Name["teamName"]."</td>";
                            echo "<td width='80'>";
                            echo "<img src=".$team2Name["icon"]." style='width:60%; height:30%' align=right>";
                            echo "</td>";
                            echo "<td  valign='middle'>".$team2Name["teamName"]."</td><td  valign='middle'>".$row["team1Odds"]."</td><td  valign='middle'>".$row["team2Odds"]."</td>";
                            echo "<td>".$row["outcome"]."</td>";     
                            echo "</tr>";
                          
                        }
                        
                    }
                    ?>
                   
                </table>
                <?php   
            
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