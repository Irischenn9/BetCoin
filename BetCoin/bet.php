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
    <title>下注</title>

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
    <center><h1>下注</h1></center>
    </div>


  

<?php
            
            if(isset($_GET["gno"])){
              $gno=$_GET["gno"];
            }    
            $SQL="SELECT * FROM game where no='$gno'";
            $result=mysqli_query($link,$SQL);
            $row=mysqli_fetch_assoc($result);
              // if($searchResult){
                 
?>
<?php
                   
     $SQLTeam1="SELECT * FROM team WHERE no=".$row["t1No"];
    $resultTeam1=mysqli_query($link,$SQLTeam1);
     $team1Name=mysqli_fetch_assoc($resultTeam1);

      $SQLTeam2="SELECT * FROM team WHERE no=".$row["t2No"];
       $resultTeam2=mysqli_query($link,$SQLTeam2);
       $team2Name=mysqli_fetch_assoc($resultTeam2);

        echo "<tr>";
?>
    
</div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3"></h4>
        <!-- <form class="needs-validation" novalidate> -->
          <div class="row g-3">

          <!-- <center>User</center><input type="radio" name="role" value="U" required></br>
        <center>Admin</center><input type="radio" name="role" value="A" required></br> -->
        <form action="bet.php?gno=<?php  echo $row['no']; ?>" method="post" syle="width:60%; margin:0px auto;">

        <div class="mb-3">
        <label for="username" class="form-label">請選擇隊伍</label>
          <select class="form-select form-select-lg mb-3" id="tNo" name="tNo" aria-label=".form-select-lg example" require>
          
          <?php
            echo "<option value='".$row["t1No"]."'>".$team1Name["teamName"]."</option>";
            echo "<option value='".$row["t2No"]."'>".$team2Name["teamName"]."</option>";
          ?>
        </select>
        </div>
        
      
            
          </select>
        </div>

        <div class="mb-3">
        <label for="username" class="form-label">請輸入金額</label>
        
        <div class="input-group mb-3">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control"name="betAmount" aria-label="Amount (to the nearest dollar)" required>
          <span class="input-group-text">.00</span>
          </div>
        </div>
       

          <hr class="my-4">
          <div>

          <!-- <input type="button" name="submit" value="登入" class="w-50 btn btn-primary btn-lg"  /> -->
    <br/> <center><input type="submit" name="submit" value="下注" class="w-50 btn btn-primary btn-lg" ></center>
</form>
</div>

<?php


  
if(isset($_POST["betAmount"])){
$gNo=$_GET["gno"];
$uNo=$_SESSION['no'];
$tNo=$_POST["tNo"];
$betAmount=$_POST["betAmount"];

$total=0;
$SQLmoney="SELECT*FROM money WHERE uNo='$uNo'";
$resultMoney=mysqli_query($link,$SQLmoney);
while($rowMoney=mysqli_fetch_assoc($resultMoney)){
  $total=$total+$rowMoney["changeAmount"];
  
}

$notUse=0;
$SQLUsergame="SELECT*FROM usergame WHERE uNo='$uNo'";
$resultUsergame=mysqli_query($link,$SQLUsergame);
while($rowUsergame=mysqli_fetch_assoc($resultUsergame)){
  $notUse=$notUse+$rowUsergame["betAmount"];
  
}

$transfer=0;
$SQLMoneyTransfer="SELECT*FROM moneytransfer WHERE uNo='$uNo' && inOrOut='O' && comfirm='N'";
$resultMoneyTransfer=mysqli_query($link,$SQLMoneyTransfer);
while($rowMoneyTransfer=mysqli_fetch_assoc($resultMoneyTransfer)){
  $transfer=$transfer-$rowMoneyTransfer["amount"];
}
echo "目前餘額: ".$total-$notUse+$transfer;

if(($total-$notUse)>$betAmount){


$SQL="INSERT INTO usergame (no, gNo,uNo, tNo, betAmount,date) VALUES (NULL,'$gNo','$uNo','$tNo','$betAmount' ,default )";


            $insert=mysqli_query($link,$SQL);
            if($insert){
               
                echo"<script type='text/javascript'>";
                echo"alert('下注成功');";
                echo"</script>";
               echo"<meta http-equiv='Refresh' content='0;url=raceAfterLogin.php?gno=".$row['no']."'>";
            }
        else{
            
            echo"<script type='text/javascript'>";
            echo"alert('下注失敗');";
            echo"</script>";
           echo"<meta http-equiv='Refresh' content='0;url=addmoney.php'>";
        }
      }else{
        echo"<script type='text/javascript'>";
            echo"alert('餘額不足');";
            echo"</script>";
      } 
    }
?>


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
