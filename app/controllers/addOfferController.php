<?php 
/**
 * Controlador encargado de añadir ofertas
 */

include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';
include_once CTRL_PATH.'validations.php';
	
if ($_SESSION['UserInfo']->IsAdmin())
{

	$errors = array();

	$offer = new OfferModel();
	if ($_POST)
	{
		$offer = new OfferModel($_POST["id"], $_POST["description"], $_POST["contact"], $_POST["contactTLF"], $_POST["contactMail"], $_POST["address"], $_POST["assentament"], $_POST["postCode"], $_POST["province"], $_POST["state"], null, $_POST["dateComunication"], $_POST["psicologist"], $_POST["candidate"], $_POST["notes"]);

		$errors = GetOfferErrors($offer);
		if (count($errors) == 0)
		{
			$isOk = InsertOffer($offer);

			if ($isOk){
				header('location: '.INDEX_PATH);
				
			}
			else
			{
				header('location: '.ERROR_PATH.'&e=500.2');
			}
		}
	}

	$provinceList = ConsultProvince();
	echo LoadLayout(
		'Añadir nueva oferta', 
		LoadView('editOfferView', array('offer' => $offer, 'provinceList' => $provinceList, 'errors' => $errors))
	);
}
else
{
	header('location: '.ERROR_PATH.'&e=500.3');
}

?>