<?php 
include_once './models/offerModel.php';
include_once './models/functionsDB.php';

function DeleteOffer($offerId){

	include './views/deleteOfferView.php';
}

function ConfirmDeleteOffer($offerId){

	$isOk = DeleteOfferById($offerId);

	if ($isOk){

		//Reedireccion del navegador
		header('location: ../index.php');
	}
}

?>