<?php 
/**
 * Clase que envia un correo electronico al coreeo de soporte
 * del formulario de contacto dentro del proyecto
 */
class SendEmailsContact {
  /**
   * Método para enviar un correo al usuario a una sección determinada
   *
   * @param string $location
   * @return void
   */
  public static function send($name, $subjet, $body) {
    require("assets/plugins/PHPMailer/PHPMailer.php");
    require("assets/plugins/PHPMailer/SMTP.php");
    require("assets/plugins/PHPMailer/Exception.php");
    
    // Creación de instancias
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    try {
        // Configuración del servidor
        $mail->SMTPDebug = 0;            // Habilitar la salida de depuración detallada
        $mail->isSMTP();                 // Enviar usando SMTP
        $mail->Host       = EMAIL_HOST;  // Configure el servidor SMTP para enviar
        $mail->SMTPAuth   = true;        // Habilitar la autenticación SMTP
        $mail->Username   = EMAIL_USER;  // Nombre de usuario SMTP
        $mail->Password   = EMAIL_PASS;  // Contraseña SMTP
        $mail->SMTPSecure = 'tls';       // Habilite el cifrado TLS
        $mail->Port       = 587;         // Puerto TCP para conectarse
    
        // Destinatarios
        $mail->setFrom(EMAIL_USER, $name);
        $mail->addAddress(EMAIL_USER, EMAIL_NAME);  

        // Contenido
        $mail->isHTML(true);            // Establecer formato de correo electrónico en HTML
        $mail->Subject = $subjet;       // Establece el asunto del correo electornico
        $mail->Body    = $body;         // Establece el contenido del correo electornico
    
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}