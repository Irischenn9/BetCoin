<?php
session_start();
$no = $_SESSION["no"];/* userid of the user */
$con = mysqli_connect('localhost','root','','betcoin') or die('Unable To connect');
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT *from users WHERE no='" . $no . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["pwd"] && $_POST["newPassword"] == $_POST["confirmPassword"] ) {
mysqli_query($con,"UPDATE users set pwd='" . $_POST["newPassword"] . "' WHERE no='" . $no . "'");
$message = "Password Changed Sucessfully";
echo"<script type='text/javascript'>";
    echo"alert('更新成功');";
    echo"</script>";
   echo"<meta http-equiv='Refresh' content='0;url=table account data.php'>";
} else{
 $message = "Password is not correct";
 echo"<script type='text/javascript'>";
 echo"alert('更新失敗請輸入密碼');";
 echo"</script>";
 echo"<meta http-equiv='Refresh' content='0;url=repwd.php'>";
}
}
?>