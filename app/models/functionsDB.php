<?php 
//Modelo de abstraccion
include_once './Models/DataBaseProvider.php';
include_once './Models/OfferModel.php';
include_once './Models/UserModel.php';

function DoLogin($user, $pass){

	$sql = 'select * from user where username = "'.addslashes($user).'" and pass = "'.addslashes($pass).'"';
	$db = DataBaseProvider::getInstance();
	$result = $db->Consulta($sql);

	$model = NULL;

	if($db->Contar($result) == 1){
		$reg = $db->LeeRegistro($result);
		$model = ConvertToUser($reg);
	}
	return $model;
}

//devuelve la lista de ofertas
function ConsultAllOffer(){

	$sql = 'select * from offer';
	$db = DataBaseProvider::getInstance();
	$result = $db->Consulta($sql);

	$offerList = array(); 

	while ($reg = $db->LeeRegistro())
	{
		$offer = ConvertToOffer($reg);

		//Añadir la oferta a la lista de ofertas a mostrar
		array_push($offerList, $offer);

	}

	return $offerList;
}

function FilterAllOffer(){
	
	$condition = GetOfferCondition();
	$sql = 'select * from offer where '. $condition;
	$db = DataBaseProvider::getInstance();
	$result = $db->Consulta($sql);

	$offerList = array(); 

	while ($reg = $db->LeeRegistro())
	{
		$offer = ConvertToOffer($reg);

		//Añadir la oferta a la lista de ofertas a mostrar
		array_push($offerList, $offer);

	}

	return $offerList;
}

function InsertOffer($offer){
	$offerArray = ConvertOfferToSql($offer);

	$db = DataBaseProvider::getInstance();
	$isOk = $db->Insertar('offer', $offerArray);
	return $isOk;
}

function ModifyOffer($offer){
	$offerArray = ConvertOfferToSql($offer);

	$db = DataBaseProvider::getInstance();
	$isOk = $db->Modificar('offer', $offerArray, 'Id = '.$offer->id.'');
	return $isOk;
}

function DeleteOfferById($offerId){

	$db = DataBaseProvider::getInstance();
	$isOk = $db->Eliminar('offer', 'Id = '.$offerId.'');
	return $isOk;
}

function ConsultOfferById($offerId){
	$sql = 'select * from offer';
	$db = DataBaseProvider::getInstance();
	$reg = $db->LeeUnRegistro('offer', 'Id = '.$offerId.'');

	$offer = NULL;

	if ($reg != NULL){
		$offer = ConvertToOffer($reg);
	}

	return $offer;
}

function ConvertToOffer($reg){

	$offer = new OfferModel($reg['Id'], $reg['Description'], $reg['Contact'], $reg['ContactTLF'], $reg['ContactMail'], $reg['Address'], $reg['Assentament'], $reg['PostCode'], $reg['Province'], $reg['State'], $reg['DateCreation'], $reg['DateComunication'], $reg['Psicologist'], $reg['Candidate'], $reg['Notes']);

	return $offer;

}

function ConvertOfferToSql($offer){
	$offerArray = array(
		//'Id' => $offer->id,
		'Description' => $offer->description,
		'Contact' => $offer->contact,
		'ContactTLF' => $offer->contactTLF,
		'ContactMail' => $offer->contactMail,
		'Address' => $offer->address,
		'Assentament' => $offer->assentament,
		'PostCode' => $offer->postCode,
		'Province' => $offer->province,
		'State' => $offer->state,
		'DateCreation' => $offer->dateCreation,
		'DateComunication' => $offer->dateComunication,
		'Psicologist' => $offer->psicologist,
		'Candidate' => $offer->candidate,
		'Notes' => $offer->notes
		);

	return $offerArray;
}


function GetOfferCondition(){
	$condition = '1=1';
	if (isset($_POST['descriptionFilter'])){
		$condition = $condition . ' and Description like "%'.addslashes($_POST['descriptionFilter']).'%"';
	}

	if (isset($_POST['contactFilter'])){
		$condition = $condition . ' and Contact like "%'.addslashes($_POST['contactFilter']).'%"';
	}

	if (isset($_POST['candidateFilter'])){
		$condition = $condition . ' and Candidate like "%'.addslashes($_POST['candidateFilter']).'%"';
	}
	return $condition;
}

function ConvertToUser($reg){
	$user = new UserModel($reg['Id'], $reg['Name'], $reg['UserType'], $reg['Username'], $reg['Pass']);

	return $user;
}
?>