<?php 
/**
 * Controlador encargado de mostrar la informacion de la oferta seleecionada
 */

include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';

//Si existe get con id de la oferta
if(isset($_GET['id']))
{
	//Consultamos la oferta en la BBDD y creamos nuetro objeto oferta
	$offer = ConsultOfferById($_GET['id']);
	
	//Generamos el array de provincias para mostrar la provincia seleccionada en la vista
	$provinceList = ConsultProvince();
	
	
	echo LoadLayout(
		'Informacion de la oferta',
		LoadView('infoOfferView', array('offer' => $offer, 'provinceList' => $provinceList))
	);
}
else
{
    // Error 404
   	header('location: '.ERROR_PATH.'&e=404');
}
?>