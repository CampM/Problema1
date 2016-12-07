<?php 
/**
 * Controlador frontal
 */

include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';
include_once CTRL_PATH.'validations.php';
	
if ($_SESSION['UserInfo']->IsAdmin())
{

	$errors = array();

	//Creamos un objeto oferta con el valor de los campos vacios
	$offer = new OfferModel();
	//Si existe formulario previo
	if ($_POST)
	{
		$offer = new OfferModel($_POST["id"], $_POST["description"], $_POST["contact"], $_POST["contactTLF"], $_POST["contactMail"], $_POST["address"], $_POST["assentament"], $_POST["postCode"], $_POST["province"], $_POST["state"], null, $_POST["dateComunication"], $_POST["psicologist"], $_POST["candidate"], $_POST["notes"]);

		$errors = GetOfferErrors($offer);
		//Si se detectan errores en los campos del formulario
		if (count($errors) == 0)
		{
			$isOk = InsertOffer($offer);

			if ($isOk){
				//Reedireccion del navegador
				header('location: '.INDEX_PATH);
				
			}
			else
			{
				header('location: '.ERROR_PATH.'&e=500.2');
			}
		}
	}

	//Preparar selectOfertas
	$provinceList = ConsultProvince();
	//Cargamos la vista de edicion
	echo LoadLayout(
		'Añadir nueva oferta', 
		LoadView('editOfferView', array('offer' => $offer, 'provinceList' => $provinceList, 'errors' => $errors))
	);
}
else
{
   // Error No Permisos
	header('location: '.ERROR_PATH.'&e=500.3');
}

?>