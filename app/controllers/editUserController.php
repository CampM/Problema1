<?php

/**
 * Controlador encargado de modificar un usuario
 */

include_once MODEL_PATH.'userModel.php';
include_once MODEL_PATH.'functionsDB.php';
include_once CTRL_PATH.'validations.php';

if ($_SESSION['UserInfo']->IsAdmin())
{
	$errors = array();

	$offer = new UserModel();

	if ($_POST)
	{
		$user = new UserModel($_POST["id"], $_POST["name"], $_POST["userType"], $_POST["username"], $_POST["pass"], $_POST["pass2"]);

		$errors = GetUserErrors($user);
		if (count($errors) == 0)
		{
			$isOk = ModifyUser($user);

			if ($isOk)
			{
				header('location: '.USERS_PATH);
			}
			else
			{
				header('location: '.ERROR_PATH.'&e=500.5');
			}
		}
	}
	else
	{
		if (isset($_GET['id']))
		{
			$user = ConsultUserById($_GET['id']);
			if($user == NULL)
			{
				header('location: '.ERROR_PATH.'&e=500.4');
			}
		}
	}

	echo LoadLayout(
		'Edicion de un usuario', 
		LoadView('editUserView', array('user' => $user, 'errors' => $errors))
	);
}
else
{
	header('location: '.ERROR_PATH.'&e=500.3');
}

?>