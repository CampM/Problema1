<?php 

include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';

$errors = array();

//Si existe formulario previo
if ($_POST)
{
	$offer = new OfferModel($_POST["id"], $_POST["description"], $_POST["contact"], $_POST["contactTLF"], $_POST["contactMail"], $_POST["address"], $_POST["assentament"], $_POST["postCode"], $_POST["province"], $_POST["state"], $_POST["dateCreation"], $_POST["dateComunication"], $_POST["psicologist"], $_POST["candidate"], $_POST["notes"]);

	$errors = $offer->GetErrors();
	//Si se detectan errores en los campos del formulario
	if (count($errors) == 0)
	{
		//Comprobar si se inserta o si se modifica la oferta en funcion de si existe id
		if((! $offer->id) || ($offer->id == '')){
			$isOk = InsertOffer($offer);
			if ($isOk){
				//Reedireccion del navegador
				header('location: '.INDEX_PATH);
			}
		}
		else
		{
			$isOk = ModifyOffer($offer);
			if ($isOk){
				//Reedireccion del navegador
				header('location: '.INDEX_PATH);
			}
		}
	}
	else
	{
		//Creamos el array de provincias para el selec de edicion
		$provinceList = ConsultProvince();
	}

}
//En caso de no existir formulario 
else
{
	//Si existe get[id] (Por modificacion de oferta)
	if (isset($_GET['id']))
	{
		//Creamos un objeto oferta en funcion a la id
		$offer = ConsultOfferById($_GET['id']);
	}
	else
	{
		//Creamos un objeto oferta con el valor de los campos vacios
		$offer = new OfferModel();
	}

	$provinceList = ConsultProvince();
}

//Cargamos la vista de edicion
echo LoadLayout(
	'Edicion de una oferta', 
	LoadView('editOfferView', array('offer' => $offer, 'provinceList' => $provinceList, 'errors' => $errors))
);

?>