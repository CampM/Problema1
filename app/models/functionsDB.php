<?php 
//Modelo de abstraccion
include_once './Models/DataBaseProvider.php';
include_once './Models/OfferModel.php';
include_once './Models/UserModel.php';


/**
 * Inicia la sesion de un usuario comprobando que tenga un registro en la base de datos
 * @param unknown $user
 * @param unknown $pass
 * @return NULL|UserModel
 */
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


/**
 * Devuelve todos los registros de ofertas de la base de datos ordenados por fecha de creacion
 */
function ConsultAllOffer(){

	$sql = 'select * from offer order by DateCreation';
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


/**
 * Devuelve condiciones para los filtrados de ofertas
 * @return string
 */
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

/**
 * Devuelve todos los registros de ofertas en la base de datos que cumplan las condiciones de filtrado
 */
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

/**
 * Inserta el registro de una oferta y devuelve si fue opsible hacerlo
 *
 * @param mixed $result
 */
function InsertOffer($offer){
	$offerArray = ConvertOfferToSql($offer);

	$db = DataBaseProvider::getInstance();
	$isOk = $db->Insertar('offer', $offerArray);
	return $isOk;
}

/**
 * Modifica el registro de una oferta y devuelve si fue opsible hacerlo
 * @param unknown $offer
 * @return boolean
 */
function ModifyOffer($offer){
	$offerArray = ConvertOfferToSql($offer);

	$db = DataBaseProvider::getInstance();
	$isOk = $db->Modificar('offer', $offerArray, 'Id = '.$offer->id.'');
	return $isOk;
}

/**
 * Elimina el registro de una oferta y devuelve si fue opsible hacerlo
 * @param unknown $offerId
 * @return boolean
 */
function DeleteOfferById($offerId){

	$db = DataBaseProvider::getInstance();
	$isOk = $db->Eliminar('offer', 'Id = '.$offerId.'');
	return $isOk;
}

/**
 * Devuelve el registro completo de una oferta en base a su id si es posible o null sino existe
 * @param unknown $offerId
 * @return NULL|OfferModel
 */
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

function ConsultProvince(){

	$sql = 'select * from tbl_provincias';
	$db = DataBaseProvider::getInstance();
	$result = $db->Consulta($sql);

	$provinceList = array(); 

	while ($reg = $db->LeeRegistro())
	{
		$province = array(
			'value' => $reg['cod'],
			'text' => $reg['nombre']
		);

		//Añadir la provincia a la lista de provincias
		array_push($provinceList, $province);

	}

	return $provinceList;

}

/**
 * Convierte los datos de un registro en una oferta y la devuelve
 * @param unknown $reg
 * @return OfferModel
 */
function ConvertToOffer($reg){

	$offer = new OfferModel($reg['Id'], $reg['Description'], $reg['Contact'], $reg['ContactTLF'], $reg['ContactMail'], $reg['Address'], $reg['Assentament'], $reg['PostCode'], $reg['Province'], $reg['State'], $reg['DateCreation'], $reg['DateComunication'], $reg['Psicologist'], $reg['Candidate'], $reg['Notes']);

	return $offer;

}

/**
 * Convierte los datos de una oferta a formato array para realizar un registro y lo devuelve 
 * @param unknown $offer
 * @return NULL[]
 */
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
		//'DateCreation' => $offer->dateCreation,
		'DateComunication' => $offer->dateComunication,
		'Psicologist' => $offer->psicologist,
		'Candidate' => $offer->candidate,
		'Notes' => $offer->notes
	);

	return $offerArray;
}


/**
 * Devuelve los datos de registro de un usuario convertidos segun el modelo de usuario
 * @param unknown $reg
 * @return UserModel
 */
function ConvertToUser($reg){
	$user = new UserModel($reg['Id'], $reg['Name'], $reg['UserType'], $reg['Username'], $reg['Pass']);

	return $user;
}
?>