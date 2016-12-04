<?php 
include_once './models/offerModel.php';
include_once './models/functionsDB.php';

function AddOffer(){

	$offer = new OfferModel();
	include './views/editOfferView.php';
}

function EditOffer($offerId){

	$offer = ConsultOfferById($offerId);
	include './views/editOfferView.php';
}

function SaveOffer(){

	$offer = new OfferModel($_POST["id"], $_POST["description"], $_POST["contact"], $_POST["contactTLF"], $_POST["contactMail"], $_POST["address"], $_POST["assentament"], $_POST["postCode"], $_POST["province"], $_POST["state"], $_POST["dateCreation"], $_POST["dateComunication"], $_POST["psicologist"], $_POST["candidate"], $_POST["notes"]);

	if((! $offer->id) || ($offer->id == '')){
		$isOk = InsertOffer($offer);
		if ($isOk){

			//Reedireccion del navegador
			header('location: ../index.php');
		}
	}
	else
	{
		$isOk = ModifyOffer($offer);
		if ($isOk){

			//Reedireccion del navegador
			header('location: ../index.php');
		}
	}
}

?>