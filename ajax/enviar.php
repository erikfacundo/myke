<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$comentarios = $_POST['comentarios'];

$mail = new PHPMailer(true);

$body  = '<b>Nombre: </b> ' . $nombre . '<br>';
$body .= '<b>Email: </b> ' . $email . '<br>';
$body .= '<b>Telefono: </b> ' . $telefono . '<br>';
$body .= '<b>Comentario: </b> ' . $comentarios . '<br>';

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contactoweb360.web@gmail.com';                     //SMTP username
    $mail->Password   = 'kawb ifsb bpif xpju';                               //SMTP password
   /*  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   */          //Enable implicit TLS encryption
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contactoweb360.web@gmail.com', 'Contacto Web');
    $mail->addAddress('contactoweb360.web@gmail.com');     //Add a recipient
    $mail->addAddress('ventas@mycktrade.com');               //Name is optional
    $mail->addReplyTo($email);
  /*   $mail->addCC('cc@example.com'); */
    $mail->addBCC('florfacundoerik@gmail.com');
    $mail->addBCC('ventas@mycktrade.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contacto web - ' .  $nombre ;
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    
    $mail->send();
    echo '1';
} catch (Exception $e) {
    echo "2";
}

/* if($mail){
echo "1";
}else{
    echo "2";
} */