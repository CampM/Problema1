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
		$isOk = InsertOffer($offer);
		if ($isOk){
			//Reedireccion del navegador
			header('location: '.INDEX_PATH);
			
		}
	}
	else
	{
		//Creamos el array de provincias para el selec de edicion
		$provinceList = ConsultProvince();//CAMBIAR DESPUES
	}

}
//En caso de no existir formulario 
else
{
	//Creamos un objeto oferta con el valor de los campos vacios
	$offer = new OfferModel();

	//Preparar selectOfertas
	$provinceList = ConsultProvince();//CAMBIAR DESPUES
}

//Cargamos la vista de edicion
echo LoadLayout(
	'Añadir nueva oferta', 
	LoadView('editOfferView', array('offer' => $offer, 'provinceList' => $provinceList, 'errors' => $errors))
);

?>