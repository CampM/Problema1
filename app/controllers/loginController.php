<?php
/**
 * Controlador encargado de gestionar el login de usuario
 */

include_once MODEL_PATH.'functionsDB.php';

$error = '';

if (isset($_POST['user']) && isset($_POST['pass'])){
	
    $model = DoLogin($_POST['user'], $_POST['pass']);
	
	if ($model != NULL){
		$_SESSION['UserInfo'] = $model;
		header('location: '.$_SERVER['REQUEST_URI']);
	}
	else
	{
		$error = 'Usuario o contraseña incorrectos.';
		echo LoadView('loginView', array('error' => $error));
	}

}
else
{
	echo LoadView('loginView', array('error' => $error));
}

?>