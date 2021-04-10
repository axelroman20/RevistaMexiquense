<?php
class SendEmails {

    public static function send($addAdress, $username, $subjet, $body) {
        require("./assets/plugins/PHPMailer/PHPMailer.php");
        require("./assets/plugins/PHPMailer/SMTP.php");
        require("./assets/plugins/PHPMailer/Exception.php");
    
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $email_smtp = 'smtp.hostinger.mx';
        $email_user = 'soporte@revista-gcm.live';
        $email_pass = 'Revista123';
        $email_name = 'RevistaGCM';
        $email_port = 587;


        //Instantiation and passing `true` enables exceptions
        //$mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                              //Enable verbose debug output
            $mail->isSMTP();                                                   //Send using SMTP
            $mail->CharSet    = "UTF-8";
            $mail->Host       = $email_smtp;                                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                          //Enable SMTP authentication
            $mail->Username   = $email_user;                                    //SMTP username
            $mail->Password   = $email_pass;                                    //SMTP password
            $mail->SMTPSecure = 'tls';                                         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = $email_port;   

            //Recipients
            $mail->setFrom($email_user, $email_name);
            $mail->addAddress($addAdress, $username);     //Add a recipient
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