<?php

/**
 * Controlador encargado de modificar una oferta
 * En funcion del tipo de usuario cargara una vista para los distintos tipos de usuario
 */

include_once MODEL_PATH.'userModel.php';
include_once MODEL_PATH.'functionsDB.php';
include_once CTRL_PATH.'validations.php';

if ($_SESSION['UserInfo']->IsAdmin())
{
	$errors = array();

	//Creamos un objeto oferta con el valor de los campos vacios
	$offer = new UserModel();

	//Si existe formulario previo
	if ($_POST)
	{
		$user = new UserModel($_POST["id"], $_POST["name"], $_POST["userType"], $_POST["username"], $_POST["pass"], $_POST["pass2"]);

		$errors = GetUserErrors($user);
		//Si se detectan errores en los campos del formulario
		if (count($errors) == 0)
		{
			$isOk = ModifyUser($user);

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
	//En caso de no existir formulario 
	else
	{
		//Si existe get[id]
		if (isset($_GET['id']))
		{
			//Creamos un objeto oferta en funcion a la id
			$user = ConsultUserById($_GET['id']);
			if($user == NULL)
			{
				header('location: '.ERROR_PATH.'&e=500.4');
			}
		}
	}

	//Cargamos la vista en funcion al tipo de usuario, controlado segun la variable "$editView"
	echo LoadLayout(
		'Edicion de un usuario', 
		LoadView('editUserView', array('user' => $user, 'errors' => $errors))
	);
}
else
{
   // Error No Permisos
	header('location: '.ERROR_PATH.'&e=500.3');
}

?>