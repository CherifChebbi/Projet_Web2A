<?php
if (isset($_GET['email']) && isset($_GET['num'])) {
require './PHPMailer/PHPMailerAutoload.php';
require_once     '../../Controller/commandec.php';
$commandec = new commandec();
$a = $commandec->getcommandebynum($_GET['num']) ;

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mouhamedaziz.turki@esprit.tn';                 // SMTP username
$mail->Password = '201JMT1752';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply@AIM.com', 'no-reply');
$mail->addAddress($_GET['email']);     // Add a recipient
$mail->addAddress('mouhamedaziz.turki@esprit.tn');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);   



$mail->Subject = 'Bienvenue';
$mail->Body = 'salut,<br>
               merci pour la participation a lcommande '.$a['num'] .'
                <br><br>
               this message was sent from an unmonitored address . Please do not reply to this address.<br><br>Best regards,<br>the ADRENALINA Team';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
//---------------------end sending mail -----------//


header('Location: affichercommandeback.php');
}else {
    header('Location: affichercommandeback.php');
}
?>