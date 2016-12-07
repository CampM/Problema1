<?php

// definimos constantes que facilitan el trabajo
define('SITE', 'http://localhost/Problema1/app/');
define('INDEX_PATH', SITE.'index.php');
define('CONFIG_PATH', __DIR__.'/config.php');
//define('ERROR_PATH', SITE.'index.php?'.CTRL_VAR.'='.CTRL_ERROR);

define('CTRL_PATH', __DIR__.'/controllers/');
define('MODEL_PATH', __DIR__.'/models/');
define('VIEW_PATH', __DIR__.'/views/');
define('VIEW_TEMPLATE_PATH', VIEW_PATH.'templates/');
//define('TEMPLATE_PATH', __DIR__.'/plantilla/');
//define('LIB_PATH', __DIR__.'/lib/');
define('HELPERS_PATH', __DIR__.'/helpers/');

// Usamos constantes por comodidad
DEFINE('CTRL_VAR', 'c');
DEFINE('CTRL_HOME', '1');
DEFINE('CTRL_ADD', '2');
DEFINE('CTRL_EDIT', '3');
DEFINE('CTRL_INFO', '4');
DEFINE('CTRL_DELETE', '5');
DEFINE('CTRL_CLOSE', '6');
DEFINE('CTRL_ERROR', '7');
DEFINE('CTRL_USERS', '8');
DEFINE('CTRL_ADD_USER', '9');
DEFINE('CTRL_EDIT_USER', '10');
DEFINE('CTRL_DELETE_USER', '11');
define('ERROR_PATH', SITE.'index.php?'.CTRL_VAR.'='.CTRL_ERROR);  
define('USERS_PATH', SITE.'index.php?'.CTRL_VAR.'='.CTRL_USERS);


$actionMap=array(
    CTRL_HOME=>'listOfferController',
    CTRL_ADD=>'addOfferController',
    CTRL_EDIT=>'editOfferController',
    CTRL_INFO=>'infoOfferController',
    CTRL_DELETE=>'deleteOfferController',
    CTRL_CLOSE=>'closeSessionController',
    CTRL_ERROR=>'errorController',
    CTRL_USERS=>'listUserController',
    CTRL_ADD_USER=>'addUserController',
    CTRL_EDIT_USER=>'editUserController',
    CTRL_DELETE_USER=>'deleteUserController',
);
      
// Cuerpo del controlador frontal
include_once CONFIG_PATH;
include_once MODEL_PATH.'functionsDB.php';
include_once HELPERS_PATH.'views.php';


session_start();

//control de usuarios
if (isset($_SESSION['UserInfo'])){
    $action = isset($_GET[CTRL_VAR]) ? $_GET[CTRL_VAR] : CTRL_HOME;
    if (isset($actionMap[$action]))
    {
        // Nombre del fichero a incluir
        $ctrl_file=CTRL_PATH.$actionMap[$action].'.php';

        if (file_exists($ctrl_file))
        {
            include($ctrl_file);
            
        }
        else
        {   
            header('location: '.ERROR_PATH.'&e=404');
           echo LoadLayout('Página no encontrada', 'Error 404: Pagina no encontrada');
        }
    }
    else 
    {
        header('location: '.ERROR_PATH.'&e=404');
        // Error 404
       echo LoadLayout('Página no encontrada', 'Error 404: Pagina no encontrada');
    }
}
else
{
    include(CTRL_PATH.'loginController.php');
}