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
    public function consultarUsuario($nombreUsuario) {
        $consulta = "SELECT * FROM usuarios WHERE nombreUsuario=:nombreUsuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function insertarToken($token,$usuario,$caducidad){
        $consulta="INSERT INTO token (token,usuario,caducidad) VALUES (:token, :usuario, :caducidad)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':token', $token);
        $result->bindParam(':usuario', $usuario);
        $result->bindParam(':caducidad', $caducidad);
        $result->execute();
        return $result;
    }
    public function seleccionarToken($tokenUsuario) {
        $consulta = "SELECT * FROM token WHERE token=:tokenUsuario";        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':tokenUsuario', $tokenUsuario);
        $result->execute();    
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verificarToken($idUsuario){
        $consulta="UPDATE usuarios SET verificado=1 where nombreUsuario=:nombreUsuario";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreUsuario', $idUsuario);
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
    public function insertarEmailToNewsletter($email,$name){
        $consulta="INSERT INTO email (email,nombre) VALUES (:email, :nombre)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':email', $email);
        $result->bindParam(':nombre', $name);
        $result->execute();
        return $result;
    }
    public function crearMensajeNewsletter($titulo, $asunto,$mensaje,$imagen){
        $consulta="INSERT INTO newsletter (titulo,asunto,mensaje,imagen) VALUES (:titulo, :asunto, :mensaje, :imagen)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':asunto', $asunto);
        $result->bindParam(':mensaje', $mensaje);
        $result->bindParam(':imagen', $imagen);
        $result->execute();
        return $result;
    }
    public function listarNoticias() {
        $consulta = "SELECT * FROM newsletter ORDER BY titulo ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verNewsletterB($idNoticia) {
        $consulta = "SELECT * FROM newsletter WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $idNoticia);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function borrarNewsletter($idNoticia) {
        $consulta = "DELETE FROM newsletter WHERE titulo=:titulo";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $idNoticia);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function listarEmails() {
        $consulta = "SELECT email FROM email";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // FUNCIONES ASOCIADAS A DASHBOARD
    public function insertaVisitas(){
        $consulta="INSERT INTO visitas (contador) VALUES (contador+1)";
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
    public function visitasTotales(){
        $consulta="SELECT dateSend, SUM(contador) FROM visitas GROUP BY dateSend";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function usuariosTotales(){
        $consulta="SELECT *, COUNT(*) FROM usuarios";
        $result = $this->conexion->prepare($consulta);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    //FUNCIONES ASOCIADAS A CONTENIDO
    public function insertarPost($titulo, $tituloPost, $textoCard, $contenido,$categoria,$imagen){
        $consulta="INSERT INTO posts (titulo, tituloPost, textoCard,contenido,categoria,imagen) VALUES (:titulo, :tituloPost, :textoCard,:contenido, :categoria, :imagen)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':tituloPost', $tituloPost);
        $result->bindParam(':textoCard', $textoCard);
        $result->bindParam(':contenido', $contenido);
        $result->bindParam(':categoria', $categoria);
        $result->bindParam(':imagen', $imagen);
        $result->execute();
        return $result;
    }
    public function listarPosts() {
        $consulta = "SELECT * FROM posts ORDER BY titulo ASC";
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