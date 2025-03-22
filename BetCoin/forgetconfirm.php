<?php
require("DBconnect.php");



$email=$_POST["email"];

$comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
 $pass = array(); 
 $combLen = strlen($comb) - 1; 
 for ($i = 0; $i < 8; $i++) {
     $n = rand(0, $combLen);
     $pass[] = $comb[$n];
 }
$pwd=implode($pass);


// echo $email.$pwd;

$SQL="UPDATE users SET pwd='$pwd' WHERE email='$email'";

if(mysqli_query($link,$SQL)){
    echo"<script type='text/javascript'>";
    echo"alert('已寄出郵件');";
    echo"</script>";
   echo"<meta http-equiv='Refresh' content='0;url=mailSend.php?email=".$email."'>";
   // header('LOcation:list.php');


}else{
    echo"<script type='text/javascript'>";
    echo"alert('寄出郵件失敗');";
    echo"</script>";
    
    echo"<meta http-equiv='Refresh' content='0;url=forget.php'>";



}

?>