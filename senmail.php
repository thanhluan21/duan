<?php
include  "/xampp/htdocs/pms/pms/PHPMailer-master/src/PHPMailer.php";
include  "/xampp/htdocs/pms/pms/PHPMailer-master/src/Exception.php";
include  "/xampp/htdocs/pms/pms/PHPMailer-master/src/OAuth.php";
include  "/xampp/htdocs/pms/pms/PHPMailer-master/src/POP3.php";
include  "/xampp/htdocs/pms/pms/PHPMailer-master/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$ac='luan.tt.60cntt@ntu.edu.vn';
$pass="1";

function sendMail( $acount,$pass){
    $mFrom = 'luanbeo21@gmail.com';  //dia chi email cua ban 
    $mPass = 'luan123456789';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 587;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->setFrom('from@example.com', 'CTTNHH TMS');
  
    $mail->Subject    = 'Here is the account and password';
    $mail->Body='Password of you is: '.$pass;
    $address = $acount;
    $mail->AddAddress($address, 'you');
    $mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}
