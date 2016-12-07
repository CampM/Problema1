<?php
/**
 * Controlador encargado de borrar una oferta
 */

include_once MODEL_PATH.'userModel.php';
include_once MODEL_PATH.'functionsDB.php';

//Comprobamos que se entre bajo un usuario administrador
if ($_SESSION['UserInfo']->IsAdmin())
{
	//Si existe get[id]
	if(isset($_GET['id']))
	{
		if ($_GET['id'] < 0)
		{
   			// Error No Permisos
   			header('location: '.ERROR_PATH.'&e=500.6');
		}
		else
		{
			//Si existe confirmacion de borrado
			if(isset($_GET['confirm']))
			{
				$isOk = DeleteUserById($_GET['id']);

				//Si se borro correctamente
				if ($isOk){
					//Reedireccion del navegador
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
		/*
	    // Error 404
	   echo LoadLayout('Página no encontrada', 'Error 404: Pagina no encontrada');*/
	   header('location: '.ERROR_PATH.'&e=404');
	}
}
else
{
   // Error No Permisos
   header('location: '.ERROR_PATH.'&e=500.3');
}
?>