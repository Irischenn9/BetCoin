<?php
session_start();
$no = $_SESSION["no"];/* userid of the user */
$con = mysqli_connect('localhost','root','','betcoin') or die('Unable To connect');
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT *from users WHERE no='" . $no . "'");
$row=mysqli_fetch_array($result);

mysqli_query($con,"UPDATE users set bankAccount='" . $_POST["bankAccount"] . "' WHERE no='" . $no . "'");
$message = "bankAccount Changed Sucessfully";
echo"<script type='text/javascript'>";
    echo"alert('更新成功');";
    echo"</script>";
   echo"<meta http-equiv='Refresh' content='0;url=table account data.php'>";
} else{
 $message = "Password is not correct";
 echo"<script type='text/javascript'>";
 echo"alert('更新失敗');";
 echo"</script>";
 echo"<meta http-equiv='Refresh' content='0;url=reaccount.php'>";
}

?>