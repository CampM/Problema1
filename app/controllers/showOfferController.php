<?php 
include_once './models/offerModel.php';
include_once './models/functionsDB.php';

function ShowOffer($offerId){

	$offer = ConsultOfferById($offerId);
	include './views/showOfferView.php';
}


?>