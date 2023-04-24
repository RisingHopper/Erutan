<?php

class Controller {

    /*Función que carga el menu correspondiente al nivel del usuario*/
    private function cargaMenu (){
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'components/menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'components/menuUser.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'components/menuAdmin.php';
        }
    }
    /*Funciones cuyo fin es llevar al usuario a una página específica*/
    public function error() {   
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/error.php';
    }
    public function salir() {
        session_destroy();
        header ("location:index.php?ctl=inicio");
    }
    public function inicio() {      
        $menu=$this->cargaMenu();
        //var_dump($menu);
        $m = new Erutan();
        $m->insertaVisitas();

        require __DIR__ . '/../../web/pages/inicio.php';
    }
    public function paginaRegistro() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/formRegistro.php';
    }

    public function people() {      
        $menu=$this->cargaMenu();
        try {
            $m = new Erutan();
            $params = array(
                'posts' => $m->listarPosts(),
            );
            if (! $params['posts'])
                $params['mensaje'] = "No hay posts que mostrar.";           
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        require __DIR__ . '/../../web/pages/people.php';
    }

    public function paginaContenido() {

        $menu=$this->cargaMenu();
        try {
            $m = new Erutan();
            $params = array(
                'posts' => $m->listarPosts(),
            );
            if (! $params['posts'])
                $params['mensaje'] = "No hay posts que mostrar.";           
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        require __DIR__ . '/../../web/pages/paginaContenido.php';
    }
    
    public function paginaDashboard() {

        $menu=$this->cargaMenu();
        $m = new Erutan();
      
        $datos= $m->visitasTotales();
        $usersDashboard= $m->usuariosTotales();
        

        require __DIR__ . '/../../web/pages/paginaDashboard.php';
    }
    /*Funcion que registra a los usuarios en la base de datos y ademas, se les envia un email con un token,
    para verificar su cuenta*/
    public function registro() {
        if ($_SESSION['nivel_usuario'] >0) {
            header("location:index.php?ctl=inicio");
        }

        $errores=array();

        if (isset($_POST['bRegistro'])) {
            $nombreCompleto = recoge('nombreCompleto');
            $usuario = recoge('usuario');
            $email= recoge('email');
            $telefono= recoge('telefono');
            $pais = recoge('pais');
            $ciudad = recoge('ciudad');
            $contrasenya = recoge('contrasenya');
            $contrasenyaConfirmar = recoge('contrasenyaConfirmar');
                
            /*Recogido los datos del formulario, se procede a su validacion*/         
            // cTexto($nombreCompleto, "nombreCompleto", $errores);
            // cTexto($usuario, "usuario", $errores); 
            // cEmail($email, "email", $errores); 
            // cNum($telefono, "telefono", $errores); 
            // cTexto($pais, "pais", $errores); 
            // cTexto($ciudad, "ciudad", $errores); 
            // cTexto($contrasenya, "contrasenya", $errores);
            // cTexto($contrasenyaConfirmar, "contrasenyaConfirmar", $errores);

            if (empty($errores) && $contrasenya==$contrasenyaConfirmar){

                /* Si no hay ningun error, se procede insertar los datos en la base de datos y a generar el token*/
                try {
                
                $caducidad=time();
                $caducidad=(int)$caducidad+86400;
                $tokenUsuario=generaToken($email);

                $m = new Erutan();
                if ($m->insertarUsuario($nombreCompleto, $usuario, $email, $telefono, $pais, $ciudad, encriptar($contrasenya)) && ($m->insertarToken($tokenUsuario,$usuario,$caducidad))) {
                    //$menu="menuInvitado.php";
                    require __DIR__ . '/../../app/ejemploPHPMailerAules/ejemploPHPMailerToken.php';
                    header('Location: index.php?ctl=inicio');
                } else {
                    
                    $params = array(
                        'nombreCompleto' => $nombreCompleto,
                        'usuario' => $usuario,
                        'email' => $email,
                        'telefono' => $telefono,
                        'pais' => $pais,
                        'ciudad' => $ciudad,
                        'contrasenya' => $contrasenya,
                        'contrasenyaConfirmar' => $contrasenyaConfirmar
                    );
                    $params['mensaje'] = 'Error al insertar usuario. Revise el formulario.';
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                header('Location: index.php?ctl=error');
            }

            } else {
                
                $params = array(
                    'nombreCompleto' => $nombreCompleto,
                    'usuario' => $usuario,
                    'email' => $email,
                    'telefono' => $telefono,
                    'pais' => $pais,
                    'ciudad' => $ciudad,
                    'contrasenya' => $contrasenya,
                    'contrasenyaConfirmar' => $contrasenyaConfirmar
                );
                //var_dump($params);
                $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            }
        }
        require __DIR__ . '/../../web/pages/formRegistro.php';
    }






    public function verificarCuenta(){
        try {
            if (isset($_GET['token'])) {
                $tokenUsuario = recoge('token');
            }
            $m = new Erutan();
            $params = array(
                'tablaToken' => $m->seleccionarToken($tokenUsuario),
            );

            $token=$params['tablaToken'];
            $tokenFinal=$token[0]['token'];
            $idUsuario=$token[0]['usuario'];
            $tokenCaducidad=$token[0]['caducidad'];            
            $tiempo=time();

            if ($tokenUsuario == $tokenFinal && $tiempo<$tokenCaducidad){
                $m = new Erutan();
                $params = array(
                'tablaToken' => $m->verificarToken($idUsuario),
            );
            }

            header('Location: index.php?ctl=inicio');
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('Location: index.php?ctl=error');
        }

         $menu=$this->cargaMenu();
        
    }


    /*Función de inicio sesion*/
    public function iniciarSesion() {
        try {
            $params = array(
                'nombreUsuario' => '',
                'contrasenya' => ''
            );

        if ($_SESSION['nivel_usuario'] >0) {
            header("location:index.php?ctl=inicio");
        }
            if (isset($_POST['bIniciarSesion'])) {
                $nombreUsuario = recoge('usuario');
                $contrasenya = recoge('contrasenya');
                
                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral   
                //if (cUser($nombreUsuario, "nombreUsuario", $params)==0) {
                if (recoge("usuario")) {
                    // Si no ha habido problema creo modelo y hago inserción                    
                    $m = new Erutan();
                    if ($usuario=$m->consultarUsuario($nombreUsuario)) {
                        //print_r($usuario);
                        // Compruebo si el password es correcto
                        if (comprobarhash($contrasenya, $usuario['contrasenya'])) {
                            // Obtenemos el resto de datos
                        
                            $_SESSION['idUser'] = $usuario['idUser'];
                            $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'] ;
                            $_SESSION['nivel_usuario'] = $usuario['lvl'];  
                            if($_SESSION['nivel_usuario']>1){
                                header('Location: index.php?ctl=paginaDashboard');
                            }else
                                header('Location: index.php?ctl=inicio');
                            
                    } }else {
                        $params = array(
                            'nombreUsuario' => $nombreUsuario,
                            'contrasenya' => $contrasenya
                        );
                        $params['mensaje'] = 'No se ha podido iniciar sesión. Revisa el formulario.';
                    }
                } else {
                    
                    $params = array(
                        'nombreUsuario' => $nombreUsuario,
                        'contrasenya' => $contrasenya
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
                }
            
        }} catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../../web/pages/inicio.php';
    }
    




    /*FUNCIONES ASOCIADAS A NEWSLETTER*/

    public function subscribir(){
        try{
            $errores=array();
            if (isset($_POST['bSubir'])) {
                $email = recoge('email');
                $nombre = recoge('nombre');
                cEmail($email, "email", $errores);
                // cTexto($nombre, "nombre", $errores);
                if (empty($errores)) {
                    $m = new Erutan();
                    if ($m->insertarEmailToNewsletter($email, $nombre)) {
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

    public function paginaNewsletter() {
        try {
            $m = new Erutan();
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
        require __DIR__ . '/../../web/pages/paginaNewsletter.php';      

    }

    public function formNewsletter() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/formNewsletter.php';
    }
    public function formPost() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/formPost.php';
    }

    public function crearNewsletter(){
        
        $errores=array();
        $extensiones=["jpg","png","webp"];
        $directorio="../app/img-newsletter";
        $tamanyo=200000;
        try{
            if (isset($_POST['bSubir'])){
              
                $titulo = recoge('titulo');
                $asunto=recoge('asunto');
                $mensaje=recoge('mensaje');

                if (empty($errores)) {

                    echo"tnkl";

                    $imagen =cFile("multimedia",$errores,$extensiones,$directorio,$tamanyo,true);
                    // var_dump($imagen);

                    $m = new Erutan();
                    if ($m->crearMensajeNewsletter($titulo,$asunto,$mensaje,$imagen)) {
                        
                        header('Location: index.php?ctl=paginaNewsletter');
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

    public function verNewsletter() {
        try {
            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idNoticia = recoge('idTitulo');
            $m = new Erutan();
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
    public function enviarNewsletter(){
        try {

            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idNoticia = recoge('idTitulo');
            $m = new Erutan();
            if($params['noticias'] = $m->verNewsletterB($idNoticia)){
                $allEmails=$m-> listarEmails();
                
                require __DIR__ . '/../../app/ejemploPHPMailerAules/ejemploPHPMailer.php';
                header('Location: index.php?ctl=paginaNewsletter');
            }

        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

         $menu=$this->cargaMenu();
         
        require __DIR__ . '/../../web/pages/paginaNewsletter.php';
    }

    public function borrarNewsletter(){
        try {

            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idNoticia = recoge('idTitulo');
            $m = new Erutan();
            $m->borrarNewsletter($idNoticia);      
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu=$this->cargaMenu();
        header('Location: index.php?ctl=paginaNewsletter');
    }



    
  



    public function crearPost(){
        
        $errores=array();
        $extensiones=["jpg","png","webp"];
        $directorio="../app/img-posts";
        $tamanyo=200000;
        try{
            if (isset($_POST['bSubir'])){
              
                $titulo = recoge('titulo');
                $tituloPost = recoge('tituloPost');
                $contenidoCard=recoge('contenidoCard');
                $contenidoPost=recoge('contenidoPost');
                $categoria=recoge('categoria');

                if (empty($errores)) {

                    $imagen =cFile("multimediaPost",$errores,$extensiones,$directorio,$tamanyo,true);
                    // var_dump($imagen);

                    $m = new Erutan();
                    if ($m->insertarPost($titulo,$tituloPost,$contenidoCard,$contenidoPost,$categoria,$imagen)) {
                        
                        header('Location: index.php?ctl=paginaContenido');
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
























































    


    


    





   






















    
  









    //esta función carga los datos del restaurante seleccionado en el php de la lista de restaurantes
    public function paginaRestaurantesxD() {

        try {
            if (! isset($_GET['RName'])) {
                throw new Exception('Página no encontrada.');
            }
            $RName = recoge('RName');
            $m = new Erutan();
            $params['vendors'] = $m->loadVendor($RName);

            $n = new Erutan();
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
                    $m = new Erutan();
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