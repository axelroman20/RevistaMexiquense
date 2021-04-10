<?php 

class SendEmails {
  /**
   * Método para enviar un correo al usuario a una sección determinada
   *
   * @param string $location
   * @return void
   */
  public static function send($addAdress, $name, $subjet, $body) {
    require("assets/plugins/PHPMailer/PHPMailer.php");
    require("assets/plugins/PHPMailer/SMTP.php");
    require("assets/plugins/PHPMailer/Exception.php");
    
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = EMAIL_USER;                     //SMTP username
        $mail->Password   = EMAIL_PASS;                               //SMTP password
        $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom(EMAIL_USER, EMAIL_NAME);
        $mail->addAddress($addAdress, $name);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subjet;
        $mail->Body    = $body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}