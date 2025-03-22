<?php
session_start();
session_destroy();
// setcookie("UID",$id,time()-36);
header('Location:home.php');
?>