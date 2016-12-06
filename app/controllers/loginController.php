<?php
/**
 * Controlador encargado de gestionar el login de usuario
 */

include_once MODEL_PATH.'functionsDB.php';

$error = '';

//Si existe post con usuari y contraseña
if (isset($_POST['user']) && isset($_POST['pass'])){
	
	//Comrpobamos que exista en la base de datos
    $model = DoLogin($_POST['user'], $_POST['pass']);
	
    //Si existe el usuario con contraseña dada
	if ($model != NULL){
		//Se inicia la sesion para ese usuario
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