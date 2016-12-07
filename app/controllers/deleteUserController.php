<?php
/**
 * Controlador encargado de borrar un usuario
 */

include_once MODEL_PATH.'userModel.php';
include_once MODEL_PATH.'functionsDB.php';

if ($_SESSION['UserInfo']->IsAdmin())
{
	if(isset($_GET['id']))
	{
		if ($_GET['id'] < 0)
		{
   			header('location: '.ERROR_PATH.'&e=500.6');
		}
		else
		{
			if(isset($_GET['confirm']))
			{
				$isOk = DeleteUserById($_GET['id']);

				if ($isOk){
					header('location: '.USERS_PATH);
				}
				else
				{
					header('location: '.ERROR_PATH.'&e=500.4');
				}
			}
			else
			{
				$user = ConsultUserById($_GET['id']);

				if($user == NULL)
				{
					header('location: '.ERROR_PATH.'&e=500.4');
				}
				else
				{
					echo LoadLayout(
					'Borrar usuario',
					LoadView('deleteUserView', array('user' => $user)));
				}
			}
		}
	}
	else
	{
	   header('location: '.ERROR_PATH.'&e=404');
	}
}
else
{
   header('location: '.ERROR_PATH.'&e=500.3');
}
?>