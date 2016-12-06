<?php

/**
 * Controlador encargado de modificar una oferta
 * En funcion del tipo de usuario cargara una vista para los distintos tipos de usuario
 */

include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';
include_once HELPERS_PATH.'validations.php';

$errors = array();

//Creamos un objeto oferta con el valor de los campos vacios
$offer = new OfferModel();

//Si existe formulario previo
if ($_POST)
{
	$offer = new OfferModel($_POST["id"], $_POST["description"], $_POST["contact"], $_POST["contactTLF"], $_POST["contactMail"], $_POST["address"], $_POST["assentament"], $_POST["postCode"], $_POST["province"], $_POST["state"], null, $_POST["dateComunication"], $_POST["psicologist"], $_POST["candidate"], $_POST["notes"]);

	//Filtrado de errores
	$errors = GetOfferErrors($offer);
	//Si se detectan errores en los campos del formulario
	if (count($errors) == 0)
	{
		$isOk = ModifyOffer($offer);
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
//En caso de no existir formulario 
else
{
	//Si existe get[id]
	if (isset($_GET['id']))
	{
		//Creamos un objeto oferta en funcion a la id
		$offer = ConsultOfferById($_GET['id']);
		if($offer == NULL)
		{
			header('location: '.ERROR_PATH.'&e=500.1');
		}
	}
}

//Creamos el array de provincias para el selec de edicion
$provinceList = ConsultProvince();

//Asignamos a una variable el valor para cargar la vista de psicologo
$editView = 'editOfferPsicoView';

//En caso de ser un usuario de tipo administrador, cambiamos el valor para cargar la vista de edicion del administrador
if ($_SESSION['UserInfo']->IsAdmin())
{
	$editView = 'editOfferView';
}

//Cargamos la vista en funcion al tipo de usuario, controlado segun la variable "$editView"
echo LoadLayout(
	'Edicion de una oferta', 
	LoadView($editView, array('offer' => $offer, 'provinceList' => $provinceList, 'errors' => $errors))
);

?>