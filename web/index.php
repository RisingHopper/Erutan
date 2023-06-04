<?php
require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';
require_once __DIR__ . '/../app/libs/bSeguridad.php';
require_once __DIR__ . '/../app/modelo/classModelo.php';
require_once __DIR__ . '/../app/modelo/classErutan.php';
require_once __DIR__ . '/../app/controller/Controller.php';

session_start(); // Se inicia la sesion
//Este logueado o no el usuario, siempre tendra un nivel_usuario

if (! isset($_SESSION['lang'])) { 
    $_SESSION['lang'] = "en";
}

if (! isset($_SESSION['nivel_usuario'])) { 
    $_SESSION['nivel_usuario'] = 0;
}

if(! isset($_SESSION['questionCard'])){
    $_SESSION["questionCard"]="true";
}

/**
 * Enrutamiento
 * Le añadimos el nivel mínimo que tiene que tener el usuario para ejecutar la acción
 **/
$map = array(

    /*ACCIONES BÁSICAS*/
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio', 'nivel_usuario'=>0),
    'salir' => array('controller' =>'Controller', 'action' =>'salir', 'nivel_usuario'=>0),
    'error' => array('controller' =>'Controller', 'action' =>'error', 'nivel_usuario'=>0),
    //PAGINAS ESTATICAS
    'privacidadPage' => array('controller' =>'Controller', 'action' =>'privacidadPage', 'nivel_usuario'=>0),
    'aboutPage' => array('controller' =>'Controller', 'action' =>'aboutPage', 'nivel_usuario'=>0),
    'cookiesPage' => array('controller' =>'Controller', 'action' =>'cookiesPage', 'nivel_usuario'=>0),
    'paginaFaq' => array('controller' =>'Controller', 'action' =>'paginaFaq', 'nivel_usuario'=>0),
    'posts' => array('controller' =>'Controller', 'action' =>'posts', 'nivel_usuario'=>0),
    'paginaPost' => array('controller' =>'Controller', 'action' =>'paginaPost', 'nivel_usuario'=>0),
    'paginaAnimales' => array('controller' =>'Controller', 'action' =>'paginaAnimales', 'nivel_usuario'=>0),
    'paginaPeople' => array('controller' =>'Controller', 'action' =>'paginaPeople', 'nivel_usuario'=>0),
    'paginaCiencia' => array('controller' =>'Controller', 'action' =>'paginaCiencia', 'nivel_usuario'=>0),
    'communityPage' => array('controller' =>'Controller', 'action' =>'communityPage', 'nivel_usuario'=>0),
    //REGISTRO E INICIO SESION
    'paginaRegistro' => array('controller' => 'Controller', 'action' =>'paginaRegistro', 'nivel_usuario'=>0),
    'registro' => array('controller' =>'Controller', 'action' =>'registro', 'nivel_usuario'=>0),
    'verificarCuenta' => array('controller' =>'Controller', 'action' =>'verificarCuenta', 'nivel_usuario'=>0),
    'iniciarSesion' => array('controller' =>'Controller', 'action' =>'iniciarSesion', 'nivel_usuario'=>0),
    //PAGINAS EXCLUSIVAS USERS
    'datosPersonales' => array('controller' => 'Controller', 'action' =>'datosPersonales', 'nivel_usuario'=>1),
    'paginaRanking' => array('controller' =>'Controller', 'action' =>'paginaRanking', 'nivel_usuario'=>1),
    'paginaForo' => array('controller' =>'Controller', 'action' =>'paginaForo', 'nivel_usuario'=>1),
    //USERS
    'actualizarUsuario' => array('controller' => 'Controller', 'action' =>'actualizarUsuario', 'nivel_usuario'=>1),
    'actualizarImgUsuario' => array('controller' => 'Controller', 'action' =>'actualizarImgUsuario', 'nivel_usuario'=>1),
    'actualizarPasswordUsuario' => array('controller' => 'Controller', 'action' =>'actualizarPasswordUsuario', 'nivel_usuario'=>1),
    'insertarPuntos' => array('controller' =>'Controller', 'action' =>'insertarPuntos', 'nivel_usuario'=>0),
    'desactivarQuestion' => array('controller' =>'Controller', 'action' =>'desactivarQuestion', 'nivel_usuario'=>0),
    // NEWSLETTER
    'subscribir'=> array('controller' => 'Controller', 'action' =>'subscribir', 'nivel_usuario'=>0),
    'paginaNewsletter' => array('controller' => 'Controller', 'action' =>'paginaNewsletter', 'nivel_usuario'=>2),
    'formNewsletter' => array('controller' =>'Controller', 'action' =>'formNewsletter', 'nivel_usuario'=>2),
    'crearNewsletter'=> array('controller' => 'Controller', 'action' =>'crearNewsletter', 'nivel_usuario'=>2),
    'verNewsletter' => array('controller' =>'Controller', 'action' =>'verNewsletter', 'nivel_usuario'=>2),
    'editarNewsletter' => array('controller' =>'Controller', 'action' =>'editarNewsletter', 'nivel_usuario'=>2),
    'actualizarNewsletter' => array('controller' =>'Controller', 'action' =>'actualizarNewsletter', 'nivel_usuario'=>2),
    'enviarNewsletter' => array('controller' =>'Controller', 'action' =>'enviarNewsletter', 'nivel_usuario'=>2),
    'borrarNewsletter' => array('controller' =>'Controller', 'action' =>'borrarNewsletter', 'nivel_usuario'=>2),
    'actualizarImgNewsletter' => array('controller' => 'Controller', 'action' =>'actualizarImgNewsletter', 'nivel_usuario'=>2),
    //PUBLICACIONES
    'paginaContenido' => array('controller' => 'Controller', 'action' =>'paginaContenido', 'nivel_usuario'=>2),
    'formPost' => array('controller' =>'Controller', 'action' =>'formPost', 'nivel_usuario'=>2),
    'crearPost' => array('controller' =>'Controller', 'action' =>'crearPost', 'nivel_usuario'=>2),
    'actualizarImgPost' => array('controller' => 'Controller', 'action' =>'actualizarImgPost', 'nivel_usuario'=>2),
    'actualizarPost' => array('controller' =>'Controller', 'action' =>'actualizarPost', 'nivel_usuario'=>2),
    'borrarPublicacion' => array('controller' =>'Controller', 'action' =>'borrarPublicacion', 'nivel_usuario'=>2),
    'editarPublicacion' => array('controller' =>'Controller', 'action' =>'editarPublicacion', 'nivel_usuario'=>2),
    'verPublicacion' => array('controller' =>'Controller', 'action' =>'verPublicacion', 'nivel_usuario'=>2),
    // DASHBOARD
    'paginaDashboard' => array('controller' => 'Controller', 'action' =>'paginaDashboard', 'nivel_usuario'=>2),
    // OTRAS PAGINAS EXCLUSIVAS ADMIN
    'paginaUsers' => array('controller' =>'Controller', 'action' =>'paginaUsers', 'nivel_usuario'=>2),
    'paginaRegitradosNewsletter' => array('controller' => 'Controller', 'action' =>'paginaRegitradosNewsletter', 'nivel_usuario'=>2),
    'borrarUsuario' => array('controller' => 'Controller', 'action' =>'borrarUsuario', 'nivel_usuario'=>2)



 
    // 'quienesSomos' => array('controller' => 'Controller', 'action' =>'quienesSomos', 'nivel_usuario'=>0),
    // 'politicaPrivacidad' => array('controller' => 'Controller', 'action' => 'politicaPrivacidad', 'nivel_usuario'=>0),
    // 'usoCookies' => array('controller' => 'Controller', 'action' =>'usoCookies', 'nivel_usuario'=>0),
    // 'informacionPersonal' => array('controller' => 'Controller', 'action' =>'informacionPersonal', 'nivel_usuario'=>1),
    // 'listarDatos' => array('controller' => 'Controller', 'action' =>'listarDatos', 'nivel_usuario'=>1),
    // 'actualizaDatos' => array('controller' => 'Controller', 'action' =>'actualizaDatos', 'nivel_usuario'=>1),
    // 'eliminaCuenta' => array('controller' => 'Controller', 'action' =>'eliminaCuenta', 'nivel_usuario'=>1),
    // 'preguntasFrecuentes' => array('controller' => 'Controller', 'action' =>'preguntasFrecuentes', 'nivel_usuario'=>0),
    // 'restaurantes' => array('controller' => 'Controller', 'action' =>'restaurantes', 'nivel_usuario'=>0),
    // 'paginaRestaurantesxD' => array('controller' =>'Controller', 'action' =>'paginaRestaurantesxD', 'nivel_usuario'=>0)
);

// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        // header('Status: 404 Not Found');
        // echo '<html><body><h1>Error 404: No existe la ruta <i>' .
        //     $_GET['ctl'] .'</p></body></html>';
            header("Location: pages/error404_page.php",TRUE,301);
            exit;
            /*
             * También podríamos poner $ruta=error; y mostraríamos una pantalla de error
             */
    }
} else {
    $ruta = 'inicio';
}
$controlador = $map[$ruta];
/* 
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, 
si es así ejecutamos el método correspondiente.
En caso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariamos tambien 
si el usuario tiene permiso suficiente para ejecutar esa acción
*/

if (method_exists($controlador['controller'],$controlador['action'])) {
    if ($controlador['nivel_usuario'] <= $_SESSION['nivel_usuario']) {
        call_user_func(array(new $controlador['controller'],
            $controlador['action']));
    }
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
}

?>