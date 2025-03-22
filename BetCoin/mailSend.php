<?php
require("DBconnect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$title="BetCoin 忘記密碼";
$SQLTable="SELECT * FROM users WHERE email='".$_GET["email"]."'";
$result=mysqli_query($link,$SQLTable);
$row=mysqli_fetch_assoc($result);

$message="您的新密碼為: \n".$row['pwd'];
$message=nl2br($message);


//Create an instance; passing `true` enables exceptions

if($title!=null){
    
    if($result){
        
        $mail = new PHPMailer(true);
        $email=$_GET["email"];
           try {
            //Server settings
            $mail->SMTPDebug = 0;                                       //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '';                                     //SMTP username you need to enter you email for sending email
            $mail->Password   = '';                                      //SMTP password you need to enter you email password for sending email
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->SMTPSecure ="ssl";
            $mail->CharSet ="UTF-8";
            //Recipients
            $mail->setFrom('a1083365@mail.nuk.edu.tw', 'Betcoin');
            $mail->addAddress($email, '使用者');     //Add a recipient
            $mail->isHTML(true);                     //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';//如果不是用Html
        
            $mail->send();
            header('Location:login.php');

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        }
    }


?>
