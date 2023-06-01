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

    //FUNCIONES QUE LLEVAN A LAS PAGINAS ESPECIFICAS
    public function inicio() {      
        $menu=$this->cargaMenu();
        //var_dump($menu);
        $m = new Erutan();
        $m->insertaVisitas();
        
        $params = array(
            'posts' => $m->listarPublicacion(),
        );

        require __DIR__ . '/../../web/pages/inicio.php';
    }
    public function salir() {
        session_destroy();
        header ("location:index.php?ctl=inicio");
    }
    public function error() {   
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/error.php';
    }
    public function paginaRegistro() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/formRegistro.php';
    }
    public function aboutPage() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/about.php';
    }
    public function cookiesPage() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/cookies.php';
    }
    public function privacidadPage() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/privacidad.php';
    }
    public function communityPage() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/community.php';
    }
    public function paginaFaq() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/faqs.php';
    }
    public function paginaAnimales() {      
        $menu=$this->cargaMenu();
        try {
            $m = new Erutan();
            $categoria="animales";
            $params = array(
                'posts' => $m->listarPublicacionCategoria($categoria),
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
        require __DIR__ . '/../../web/pages/animales.php';
    }
    public function paginaPeople() {      
        $menu=$this->cargaMenu();
        try {
            $m = new Erutan();
            $categoria="people";
            $params = array(
                'posts' => $m->listarPublicacionCategoria($categoria),
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
    public function paginaCiencia() {      
        $menu=$this->cargaMenu();
        try {
            $m = new Erutan();
            $params = array(
                'posts' => $m->listarPublicacion(),
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
        require __DIR__ . '/../../web/pages/ciencia.php';
    }
    public function paginaForo() {
        try {
            if (! isset($_SESSION['idUser'])) {
                throw new Exception('Página no encontrada.');
            }
            $idPost = recoge('idPost');
            $m = new Erutan();
            // $params['posts'] = $m->verPublicacion($idPost);
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/paginaForo.php';
    }
    public function posts() {      
        $menu=$this->cargaMenu();
        try {
            $m = new Erutan();
            $params = array(
                'posts' => $m->listarPublicacion(),
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
        require __DIR__ . '/../../web/pages/posts.php';
    }
    public function paginaPost() {
        try {
            if (! isset($_GET['idPost'])) {
                throw new Exception('Página no encontrada.');
            }
            $idPost = recoge('idPost');
            $m = new Erutan();
            $params['posts'] = $m->verPublicacion($idPost);
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

         $menu=$this->cargaMenu();
         
        require __DIR__ . '/../../web/pages/post.php';
    }
    public function paginaRanking() {
        try {
            $m = new Erutan();
            $params['newsletter'] = $m->verRanking();
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

         $menu=$this->cargaMenu();
         
        require __DIR__ . '/../../web/pages/ranking.php';
    }
    public function datosPersonales() {
        try {
            if (! isset($_GET['idUser'])) {
                throw new Exception('Página no encontrada.');
            }
            $idUser = recoge('idUser');
            $m = new Erutan();
            $params['user'] = $m->verUsuario($idUser);
         
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/informacionPersonal.php';
    }

    //PAGINAS EXCLUSIVAS PARA EL ADMINISTRADOR
    public function paginaDashboard() {

        $menu=$this->cargaMenu();
        $m = new Erutan();
      
        $datos= $m->visitasXfecha();
        $registros= $m->registrosXfecha();
        $visitasDashboard= $m->visitasTotales();
        $usersDashboard= $m->usuariosTotales();
        $newsletterDashboard= $m->newsletterTotales();
        $postsDashboard= $m->publicacionesTotales();
        
        require __DIR__ . '/../../web/pages/paginaDashboard.php';
    }
    public function paginaContenido() {

        $menu=$this->cargaMenu();
        try {
            $m = new Erutan();
            $params = array(
                'posts' => $m->listarPublicacion(),
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
    public function paginaUsers() {

        $menu=$this->cargaMenu();
        try {
            $m = new Erutan();
            $params = array(
                'usuarios' => $m->getUsers(),
            );
            if (! $params['usuarios'])
                $params['mensaje'] = "No hay usuarios que mostrar.";           
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../../web/pages/paginaUsers.php';
    }

    //QUESTION CARD
    public function desactivarQuestion() {
        if($_SESSION['nivel_usuario']==0){
            header ("location:index.php?ctl=inicio");
        }else{      
        $menu=$this->cargaMenu();
        $_SESSION['questionCard']="false";
        header ("location:index.php?ctl=inicio");
        }
    }
    public function insertarPuntos() {

        if($_SESSION['nivel_usuario']==0){
            header ("location:index.php?ctl=inicio");
        }else{   

        $menu=$this->cargaMenu();
        try {
            $_SESSION['questionCard']="false";
            $id_usuario=$_SESSION["idUser"];
            $puntos=1;
            $m = new Erutan();
            $m->insertarPuntos($id_usuario,$puntos);
         
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        header ("location:index.php?ctl=inicio");
        }
    }

    //FUNCION DE REGISTRO E INICIO SESIÓN
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
                if ($m->insertarUsuario($nombreCompleto, $usuario, $email, $telefono, $pais, $ciudad, encriptar($contrasenya))) {
                    //$menu="menuInvitado.php";
                    $id_usuario = array(
                        $m->consultarIdUsuario($usuario),
                    );
                    $id_usuario=$id_usuario[0]["idUser"];
                    $m->insertarToken($tokenUsuario,$id_usuario,$caducidad);

                    require __DIR__ . '/../../app/mailer/mailerToken.php';
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
            $idUsuario=$token[0]['idUsuario'];
            $tokenCaducidad=$token[0]['caducidad'];            
            $tiempo=time();

            if ($tokenUsuario == $tokenFinal && $tiempo<$tokenCaducidad){
                $m = new Erutan();
                $m->verificarToken($idUsuario);
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
                            $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'];
                            $_SESSION['fotoPerfil'] = $usuario['fotoPerfil'] ;
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
   
        // 
        if($_SESSION['nivel_usuario']>1){
            header('Location: index.php?ctl=paginaDashboard');
        }else{
            header('Location: index.php?ctl=inicio');
        }
        // require __DIR__ . '/../../web/pages/inicio.php';
    }
    
    //FUNCIONES PARA LA PAGINA DE USUARIOS - PERFIL USUARIO
    public function actualizarUsuario(){
        $errores=array();
        $idUser=( $_SESSION['idUser']);
        try{
            if (isset($_POST['bSubir'])){
                
                $nombreCompleto = recoge('nombreCompleto');
                $phone=recoge('phone');
                $username=recoge('username');
                $email=recoge('email');
                $ciudad=recoge('ciudad');
                $pais=recoge('pais');

                if (empty($errores)) {

                    $m = new Erutan();
                    if ($m->actualizarUsuario($idUser, $nombreCompleto,$phone,$username,$email,$ciudad,$pais)) {
                        header('Location: index.php');
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
    public function actualizarImgUsuario(){
        
        $errores=array();
        $extensiones=["jpg","png","webp"];
        $directorio="../app/img/users";
        $tamanyo=200000;
        try{
            if (isset($_POST['bSubir'])){
                    
                    $idUser=( $_SESSION['idUser']);
                    $imagen =cFile("fotoPerfil",$errores,$extensiones,$directorio,$tamanyo,true);
                    $_SESSION['fotoPerfil']=$imagen;
                    $m = new Erutan();
                    if ($m->actualizarImagenUsuario($idUser,$imagen)) {
                        header('Location: index.php');
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
    public function actualizarPasswordUsuario(){
        
        $errores=array();
        $idUser=( $_SESSION['idUser']);
        $newPassword = recoge ('newPassword');
        try{
            if (isset($_POST['bSubir'])){
                    
                if (empty($errores)) {

                    $m = new Erutan();
                    if ($m->actualizarPasswordUsuario($idUser,encriptar($newPassword))) {
                        header('Location: index.php');
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
    public function borrarUsuario(){
        try {

            if (! isset($_GET['idUser'])) {
                throw new Exception('Página no encontrada.');
            }
            $idUser = recoge('idUser');
            $m = new Erutan();
            $m->borrarUsuario($idUser);      
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu=$this->cargaMenu();
        header('Location: index.php?ctl=paginaUsers');
    }

    //FUNCIONES RELACIONADAS A LAS NEWSLETTER
    public function paginaRegitradosNewsletter() {
        try {
            $m = new Erutan();
            $params = array(
                'newsletter' => $m->listarRegistradosNewsletter(),
            );
            if (! $params['newsletter'])
                $params['mensaje'] = "No hay mensajes de newsletter que mostrar.";           
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/paginaRegistradosNewsletter.php';      

    }
    public function subscribir(){
        try{
            $errores=array();
            if (isset($_POST['bSubir'])) {
                $email = recoge('email');
                $nombre = recoge('nombre');
                $phone = recoge('phone');
                cEmail($email, "email", $errores);
                // cTexto($nombre, "nombre", $errores);
                if (empty($errores)) {
                    $m = new Erutan();
                    if ($m->insertarEmailToNewsletter($email, $nombre, $phone)) {
                        require __DIR__ . '/../../app/mailer/mailerBienvenidaNewsletter.php';
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
                'newsletter' => $m->listarNewsletter(),
            );
            if (! $params['newsletter'])
                $params['mensaje'] = "No hay mensajes de newsletter que mostrar.";           
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
    public function editarNewsletter() {    
        try {
            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idNewsletter = recoge('idTitulo');
            $m = new Erutan();
            $params['newsletter'] = $m->verNewsletterB($idNewsletter);
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/editFormNewsletter.php';
    }
    public function crearNewsletter(){
        
        $errores=array();
        $extensiones=["jpg","png","webp"];
        $directorio="../app/img/img-newsletter";
        $tamanyo=200000;
        try{
            if (isset($_POST['bSubir'])){
              
                $titulo = recoge('titulo');
                $asunto=recoge('asunto');
                $mensaje=$_REQUEST['mensaje'];
                // $mensaje=recoge('mensaje');
                
                echo "si";

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

    public function borrarNewsletter(){
        try {

            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idNewsletter = recoge('idTitulo');
            $m = new Erutan();
            $m->borrarNewsletter($idNewsletter);      
               
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

    public function enviarNewsletter(){
        try {

            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idNewsletter = recoge('idTitulo');
            $m = new Erutan();
            if($params['noticias'] = $m->verNewsletterB($idNewsletter)){
                $allEmails=$m-> listarEmails();
                
                require __DIR__ . '/../../app/mailer/mailerNewsletter.php';
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
    public function verNewsletter() {
        try {
            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idNewsletter = recoge('idTitulo');
            $m = new Erutan();
            $params['newsletter'] = $m->verNewsletterB($idNewsletter);
               
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
    public function actualizarNewsletter(){
    
        $errores=array();

        try{
            if (isset($_POST['bSubir'])){
              
                $titulo = recoge('titulo');
                $asunto=recoge('asunto');
                $mensaje=$_REQUEST['mensaje'];
                // $mensaje=recoge('mensaje');
            
                if (empty($errores)) {

                    $m = new Erutan();
                    if ($m->actualizarNewsletter($titulo,$asunto,$mensaje)) {
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
    public function actualizarImgNewsletter(){
        
        $errores=array();
        $extensiones=["jpg","png","webp"];
        $directorio="../app/img/img-newsletter";
        $tamanyo=200000;
        try{
            if (isset($_POST['bSubir'])){
                    
                    $titulo = recoge('titulo');
                    $imagen =cFile("multimediaPost",$errores,$extensiones,$directorio,$tamanyo,true);
                    $m = new Erutan();
                    if ($m->actualizarImagenNewsletter($titulo,$imagen)) {
                        header('Location: index.php?ctl=paginaNewsletter');
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
    
    //FUNCIONES RELACIONADAS A LAS PUBLICACIONES
    public function crearPost(){
        
        $errores=array();
        $extensiones=["jpg","png","webp"];
        $directorio="../app/img/img-posts";
        $tamanyo=200000;
        try{
            if (isset($_POST['bSubir'])){
              
                $titulo = recoge('titulo');
                $tituloPost = recoge('tituloPost');
                $contenidoCard=recoge('contenidoCard');
                // $contenidoPost=recoge('contenidoPost');
                $contenidoPost=$_REQUEST['contenidoPost'];
                $categoria=recoge('categoria');
                $contenidoCarrusel=recoge('contenidoCarrusel');

                if (empty($errores)) {

                    $imagen =cFile("multimediaPost",$errores,$extensiones,$directorio,$tamanyo,true);
                    // var_dump($imagen);

                    $m = new Erutan();
                    if ($m->insertarPublicacion($titulo,$tituloPost,$contenidoCard,$contenidoPost,$categoria,$imagen,$contenidoCarrusel)) {
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
    public function borrarPublicacion(){
        try {

            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idPost = recoge('idTitulo');
            $m = new Erutan();
            $m->borrarPublicacion($idPost);      
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        $menu=$this->cargaMenu();
        header('Location: index.php?ctl=paginaContenido');
    }
    public function verPublicacion() {
        try {
            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idPost = recoge('idTitulo');
            $m = new Erutan();
            $params['post'] = $m->verPublicacion($idPost);
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        $menu=$this->cargaMenu(); 
        require __DIR__ . '/../../web/pages/verPublicacion.php';
    }
    public function actualizarImgPost(){
        
        $errores=array();
        $extensiones=["jpg","png","webp"];
        $directorio="../app/img/img-posts";
        $tamanyo=200000;
        try{
            if (isset($_POST['bSubir'])){
                    
                    $titulo = recoge('titulo');
                    $imagen =cFile("multimediaPost",$errores,$extensiones,$directorio,$tamanyo,true);
                    $m = new Erutan();
                    if ($m->actualizarImagenPublicacion($titulo,$imagen)) {
                        header('Location: index.php?ctl=paginaContenido');
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
    public function actualizarPost(){
        
        $errores=array();

        try{
            if (isset($_POST['bSubir'])){

                $titulo = recoge('titulo');
                $tituloPost = recoge('tituloPost');
                $contenidoCard=recoge('contenidoCard');
                $contenidoPost=$_REQUEST['contenidoPost'];
                $categoria=recoge('categoria');  
                $contenidoCarrusel=recoge('contenidoCarrusel');                

                if (empty($errores)) {

                    $m = new Erutan();
                    if ($m->actualizarPublicacion($titulo,$tituloPost,$contenidoCard,$contenidoPost,$categoria,$contenidoCarrusel)) {
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
    public function editarPublicacion() {    
        try {
            if (! isset($_GET['idTitulo'])) {
                throw new Exception('Página no encontrada.');
            }
            $idPost = recoge('idTitulo');
            $m = new Erutan();
            $params['post'] = $m->verPublicacion($idPost);
               
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/editFormPost.php';
    }
    public function formPost() {      
        $menu=$this->cargaMenu();
        require __DIR__ . '/../../web/pages/formPost.php';
    }


}
?>