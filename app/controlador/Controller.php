<?php

class Controller {

    //Método que se encarga de cargar el menu que corresponda según el tipo de usuario
    private function cargaMenu (){
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menuUser.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdmin.php';
        }

    }


    public function inicio() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/inicio.php';
    }
 
    public function categoria() {
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/categoria.php';
    }
    

    public function salir() {
        session_destroy();
        header ("location:index.php?ctl=inicio");
    }
    public function error() {   
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/error.php';
    }





  

    public function subscribir(){
        try{
            $errores=array();
            if (isset($_POST['bSubir'])) {
                $email = recoge('email');
                $date=time();
                cEmail($email, "email", $errores);
                if (empty($errores)) {
                    $m = new Biblioteca();
                   if ($m->insertarEmailToNewsletter($email, $date)) {
                        require __DIR__ . '/../../app/ejemploPHPMailerAules/ejemploPHPMailerBasico.php';
                        $_SESSION['mensaje']='Your email has been inserted correctly';
                        header('Location: index.php?ctl=inicio');
                    }
                }
            }
        }catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        $menu=$this->cargaMenu();
    }


    /*
    Cuando el administrador sube la newsletter de "crearNoticiaForm" se redirecciona a esta función que
    recoge los datos y los inserta en la bbdd con la función crearMensajeNewsletter.
    */
    
    public function crearNoticia(){
        try{
            if (isset($_POST['bSubir'])){
                $titulo = recoge('titulo');
                $asunto=recoge('asunto');
                $mensaje=recoge('mensaje');
                $imagen="efeefs";
                $fecha=1243;
                //cTexto($email, "email", $errores);
                if (empty($errores)) {
                    $m = new Biblioteca();
                   if ($m->crearMensajeNewsletter($titulo,$asunto,$mensaje,$imagen,$fecha)) {
                        
                        header('Location: index.php?ctl=listarNoticias');
                    }
                }
            }

        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        $menu=$this->cargaMenu();
    }

    /*
    Esta función se encarga de mostrar el listado de noticias.
    Se crea una instancia de Biblioteca y se invoca la función "listarNoticias" que se gurada en campo
    noticias del array.
    Finalmente se hacer un require de la página mostrar noticas donde se utiliza el array $params
    para imprimir los datos.
    */
    public function listarNoticias() {
        try {
            $m = new Biblioteca();
            $params = array(
                'noticias' => $m->listarNoticias(),
            );
            if (! $params['noticias'])
                $params['mensaje'] = "No hay noticias que mostrar.";           
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/mostrarNoticias.php';
    }

    /*
    Estando en la página mostrarNoticias.php, cuando el amdinistradoir hace click en cualquier titulo,
    se activa el controlador que redirecciona a esta funcion cuya finalidad es recoge el id (los titulos
    tienen un href que contiene un GET con el id) y luego ejecuta la funcion vernewsletter, creando así
    una página de creación de contenido de manera dinámica.
    */
    public function verNewsletter() {
        try {
            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idNoticia = recoge('idTitulo');
            $m = new Biblioteca();
            $params['noticias'] = $m->verNewsletterB($idNoticia);
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

         $menu=$this->cargaMenu();
         
        require __DIR__ . '/../../web/pages/verNewsletter.php';
    }

    /*Esta función lo que hace es recoger recoger el id y crea una instancia que ejecuta la función
    verNesletterB que es una consulta a la base de datos para obetenr los datos de la fila correspondiente
    con el id.
    Por último se hace un require del archivo mailer donde ser imprimen los datos de la consulta.
    El fichero mailer envía el correo a todos los correos que esten en la base de datos. 
    */
    public function enviarNewsletter(){
        try {
            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idNoticia = recoge('idTitulo');
            $m = new Biblioteca();
            if($params['noticias'] = $m->verNewsletterB($idNoticia)){
                $allEmails=$m-> listarEmails();
                
                require __DIR__ . '/../../app/ejemploPHPMailerAules/ejemploPHPMailer.php';
                        header('Location: index.php?ctl=listarNoticias');

            }
            
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

         $menu=$this->cargaMenu();
         
        require __DIR__ . '/../../web/pages/verNewsletter.php';
    }






    public function verificarCuenta(){
        try {
            if (isset($_GET['token'])) {
                //$token=$_GET['token'];
                $tokenUsuario = recoge('token');
                //print_r($tokenUsuario);
            }
            $m = new Biblioteca();
            $params = array(
                'tablaToken' => $m->seleccionarToken($tokenUsuario),
            );


            //$token=$params['tablaToken'][0]['token'];


            $token=$params['tablaToken'];
            $tokenFinal=$token[0]['token'];
            $idUsuario=$token[0]['usuario'];
            $tokenCaducidad=$token[0]['caducidad'];
            //print_r($token);
            
            $tiempo=time();
            //&& $tiempo<$tokenCaducidad


            if ($tokenUsuario == $tokenFinal && $tiempo<$tokenCaducidad){
                $m = new Biblioteca();
                $params = array(
                'tablaToken' => $m->verificarToken($idUsuario),
            );
                
            }
            header('Location: index.php?ctl=categoria');
            
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

         $menu=$this->cargaMenu();
        
    }



    
  





    //Parte de Carlos y Francisco   



   

    //Función dedicada a la creación de un usuario en la base de datos VIA formulario, discriminando a su vez, si este es una empresa o un usuario corriente.  
    public function registro()
    {
        $menu = 'menuInvitado.php';

        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }

        $checked = recoge('empresa');

        
        if (isset($_POST['bRegistro'])) {

            if ($checked == "") {

                $params = array(
                    'username' => '',
                    'password' => '',
                    'name' => '',
                    'surname' => '',
                    'email' => '',
                    'PCode' => '',
                    'address' => '',
                    'location' => '',
                    'PNumber' => '',
                    'DBirth' => '',
                );

                $errores = array();


                $username = recoge('username');
                $password = recoge('password');
                $name = recoge('name');
                $surname = recoge('surname');
                $email = recoge('email');
                $PCode = recoge('PCode');
                $address = recoge('address');
                $location = recoge('location');
                $PNumber = recoge('PNumber');
                $DBirth = recoge('DBirth');


                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral o la clase Validacion         
                cUser($username, "username", $errores);
                cUser($password, "password", $errores);
                cTexto($name, "name", $errores);
                cTexto($surname, "surname", $errores);
                cEmail($email, "email", $errores);
                cNum($PCode, "PCode", $errores);
                cTexto($address, "address", $errores);
                cTexto($location, "location", $errores);
                cNum($PNumber, "PNumber", $errores);
                unixFechaAAAAMMDD($DBirth, "DBirth",$errores);

                print_r($errores);
                print_r($DBirth);

                if (empty($errores)) {
                    // Si no ha habido problema creo modelo y hago inserció 
                    
                    try {
                        //Joel
                        $caducidad=time();
                        $caducidad=(int)$caducidad+86400;
                        $tokenUsuario=generaToken($email);
                        //$m -> insertarToken($token,$usuario,$caducidad);


                        $m = new Biblioteca();
                        
                        
                        if (($m->insertAccount($username, encriptar($password))) && ($m->insertUser($username, $email, $name, $surname, $PCode, $address, $location, $PNumber, $DBirth)) && ($m->insertarToken($tokenUsuario,$username,$caducidad))) {
                            require __DIR__ . '/../../app/ejemploPHPMailerAules/ejemploPHPMailerToken.php';
                            header('Location: index.php?ctl=iniciarSesion');
                        } else {

                            $params = array(
                                'username' => $username,
                                'password' => $password,
                                'name' => $name,
                                'surname' => $surname,
                                'email' => $email,
                                'PCode' => $PCode,
                                'address' => $address,
                                'location' => $location,
                                'PNumber' => $PNumber,
                                'DBirth' => $DBirth,
                            );

                            $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                        }
                    } catch (Exception $e) {
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
                        header('Location: index.php?ctl=error');
                    } catch (Error $e) {
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
                        header('Location: index.php?ctl=error');
                    }
                } else {

                    $params = array(
                        'username' => $username,
                        'password' => $password,
                        'name' => $name,
                        'surname' => $surname,
                        'email' => $email,
                        'PCode' => $PCode,
                        'address' => $address,
                        'location' => $location,
                        'PNumber' => $PNumber,
                        'DBirth' => $DBirth,
                    );

                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
                }
            } else {

                $params = array(

                    'username' => '',
                    'password' => '',
                    'RName' => '',
                    'email' => '',
                    'PCode' => '',
                    'address' => '',
                    'location' => '',
                    'PNumber' => '',
                );

                $errores = array();

                $username = recoge('username');
                $password = recoge('password');
                $RName = recoge('RName');
                $email = recoge('email');
                $PCode = recoge('PCode');
                $address = recoge('address');
                $location = recoge('location');
                $PNumber = recoge('PNumber');

                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral o la clase Validacion     

                cUser($username, "username", $errores);
                cUser($password, "password", $errores);
                cTexto($RName, "nameE", $errores);
                cEmail($email, "email", $errores);
                cNum($PCode, "PCode", $errores);
                cTexto($address, "address", $errores);
                cTexto($location, "location", $errores);
                cNum($PNumber, "PNumber", $errores);

                print_r($errores);


                if (empty($errores)) {
                    // Si no ha habido problema creo modelo y hago inserció

                    try {

                        //Joel
                        $caducidad=time();
                        $caducidad=(int)$caducidad+86400;
                        $tokenUsuario=generaToken($email);
                        //$m -> insertarToken($token,$usuario,$caducidad)

                        $m = new Biblioteca();



                        if (($m->insertAccount($username, encriptar($password))) && ($m->insertVendor($username, $email, $PCode, $address, $location, $RName, $PNumber)) && ($m->insertarToken($tokenUsuario,$username,$caducidad))) {

                            
                            header('Location: index.php?ctl=iniciarSesion');
                            
                        } else {

                            $params = array(

                                'username' => $username,
                                'password' => $password,
                                'RName' => $RName,
                                'email' => $email,
                                'PCode' => $PCode,
                                'address' => $address,
                                'location' => $location,
                                'PNumber' => $PNumber,
                            );

                            $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                        }
                    } catch (Exception $e) {
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
                        header('Location: index.php?ctl=error');
                    } catch (Error $e) {
                        error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
                        header('Location: index.php?ctl=error');
                    }
                } else {
                    $params = array(

                        'username' => $username,
                        'password' => $password,
                        'RName' => $RName,
                        'email' => $email,
                        'PCode' => $PCode,
                        'address' => $address,
                        'location' => $location,
                        'PNumber' => $PNumber,
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
                }
            }
        }



        require __DIR__ . '/../../web/pages/formRegistro.php';
    }




    //esta función carga los datos del restaurante seleccionado en el php de la lista de restaurantes
    public function paginaRestaurantesxD() {

        try {
            if (! isset($_GET['RName'])) {
                throw new Exception('Página no encontrada.');
            }
            $RName = recoge('RName');
            $m = new Biblioteca();
            $params['vendors'] = $m->loadVendor($RName);

            $n = new Biblioteca();
            $params['comments'] = $n->loadComments($RName);

            print_r ($params['vendors']);

            
            $ratio = 0;
            $loop = 0;

            foreach ($params['comments'] as $comments){
                $ratio += $comments['Rate'];
                $loop++;
            }
            $totalRatio = $ratio / $loop;
                       
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/paginaRestaurantesxD.php';
    }












    public function actualizaDatos() {
        try {
            
            $menu = 'menuUser.php';
        print_r( $_SESSION['idUser']);
      
            if (isset($_POST['bcambiar'])) { // Nombre del boton del formulario
                $nombre = recoge('name');
                $apellido = recoge('name2');
                $nombreUsuario = recoge('username');
                $direccion= recoge('direction');
                $email = recoge('email');
                $numero = recoge('number');

                $errores = array();

                cUser($nombreUsuario, "username", $errores);
                cTexto($nombre, "name", $errores);
                cTexto($apellido, "name2", $errores);
                cEmail($email, "email", $errores);
                cTexto($direccion, "direction", $errores);
                cNum($numero, "number", $errores);

                print_r($apellido);
                print_r($errores);
                
               
                //print_r($nombreUsuario);
                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral   
                if (empty($errores)) {
                    // Si no ha habido problema creo modelo y hago inserción                    
                    $m = new Biblioteca();
                    if ($m->updateUser($nombreUsuario,$_SESSION['idUser']) && $m->updateAccount($nombre, $apellido, $nombreUsuario, $direccion,$email,$numero, $_SESSION['idUser'])) {
                        $_SESSION['idUser'] = $nombreUsuario;
                        header('Location: index.php?ctl=informacionPersonal');
                    } else {
                       
                        $params['mensaje'] = 'No se ha podido insertar el alimento. Revisa el formulario.';
                    }
                } else {
                   
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }
        
        $menu=$this->cargaMenu();

        require __DIR__ . '/../../web/pages/informacionPersonal.php';
    
    
    
    }
   
        


   

}
?>