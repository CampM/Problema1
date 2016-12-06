<?php
/**
 * Controlador encargado de borrar una oferta
 */

include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';

//Comprobamos que se entre bajo un usuario administrador
if ($_SESSION['UserInfo']->IsAdmin())
{
	//Si existe get[id]
	if(isset($_GET['id']))
	{
		//Si existe confirmacion de borrado
		if(isset($_GET['confirm']))
		{
			$isOk = DeleteOfferById($_GET['id']);

			//Si se borro correctamente
			if ($isOk){
				//Reedireccion del navegador
				header('location: '.INDEX_PATH);
			}
			else
			{
				header('location: '.ERROR_PATH.'&e=500.1');
			}
		}
		else
		{
			$offer = ConsultOfferById($_GET['id']);

			if($offer == NULL)
			{
				header('location: '.ERROR_PATH.'&e=500.1');
			}
			else
			{
				$provinceList = ConsultProvince();
			
				echo LoadLayout(
				'Borrar oferta',
				LoadView('deleteOfferView', array('offer' => $offer, 'provinceList' => $provinceList)));
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