<?php
include  "../PHPMailer-master/src/PHPMailer.php";
include  "../PHPMailer-master/src/Exception.php";
include  "../PHPMailer-master/src/OAuth.php";
include  "../PHPMailer-master/src/POP3.php";
include  "../PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'luanbeo21@gmail.com';                 // SMTP username
    $mail->Password = 'luan123456789';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('from@example.com', 'CTTNHH TMS');
    $mail->addAddress('luan.tt.60cntt@ntu.edu.vn', 'You');     // Add a recipient              // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
//    / $mail->addBCC('bcc@example.com');
 
    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the account and password';
    $mail->Body    = '<table border="1"> <tr>
    <th>Account</th>
    <th>Password</th> 
</tr>
<tr>
            <th></th>
            <th></th>
        </tr>
</table>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>