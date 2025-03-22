
<?php

session_start();
require("DBconnect.php");//require是一定要



$SQL="SELECT * FROM users";
if(isset($_POST["email"])){
$name=$_POST["name"];
$email=$_POST["email"];
$pwd=$_POST["pwd"];
$bankAccount=$_POST["bankAccount"];

$noData="TRUE";
if($email!=null && $pwd!=null){
    $result=mysqli_query($link,$SQL);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            if($row["email"]==$email){
                $noData="FALSE";
                break;
            }else{
                $noData="TRUE";
            }
        }
        if($noData=="TRUE"){
            $SQL="INSERT INTO users (no, name,email, pwd, bankAccount, role) VALUES (NULL,'$name','$email','$pwd','$bankAccount','U')";
            $insert=mysqli_query($link,$SQL);
            if($insert){
               
                echo"<script type='text/javascript'>";
                echo"alert('註冊成功');";
                echo"</script>";
                echo"<meta http-equiv='Refresh' content='0;url=login.php'>";
            }else{
                echo "0 record added";
            }
            //echo "資料庫沒有相同資料!"; 
        }else{
            
            echo"<script type='text/javascript'>";
            echo"alert('您已註冊過，請直接登入');";
            echo"</script>";
            echo"<meta http-equiv='Refresh' content='0;url=login.php'>";
        }
    }                                       
}else{
    echo "請輸入資料";
}  
}else{
echo "請輸入資料";
}
?>                