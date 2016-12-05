<?php 
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
    // Error 404
   echo LoadLayout('Página no encontrada', 'Error 404: Pagina no encontrada');
}
?>