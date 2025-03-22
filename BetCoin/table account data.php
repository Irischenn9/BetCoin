<?php
session_start();
include_once('DBconnect.php');


if(isset($_SESSION['no'])){
   $no=$_SESSION['no'];
    
}else{
  header('Location: login.php');
}
    $SQL="SELECT * FROM users where no='$no'";
    $result=mysqli_query($link,$SQL);
    $row=mysqli_fetch_assoc($result);

    // echo "<option value='".$row["no"]."'>".$row["no"]."-".$row["teamName"]."</option>";


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
                <li><a class="dropdown-item" href="table account data.php">會員資料</a></li>
                <li><a class="dropdown-item" href="logout.php">登出</a></li>
                
              </ul>
      
              
            </li>
          </ul>
        </div>

       
        
        
<!--     
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>&nbsp&nbspUser&nbsp&nbsp&nbsp</strong>
          <font size="2">$8000&nbsp&nbsp&nbsp</font>	
          
          
        </a>
        
      </div> -->
    </div></nav>

    </div>
  </div>
</nav>

<table class="table">
    <thead class="thead-dark">
      <h4><b>會員資料</b></h4></br>
      <form action="loginConfirm.php" method="post" syle="width:60%; margin:0px auto;">
   
      </thead>  
      <tbody>
      <tr>
          <th scope="row">姓名</th>
          <td><?php echo $row['name']; ?></td>      
          <!-- <td> <input type="button" value="修改" name="修改" style="width:100px;height:30px;"></td> -->
        </tr> 
       
        <tr>
          <th scope="row">電子郵件</th>
          <td><?php echo $row['email']; ?></td>      
          <!-- <td> <input type="button" value="修改" name="修改" style="width:100px;height:30px;"></td> -->
        </tr> 
        <tr>
          <th scope="row">密碼</th>
          <td><?php echo $row['pwd']; ?></td>      
          <td> 
          <!-- <input type="button" value="修改" name="修改" style="width:100px;height:30px;"> --> 
          <input type="button" name="修改" value="修改"   onclick="location.href='repwd.php'" />
        </td></tr>
        <tr>
          <th scope="row">匯款帳號</th>
          <td><?php echo $row['bankAccount']; ?></td>  
          <td> 
            <!-- <input type="button" value="修改" name="修改" style="width:100px;height:30px;"> -->
          <input type="button" name="匯款帳號" value="修改" onclick="location.href='reaccount.php'" /> 
           
        </td>  </tr><tr>
          <th scope="row">帳戶餘額</th>
          <td>
          <?php
          $uNo=$row["no"];
          $total=0;
          $SQLmoney="SELECT*FROM money WHERE uNo='$uNo'";
          $resultMoney=mysqli_query($link,$SQLmoney);
          while($rowMoney=mysqli_fetch_assoc($resultMoney)){
            $total=$total+$rowMoney["changeAmount"];
            
          }
         
          $notUse=0;
          $SQLUsergame="SELECT*FROM usergame WHERE uNo='$uNo'";
          $SQLGame="SELECT*FROM game where outcome='未知'";

          $resultGame=mysqli_query($link,$SQLGame);
          $resultUsergame=mysqli_query($link,$SQLUsergame);

          while($rowUsergame=mysqli_fetch_assoc($resultUsergame)){
            while($rowGame=mysqli_fetch_assoc($resultGame)){
              if($rowUsergame["gNo"]==$rowGame["no"]){
                $notUse=$notUse+$rowUsergame["betAmount"]; 
              }
            }    
          }
          
          $transfer=0;
          $SQLMoneyTransfer="SELECT*FROM moneytransfer WHERE uNo='$uNo' && inOrOut='O' && comfirm='N'";
          $resultMoneyTransfer=mysqli_query($link,$SQLMoneyTransfer);
          while($rowMoneyTransfer=mysqli_fetch_assoc($resultMoneyTransfer)){
            $transfer=$transfer-$rowMoneyTransfer["amount"];
          }


          echo $total-$notUse+$transfer;
          ?>
          </td>  
          <td> 
          
          <input type="button" name="匯款" value="匯款" onclick="location.href='addmoney.php'" />  
          <input type="button" name="提款" value="提款" onclick="location.href='outmoney.php'" /> 
          <input type="button" name="交易紀錄" value="交易紀錄" onclick="location.href='record.php?uNo=<?php echo $row['no']; ?>'" />       
        </td>  </tr>
    </tbody>
 </table> 



 </br>

<h4><b>參賽資料</b></h4>
<table class="table">
  <thead class="thead-dark">
    <tbody>
    <tr>
      <th scope="col">投注時間</th>
      <th scope="col"></th>
      <th scope="col">比賽隊伍</th>
      <th scope="col">投注隊伍</th>
      <th scope="col">投注金額</th> 
    
    </tr>
  </thead>

<?php
                    $SQL="SELECT * FROM usergame where uNo=$no";
                    //搜尋所有資料

                    $result=mysqli_query($link,$SQL);     
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $SQLGame="SELECT * FROM game WHERE no=".$row["gNo"];
                            $resultGame=mysqli_query($link,$SQLGame);
                            $game=mysqli_fetch_assoc($resultGame);

                            $SQLUser="SELECT * FROM users WHERE no=".$row["uNo"];
                            $resultUser=mysqli_query($link,$SQLUser);
                            $user=mysqli_fetch_assoc($resultUser);

                            $SQLUserTeam="SELECT * FROM team WHERE no=".$row["tNo"];
                            $resultUserTeam=mysqli_query($link,$SQLUserTeam);
                            $userTeam=mysqli_fetch_assoc($resultUserTeam);

                            $SQLTeam1= "SELECT * FROM team WHERE no=".$game["t1No"];
                            $resultTeam1=mysqli_query($link,$SQLTeam1);
                            $team1=mysqli_fetch_assoc($resultTeam1);

                            $SQLTeam2="SELECT * FROM team WHERE no=".$game["t2No"];
                            $resultTeam2=mysqli_query($link,$SQLTeam2);
                            $team2=mysqli_fetch_assoc($resultTeam2);

                            

                            echo "<tr>";
                            
                            echo "<td colspan='2'>".$row["date"]."</td><td>".$team1["teamName"]." vs ".$team2["teamName"]."</td><td>".$userTeam["teamName"]."</td><td>".$row["betAmount"]."</td>";
                          ?>  
                          
                          
                           <?php                        
                    
                            echo "</tr>";
                        }
                    }
                    ?>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>



</html>
