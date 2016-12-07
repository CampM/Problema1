<?php 
/**
 * Controlador encargado de mostrar la informacion de la oferta seleecionada
 */

include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';

if(isset($_GET['id']))
{
	$offer = ConsultOfferById($_GET['id']);
	
	$provinceList = ConsultProvince();
	
	
	echo LoadLayout(
		'Informacion de la oferta',
		LoadView('infoOfferView', array('offer' => $offer, 'provinceList' => $provinceList))
	);
}
else
{
   	header('location: '.ERROR_PATH.'&e=404');
}
?>