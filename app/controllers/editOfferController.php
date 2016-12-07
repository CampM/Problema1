<?php

/**
 * Controlador encargado de modificar una oferta
 * En funcion del tipo de usuario cargara una vista para los distintos tipos de usuario
 */

include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';
include_once CTRL_PATH.'validations.php';

$errors = array();

$offer = new OfferModel();

if ($_POST)
{
	$offer = new OfferModel($_POST["id"], $_POST["description"], $_POST["contact"], $_POST["contactTLF"], $_POST["contactMail"], $_POST["address"], $_POST["assentament"], $_POST["postCode"], $_POST["province"], $_POST["state"], null, $_POST["dateComunication"], $_POST["psicologist"], $_POST["candidate"], $_POST["notes"]);

	$errors = GetOfferErrors($offer);
	if (count($errors) == 0)
	{
		$isOk = ModifyOffer($offer);
		if ($isOk){
			header('location: '.INDEX_PATH);
		}
		else
		{
			header('location: '.ERROR_PATH.'&e=500.2');
		}
	}
}
else
{
	if (isset($_GET['id']))
	{
		$offer = ConsultOfferById($_GET['id']);
		if($offer == NULL)
		{
			header('location: '.ERROR_PATH.'&e=500.1');
		}
	}
}

$provinceList = ConsultProvince();

$editView = 'editOfferPsicoView';

if ($_SESSION['UserInfo']->IsAdmin())
{
	$editView = 'editOfferView';
}

echo LoadLayout(
	'Edicion de una oferta', 
	LoadView($editView, array('offer' => $offer, 'provinceList' => $provinceList, 'errors' => $errors))
);

?>