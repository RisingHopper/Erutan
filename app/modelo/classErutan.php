<?php

class Erutan extends Modelo {

    // FUNCIONES ASOCIADAS A REGISTRO E INICIO SESION
    public function insertarUsuario($nombreCompleto, $nombreUsuario, $email, $telefono, $pais, $ciudad, $contrasenya) {
        $consulta = "INSERT INTO usuarios (nombreCompleto, nombreUsuario, email, telefono, pais, ciudad, contrasenya) VALUES (:nombreCompleto, :nombreUsuario, :email, :telefono, :pais, :ciudad, :contrasenya)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreCompleto', $nombreCompleto);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->bindParam(':email', $email);
        $result->bindParam(':telefono', $telefono);
        $result->bindParam(':pais', $pais);
        $result->bindParam(':ciudad', $ciudad);
        $result->bindParam(':contrasenya', $contrasenya);
        $result->execute();
        return $result;
    }
    public function verUsuario($idUser) {
        $consulta = "SELECT * FROM usuarios WHERE idUser=:idUser";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $idUser);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function consultarIdUsuario($nombreUsuario) {
        $consulta = "SELECT idUser FROM usuarios WHERE nombreUsuario=:nombreUsuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function consultarUsuario($nombreUsuario) {
        $consulta = "SELECT * FROM usuarios WHERE nombreUsuario=:nombreUsuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function insertarToken($token,$idUsuario,$caducidad){
        $consulta="INSERT INTO token_verifica_cuenta (token,idUsuario,caducidad) VALUES (:token, :idUsuario, :caducidad)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':token', $token);
        $result->bindParam(':idUsuario', $idUsuario);
        $result->bindParam(':caducidad', $caducidad);
        $result->execute();
        return $result;
    }
    public function insertarPuntos($idUsuario,$puntos){
        $consulta="INSERT INTO ranking_usuarios (idUsuario,respuestasAcertadas) VALUES (:idUsuario, :puntos)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUsuario', $idUsuario);
        $result->bindParam(':puntos', $puntos);
        $result->execute();
        return $result;
    }
    public function seleccionarToken($tokenUsuario) {
        $consulta = "SELECT * FROM token_verifica_cuenta WHERE token=:tokenUsuario";        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':tokenUsuario', $tokenUsuario);
        $result->execute();    
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verificarToken($idUsuario){
        $consulta="UPDATE usuarios SET verificado=1 where idUser=:idUsuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUsuario', $idUsuario);
        $result->execute();
        return $result;
    }
    public function insertAccount($username, $password) {
        $consulta = "INSERT INTO account (`Username`, `Passwd`) VALUES (:username, :passwd)";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':username', $username);
        $result->bindParam(':passwd', $password);
        $result->execute();

