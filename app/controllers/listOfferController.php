<?php 
include_once './models/functionsDB.php';

function OfferList(){

	$offerList = ConsultAllOffer();

	include './views/listOfferView.php';
}

function FilterOfferList(){

	$offerList = FilterAllOffer();

	include './views/listOfferView.php';
}

?>