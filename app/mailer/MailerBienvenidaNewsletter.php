s<?php
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
    $mail->Username   = 'theErutan@gmail.com';             
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
    $mail->setFrom('theErutan@gmail.com', 'Admin');
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
    $mail->Subject = "Welcome! There is only one step more";
    //Conteido HTML
    $mail->Body    ="<body style='background-color: rgb(169, 224, 224); margin:0;'>
    <div style='background-color: bisque; display:flex;'>
        <div style='display:inline-block;'><img style='width:120px'src='https://images2.imgbox.com/d2/a2/a76zqUW6_o.jpg?download=true' alt=''></div>
        <div style='display:inline-block; margin: auto;'><a style='text-decoration: none; color:black; font-size:3.4rem;'href='#'>Sveiki</a></div>
    </div>
<div style='width: 90%; margin: auto;'>
    <div >
        <h1>Hello $email!</h1><hr>
        <p><b style='font-size:1.8rem;'>Welcome to our Newsletter.</b><br><br>From now on we will notify you of all our news and you will also enjoy vouchers that you can redeem at our partner restaurants.</p>
        <img style='width: 100%; border: 5px solid rgb(255, 255, 255);'src='https://images2.imgbox.com/e0/0a/2xUuD2n6_o.jpg?download=true'>
        <br>
        <br>
        <img style='width: 100%; border: 5px solid rgb(255, 255, 255);'src='https://images2.imgbox.com/16/06/O6rgutFm_o.jpg?download=true'>
    </div>
</div>
<footer>
    <div style='background-color: black; color:white; height: 70px; text-align: center; line-height: 70px;'><h1>Make food a great experience with us</h1>
    </div>
</footer>
</body>";
    //Contenido alternativo en texto simple
    $mail->AltBody = '<b>Hola<b><br>Bienvenido a nuestra Newsletter';
    //Enviar correo
    $mail->send();
    echo 'El mensaje se ha enviado con exito';
} catch (Exception $e) {
    echo "El mensaje no se ha enviado: {$mail->ErrorInfo}";
    
}
?>