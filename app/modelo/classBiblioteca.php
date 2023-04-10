<?php

class Biblioteca extends Modelo {

    //Parte Joel

    public function insertarEmailToNewsletter($email,$date){
        $consulta="INSERT INTO email (email,fecha) VALUES (:email, :fecha)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':email', $email);
        $result->bindParam(':fecha', $date);
        $result->execute();
        return $result;
    }
    public function crearMensajeNewsletter($titulo, $asunto,$mensaje,$imagen, $fecha){
        $consulta="INSERT INTO noticias (titulo,asunto,mensaje,imagen,fecha) VALUES (:titulo, :asunto, :mensaje, :imagen, :fecha)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':asunto', $asunto);
        $result->bindParam(':mensaje', $mensaje);
        $result->bindParam(':imagen', $imagen);
        $result->bindParam(':fecha', $fecha);
        $result->execute();
        return $result;
    }
    public function listarNoticias() {
        $consulta = "SELECT * FROM noticias ORDER BY titulo ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verNewsletterB($idNoticia) {
        $consulta = "SELECT * FROM noticias WHERE titulo=:titulo";
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
        $consulta="UPDATE user SET verificado=1 where Username=:username";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':username', $idUsuario);
        $result->execute();
        return $result;
    }





    //Parte de Carlos
    //*Función empleada en el inicio de sesión, realiza la petición y devuelve los datos del
    //usuario pedido
    public function login($username) {
        $consulta = "SELECT * FROM account WHERE username=:username";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':username', $username);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
    //*Función empleada en registro. Su uso esta usado de forma general en ambos tipos de formularios para registrar solo el usuario y la contraseña
    //(el nivel se pone por defecto a 1 en la base de datos)
    public function insertAccount($username, $password) {
        $consulta = "INSERT INTO account (`Username`, `Passwd`) VALUES (:username, :passwd)";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':username', $username);
        $result->bindParam(':passwd', $password);
        $result->execute();

        return $result;
    }
 
    //*Función empleada solo en caso de usuario corriente; recoge todos los datos correspondientes
    // y los inserta en la tabla de usuarios
    public function insertUser($username, $Email, $name, $surname, $PCode, $Address, $Location, $PNumber) {
        $consulta = "INSERT INTO user (`Username`,`Email`,`Namee`, `Surname`, `PCode`, `Addresss`, `Locationn`, `PNumber`) 
        VALUES (:username, :email ,:namee, :surname, :PCode, :addresss, :locationn, :PNumber )";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':username', $username);
        $result->bindParam(':email', $Email);
        $result->bindParam(':namee', $name);
        $result->bindParam(':surname', $surname);
        $result->bindParam(':PCode', $PCode);
        $result->bindParam(':addresss', $Address);
        $result->bindParam(':locationn', $Location);
        $result->bindParam(':PNumber', $PNumber);
        $result->execute();

        return $result;
    }

    //*Función empleada solo en caso de restaruante (vendor: proveedor), donde recoge los datos del
    // formulario modificado y los inserta en la tabla de proveedores
    public function insertVendor($username,$Email, $PCode, $Address, $Location, $RName, $PNumber) {
        $consulta = "INSERT INTO user (`Username`,`Email`,`PCode`, `Addresss`, `Locationn`, `RName`, `PNumber`)
        VALUES (:username,:Email, :PCode, :addresss, :locationn, :RName, :PNumber)";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':username', $username);
        $result->bindParam(':Email', $Email);
        $result->bindParam(':PCode', $PCode);
        $result->bindParam(':addresss', $Address);
        $result->bindParam(':locationn', $Location);
        $result->bindParam(':RName', $RName);
        $result->bindParam(':PNumber', $PNumber);
        $result->execute();

        return $result;

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



    






//Parte Francisco



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