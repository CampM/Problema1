<?php
/**
 * Controlador encargado de borrar una oferta
 */

include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';

if ($_SESSION['UserInfo']->IsAdmin())
{
	if(isset($_GET['id']))
	{
		if(isset($_GET['confirm']))
		{
			$isOk = DeleteOfferById($_GET['id']);

			if ($isOk){
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
	   header('location: '.ERROR_PATH.'&e=404');
	}
}
else
{
   header('location: '.ERROR_PATH.'&e=500.3');
}
?>