        return $result;
    }

    // FUNCIONES ASOCIADAS A NEWSLETTER
    public function insertarEmailToNewsletter($email,$name, $phone){
        $consulta="INSERT INTO registro_email_to_newsletter (email,nombre,phoneNumber) VALUES (:email, :nombre, :phoneNumber)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':email', $email);
        $result->bindParam(':nombre', $name);
        $result->bindParam(':phoneNumber', $phone);
        $result->execute();
        return $result;
    }
    public function crearMensajeNewsletter($titulo, $asunto,$mensaje,$imagen){
        $consulta="INSERT INTO newsletter_listado_mensajes (titulo,asunto,mensaje,imagen) VALUES (:titulo, :asunto, :mensaje, :imagen)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':asunto', $asunto);
        $result->bindParam(':mensaje', $mensaje);
        $result->bindParam(':imagen', $imagen);
        $result->execute();
        return $result;
    }
    public function actualizarNewsletter($titulo, $asunto,$mensaje){
        $consulta="UPDATE newsletter_listado_mensajes SET  titulo=:titulo, asunto=:asunto, mensaje=:mensaje  WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':asunto', $asunto);
        $result->bindParam(':mensaje', $mensaje);
        // $result->bindParam(':imagen', $imagen);
        $result->execute();
        return $result;
    }
    public function actualizarPublicacion($titulo, $tituloPost, $textoCard, $contenido, $categoria,$contenidoCarrusel){
        $consulta="UPDATE publicaciones_contenido_web SET  titulo=:titulo, tituloPost=:tituloPost, textoCard=:textoCard, contenido=:contenido, categoria=:categoria, contenidoCarrusel=:contenidoCarrusel WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':tituloPost', $tituloPost);
        $result->bindParam(':textoCard', $textoCard);
        $result->bindParam(':contenido', $contenido);
        $result->bindParam(':categoria', $categoria);
        $result->bindParam(':contenidoCarrusel', $contenidoCarrusel);
        // $result->bindParam(':imagen', $imagen);
        $result->execute();
        return $result;
    }

    public function actualizarImagenPublicacion($titulo, $imagen){
        $consulta="UPDATE publicaciones_contenido_web SET  imagen=:imagen WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':imagen', $imagen);
        $result->execute();
        return $result;
    }
    public function actualizarImagenNewsletter($titulo, $imagen){
        $consulta="UPDATE newsletter_listado_mensajes SET  imagen=:imagen WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':imagen', $imagen);
        $result->execute();
        return $result;
    }
    public function actualizarImagenUsuario($idUser, $imagen){
        $consulta="UPDATE usuarios SET  fotoPerfil=:fotoPerfil WHERE idUser=:idUser";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $idUser);
        $result->bindParam(':fotoPerfil', $imagen);
        $result->execute();
        return $result;
    }
    public function actualizarPasswordUsuario($idUser, $password){
        $consulta="UPDATE usuarios SET  contrasenya=:contrasenya WHERE idUser=:idUser";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $idUser);
        $result->bindParam(':contrasenya', $password);
        $result->execute();
        return $result;
    }

    public function actualizarUsuario($idUser, $nombreCompleto, $telefono,$nombreUsuario,$email, $ciudad, $pais){
        $consulta="UPDATE usuarios SET  nombreCompleto=:nombreCompleto, telefono=:telefono, nombreUsuario=:nombreUsuario, email=:email, ciudad=:ciudad, pais=:pais WHERE idUser=:idUser";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreCompleto', $nombreCompleto);
        $result->bindParam(':telefono', $telefono);
        $result->bindParam(':email', $email);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        // $result->bindParam(':fotoPerfil', $fotoPerfil);
        $result->bindParam(':idUser', $idUser);
        $result->bindParam(':ciudad', $ciudad);
        $result->bindParam(':pais', $pais);
        // $result->bindParam(':contrasenya', $newPassword);
        $result->execute();
        return $result;
    }
    public function listarNewsletter() {
        $consulta = "SELECT * FROM newsletter_listado_mensajes ORDER BY titulo ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listarRegistradosNewsletter() {
        $consulta = "SELECT * FROM registro_email_to_newsletter ORDER BY dateSend ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verNewsletterB($idNewsletter) {
        $consulta = "SELECT * FROM newsletter_listado_mensajes WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $idNewsletter);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function verPublicacion($idPublicacion) {
        $consulta = "SELECT * FROM publicaciones_contenido_web WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $idPublicacion);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function verRanking() {
        $consulta = "SELECT idUsuario, SUM(respuestasAcertadas) FROM ranking_usuarios GROUP by idUsuario ORDER BY SUM(respuestasAcertadas) DESC LIMIT 3";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $idPublicacion);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function borrarNewsletter($idNewsletter) {
        $consulta = "DELETE FROM newsletter_listado_mensajes WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $idNewsletter);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function borrarUsuario($idUsuario) {
        $consulta = "DELETE FROM usuarios WHERE idUser=:idUser";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idUser', $idUsuario);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function borrarPublicacion($idPost) {
        $consulta = "DELETE FROM publicaciones_contenido_web WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $idPost);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function listarEmails() {
        $consulta = "SELECT email FROM registro_email_to_newsletter";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // FUNCIONES ASOCIADAS A DASHBOARD
    public function insertaVisitas(){
        $consulta="INSERT INTO visitas (ip) VALUES (ip+1)";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result;
    }
    public function consultaVisitas(){
        $consulta="SELECT contador FROM visitas";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function visitasXfecha(){
        $consulta="SELECT dateSend, COUNT(id) FROM visitas GROUP BY dateSend";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function registrosXfecha(){
        $consulta="SELECT dateSend, COUNT(idUser) FROM usuarios GROUP BY dateSend";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function visitasTotales(){
        $consulta="SELECT COUNT(*) FROM visitas";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function usuariosTotales(){
        $consulta="SELECT COUNT(*) FROM usuarios";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function newsletterTotales(){
        $consulta="SELECT COUNT(*) FROM newsletter_listado_mensajes";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function publicacionesTotales(){
        $consulta="SELECT COUNT(*) FROM publicaciones_contenido_web";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    //FUNCIONES ASOCIADAS A CONTENIDO
    public function insertarPublicacion($titulo, $tituloPost, $textoCard, $contenido,$categoria,$imagen,$contenidoCarrusel,$idioma){
        $consulta="INSERT INTO publicaciones_contenido_web (titulo, tituloPost, textoCard,contenido,categoria,imagen,contenidoCarrusel,idioma) VALUES (:titulo, :tituloPost, :textoCard,:contenido, :categoria, :imagen, :contenidoCarrusel, :idioma)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':tituloPost', $tituloPost);
        $result->bindParam(':textoCard', $textoCard);
        $result->bindParam(':contenido', $contenido);
        $result->bindParam(':categoria', $categoria);
        $result->bindParam(':imagen', $imagen);
        $result->bindParam(':contenidoCarrusel', $contenidoCarrusel);
        $result->bindParam(':idioma', $idioma);
        $result->execute();
        return $result;
    }
    public function listarPublicacion() {
        $consulta = "SELECT * FROM publicaciones_contenido_web ORDER BY titulo ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listarPublicacionEs() {
        $consulta = "SELECT * FROM publicaciones_contenido_web where idioma='es' ORDER BY titulo ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listarPublicacionEn() {
        $consulta = "SELECT * FROM publicaciones_contenido_web WHERE idioma='en' ORDER BY titulo ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    // public function listarPublicacionCategoria($categoria) {
    //     $consulta = "SELECT * FROM publicaciones_contenido_web WHERE categoria='$categoria'";
    //     $result = $this->conexion->query($consulta);
    //     // $result->bindParam(':categoria', $g);
    //     return $result->fetchAll(PDO::FETCH_ASSOC);
    // }
    public function listarPublicacionCategoria($categoria,$idioma) {
        $consulta = "SELECT * FROM publicaciones_contenido_web WHERE categoria='$categoria' AND idioma='$idioma'";
        $result = $this->conexion->query($consulta);
        // $result->bindParam(':categoria', $g);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getUsers(){
        $consulta = "SELECT * FROM usuarios WHERE lvl=1 ORDER BY nombreUsuario ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

















    
    




   
 




    //*Función que sirve en la pagina de restaurantes, para listar los datos de los restaurantes y generarlos con una función php en base a los resultados
    public function listVendor(){
        $consulta = "SELECT * FROM vendor";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':username', $username);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //*Función que sirve , en este caso, para cargar los datos de la pagina de 1 restaurante en concreto y generarlos con una función php en base a los resultados
    public function loadVendor($RName){
        $consulta = "SELECT * FROM vendor WHERE RName=:RName";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':RName', $RName);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    //*En este caso, para cargar los comentarios (y la puntuación) de un restaurante en concreto.
    public function loadComments($RName){
        $consulta = "SELECT * FROM comments WHERE RName=:RName";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':RName', $RName);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }



    


    public function updateUser($username, $user) {

        $consulta = "UPDATE account SET  Username=:username  WHERE Username=:user" ;

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':username', $username);
        $result->bindParam(':user', $user);
        $result->execute();

        return $result;
    }


    public function Eliminacuenta($user) {


        $consulta = "DELETE FROM account WHERE Username=:user" ;

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':user', $user);
        $result->execute();


        return $result;
    }

    public function updateAccount($name, $name2, $username, $direction, $email, $number, $user) {


    $consulta = "UPDATE user SET Namee=:namee, Surname=:surname, Username=:username, Addresss=:addresss, Email=:email, PNumber=:PNumber WHERE Username=:user" ;

    $result = $this->conexion->prepare($consulta);
    $result->bindParam(':namee', $name);
    $result->bindParam(':surname', $name2);
    $result->bindParam(':username', $username);
    $result->bindParam(':addresss', $direction);
    $result->bindParam(':email', $email);
    $result->bindParam(':PNumber', $number);
    $result->bindParam(':user', $user);
    $result->execute();

  
    return $result;

    }


    public function inforPersonal($username) {
        $consulta = "SELECT * FROM user WHERE Username=:username";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':username', $username);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }



}
    
?>