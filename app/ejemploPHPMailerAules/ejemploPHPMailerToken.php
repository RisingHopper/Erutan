<?php
//Carga de las clases necesarias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Crear una instancia. Con true permitimos excepciones
$mail = new PHPMailer(true);

try {
    //Valores dependientes del servidor que utilizamos
    
    $mail->isSMTP();                                           //Para usaar SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Nuestro servidor SMTMP smtp.gmail.com en caso de usar gmail
    $mail->SMTPAuth   = true;    
    /* 
    * SMTP username y password Poned los vuestros. La contraseña es la que nos generó GMAIL
    */
    $mail->Username   = 'theerutan@gmail.com';             
    $mail->Password   = 'lzee ocek hnyg bcws';    
    /*
    * Encriptación a usar ssl o tls, dependiendo cual usemos hay que utilizar uno u otro puerto
    */            
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
    $mail->Port = "465";
    /**TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`                         
     * $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
     * $mail->Port       = 587;  
     */


    /*
    Receptores y remitente
    */
//Remitente
    $mail->setFrom('theerutan@gmail.com', 'Admin');
//Receptores. Podemos añadir más de uno. El segundo argumento es opcional, es el nombre
    $mail->addAddress($email, 'Nombre destinatario, es opcional');     //Add a recipient
    //$mail->addAddress('ejemplo@example.com'); 

    //Copia
    //$mail->addCC('cc@example.com');
    //Copia Oculta
    //$mail->addBCC('bcc@example.com');

    //Archivos adjuntos
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Contenido
    //Si enviamos HTML
    $mail->isHTML(true);    
    $mail->CharSet = "UTF8";    
    //Asunto
    $mail->Subject = "Verificación de cuenta";
    //Conteido HTML
    $mail->Body    = "Hola $usuario, tu cuenta ha sido creado correctamente. Solo queda un paso, verifica tu cuenta accediendo en este enlace: "."http://localhost/dwes/theErutan/web/index.php?ctl=verificarCuenta&token=$tokenUsuario";
    //$mail->Body  = "Hola $username, tu cuenta ha sido creado correctamente. Solo queda un paso, verifica tu cuenta accediendo en este enlace: "."http://vps793825.ovh.net/~jquispe/ProyectoGeraiDefinitivo/web/index.php?ctl=verificarCuenta&token=$tokenUsuario";
    //Contenido alternativo en texto simple
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    //Enviar correo
    $mail->send();
    echo 'El mensaje se ha enviado con exito';
} catch (Exception $e) {
    echo "El mensaje no se ha enviado: {$mail->ErrorInfo}";
    
}
?>