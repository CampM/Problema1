<?php 
/**
 * Controlador frontal
 */

include_once MODEL_PATH.'userModel.php';
include_once MODEL_PATH.'functionsDB.php';
include_once CTRL_PATH.'validations.php';

if ($_SESSION['UserInfo']->IsAdmin())
{

	$errors = array();

	//Creamos un objeto oferta con el valor de los campos vacios
	$user = new UserModel();
	//Si existe formulario previo
	if ($_POST)
	{
		$user = new UserModel($_POST["id"], $_POST["name"], $_POST["userType"], $_POST["username"], $_POST["pass"], $_POST["pass2"]);

		$errors = GetUserErrors($user);
		//Si se detectan errores en los campos del formulario
		if (count($errors) == 0)
		{
			$isOk = InsertUser($user);

			if ($isOk)
			{
				//Reedireccion del navegador
				header('location: '.USERS_PATH);
			}
			else
			{
				header('location: '.ERROR_PATH.'&e=500.5');
			}
		}
	}

	//Cargamos la vista de edicion
	echo LoadLayout(
		'Añadir nueva oferta', 
		LoadView('editUserView', array('user' => $user, 'errors' => $errors))
	);
}
else
{
   // Error No Permisos
	header('location: '.ERROR_PATH.'&e=500.3');
}

?>