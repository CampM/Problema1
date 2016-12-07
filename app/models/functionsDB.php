<?php 
/**
 * Funciones para trabajar con la capa de abstraccion de base de datos
 */

include_once MODEL_PATH.'DataBaseProvider.php';
include_once MODEL_PATH.'OfferModel.php';
include_once MODEL_PATH.'UserModel.php';
include_once HELPERS_PATH.'format.php';
include_once CTRL_PATH.'validations.php';



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
function ConsultAllOffer($offerSetting){

	$pageSize = $GLOBALS['pageSize'];
	$pageShow = $GLOBALS['pageShow'];

	$conditionSql = GetOfferCondition($offerSetting['filterPage']);

	$db = DataBaseProvider::getInstance();

	$resCount = $db->Consulta('select count(*) as total from offer ' . $conditionSql);
	$countReg = $db->LeeRegistro($resCount);

	$total = $countReg['total'];

	$skipElements = $offerSetting['currentPage'] * $pageSize;
	
	$orderSql = GetOfferOrderSQL($offerSetting['orderPage']);

	$sql = 'select * from offer ' . $conditionSql . $orderSql . ' limit '.$skipElements.','.$pageSize;

	$result = $db->Consulta($sql);

	$offerList = array(); 

	while ($reg = $db->LeeRegistro())
	{
		$offer = ConvertToOffer($reg);

		//Añadir la oferta a la lista de ofertas a mostrar
		array_push($offerList, $offer);

	}

	$lastPage = ceil($total / $pageSize) - 1;

	$prevPage = $offerSetting['currentPage'] - 1;
	if ($prevPage < 0){
		$prevPage = 0;
	}
	$nextPage = $offerSetting['currentPage'] + 1;
	if ($nextPage > $lastPage){
		$nextPage = $lastPage;
	}

	$pageFirstShow = $offerSetting['currentPage'] - $pageShow;
	if ($pageFirstShow < 0){
		$pageFirstShow = 0;
	}
	$pageLastShow = $offerSetting['currentPage'] + $pageShow;
	if ($pageLastShow > $lastPage){
		$pageLastShow = $lastPage;
	}

	$result = array(
		'list' => $offerList,
		'total' => $total,
		'prevPage' => $prevPage,
		'currentPage' => $offerSetting['currentPage'],
		'nextPage' => $nextPage,
		'lastPage' => $lastPage,
		'pageFirstShow' => $pageFirstShow,
		'pageLastShow' => $pageLastShow,
		'orderPage' => $offerSetting['orderPage'],
		'filterPage' => $offerSetting['filterPage'],
	);

	return $result;
}

/**
 * Devuelve todos los registros de usuarios de la base de datos
 */
function ConsultAllUser($userSetting){

	$pageSize = $GLOBALS['pageSize'];
	$pageShow = $GLOBALS['pageShow'];

	$db = DataBaseProvider::getInstance();

	$resCount = $db->Consulta('select count(*) as total from user');
	$countReg = $db->LeeRegistro($resCount);

	$total = $countReg['total'];

	$skipElements = $userSetting['currentPage'] * $pageSize;
	
	$sql = 'select * from user limit '.$skipElements.','.$pageSize;

	$result = $db->Consulta($sql);

	$userList = array(); 

	while ($reg = $db->LeeRegistro())
	{
		$user = ConvertToUser($reg);

		array_push($userList, $user);

	}

	$lastPage = ceil($total / $pageSize) - 1;

	$prevPage = $userSetting['currentPage'] - 1;
	if ($prevPage < 0){
		$prevPage = 0;
	}
	$nextPage = $userSetting['currentPage'] + 1;
	if ($nextPage > $lastPage){
		$nextPage = $lastPage;
	}

	$pageFirstShow = $userSetting['currentPage'] - $pageShow;
	if ($pageFirstShow < 0){
		$pageFirstShow = 0;
	}
	$pageLastShow = $userSetting['currentPage'] + $pageShow;
	if ($pageLastShow > $lastPage){
		$pageLastShow = $lastPage;
	}

	$result = array(
		'list' => $userList,
		'total' => $total,
		'prevPage' => $prevPage,
		'currentPage' => $userSetting['currentPage'],
		'nextPage' => $nextPage,
		'lastPage' => $lastPage,
		'pageFirstShow' => $pageFirstShow,
		'pageLastShow' => $pageLastShow,
	);

	return $result;
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
 * Inserta el registro de un usuario y devuelve si fue opsible hacerlo
 *
 * @param mixed $result
 */
function InsertUser($user){
	$userArray = ConvertUserToSql($user);

	$db = DataBaseProvider::getInstance();
	$isOk = $db->Insertar('user', $userArray);
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
 * Modifica el registro de un usuario y devuelve si fue opsible hacerlo
 * @param unknown $user
 * @return boolean
 */
function ModifyUser($user){
	$userArray = ConvertUserToSql($user);

	$db = DataBaseProvider::getInstance();
	$isOk = $db->Modificar('user', $userArray, 'Id = '.$user->id.'');
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
 * Elimina el registro de un usuario y devuelve si fue opsible hacerlo
 * @param unknown $userId
 * @return boolean
 */
function DeleteUserById($userId){

	$db = DataBaseProvider::getInstance();
	$isOk = $db->Eliminar('user', 'Id = '.$userId.'');
	return $isOk;
}

/**
 * Devuelve el registro completo de una oferta en base a su id si es posible o null sino existe
 * @param unknown $offerId
 * @return NULL|OfferModel
 */
function ConsultOfferById($offerId){
	$db = DataBaseProvider::getInstance();
	$reg = $db->LeeUnRegistro('offer', 'Id = '.$offerId.'');

	$offer = NULL;

	if ($reg != NULL){
		$offer = ConvertToOffer($reg);
	}

	return $offer;
}

/**
 * Devuelve el registro completo de un usuario en base a su id si es posible o null sino existe
 * @param unknown $userId
 * @return NULL|user
 */
function ConsultUserById($userId){
	$db = DataBaseProvider::getInstance();
	$reg = $db->LeeUnRegistro('user', 'Id = '.$userId.'');

	$user = NULL;

	if ($reg != NULL){
		$user = ConvertToUser($reg);
	}

	return $user;
}

/**
 * Devuelve la lista de provincias
 */
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

		array_push($provinceList, $province);

	}

	return $provinceList;

}

/**
 * Convierte los datos de un registro en una oferta y la devuelve
 * @param unknown $reg
 * @return OfferModel
 */
function ConvertToOffer($reg)
{
	$dateCreation = ConvertToSpanishDate($reg['DateCreation']);
	$dateComunication = ConvertToSpanishDate($reg['DateComunication']);

	$offer = new OfferModel($reg['Id'], $reg['Description'], $reg['Contact'], $reg['ContactTLF'], $reg['ContactMail'], $reg['Address'], $reg['Assentament'], $reg['PostCode'], $reg['Province'], $reg['State'], $dateCreation, $dateComunication, $reg['Psicologist'], $reg['Candidate'], $reg['Notes']);

	return $offer;

}

/**
 * Convierte los datos de una oferta a formato array para realizar un registro y lo devuelve 
 * @param unknown $offer
 * @return NULL[]
 */
function ConvertOfferToSql($offer){

	$offerArray = array(
		'State' => $offer->state,
		'Candidate' => $offer->candidate,
		'Notes' => $offer->notes
	);

	if ($_SESSION['UserInfo']->IsAdmin())
	{
		$offerArray = array(
			'Description' => $offer->description,
			'Contact' => $offer->contact,
			'ContactTLF' => $offer->contactTLF,
			'ContactMail' => $offer->contactMail,
			'Address' => $offer->address,
			'Assentament' => $offer->assentament,
			'PostCode' => $offer->postCode,
			'Province' => $offer->province,
			'DateComunication' => ConvertToBBDDDate($offer->dateComunication),
			'Psicologist' => $offer->psicologist,
			'State' => $offer->state,
			'Candidate' => $offer->candidate,
			'Notes' => $offer->notes
		);
	}

	return $offerArray;
}

/**
 * Convierte los datos de un usuario a formato array para realizar un registro y lo devuelve 
 * @param unknown $user
 * @return NULL[]
 */
function ConvertUserToSql($user){

	$userArray = array(
		'Name' => $user->name,
		'Username' => $user->username,
		'UserType' => $user->userType,
		'Pass' => $user->pass,
	);

	return $userArray;
}


/**
 * Devuelve los datos de registro de un usuario convertidos segun el modelo de usuario
 * @param unknown $reg
 * @return UserModel
 */
function ConvertToUser($reg){
	$user = new UserModel($reg['Id'], $reg['Name'], $reg['UserType'], $reg['Username'], $reg['Pass'], $reg['Pass']);

	return $user;
}

/**
 * Devuelve los datos de filtrado para la busqueda de ofertas, devolviendo siempre en primer lugar la fecha de creacion 
 */
function GetOfferOrderSQL($orderColumn){

	$order = 'DateCreation';

	switch ($orderColumn) {
		case 'dateCreation':
			$order = 'DateCreation';
			break;
		case 'description':
			$order = 'Description';
			break;
		case 'contact':
			$order = 'Contact';
			break;
		default:
			$order = 'DateCreation';
			break;
	}

	return ' order by ' . $order . ' ';
}

/**
 * Devuelve condiciones de comparacion para el filtrado de busqueda en la lista de ofertas
 * @return string
 */
function GetOfferCondition($filters){

	$condition = ' where 1 = 1 ';

	if (($filters['dateCreation'] != null) && ($filters['dateCreation'] != '') && ValidateDate($filters['dateCreation']))
	{
		$dateFormated = ConvertToBBDDDate($filters['dateCreation']);
		switch ($filters['dateType']) {
			case 'greater':
				$condition = $condition . ' AND DateCreation > "' . addslashes($dateFormated) . '"';
				break;
			case 'lesser':
				$condition = $condition . ' AND DateCreation < "' . addslashes($dateFormated) . '"';
				break;
			default:
				$condition = $condition . ' AND DateCreation = "' . addslashes($dateFormated) . '"';
				break;
		}
	}
	if (($filters['desc'] != null) && ($filters['desc'] != ''))
	{
		if ($filters['descType'] == 'equal')
		{
			$condition = $condition . ' AND Description = "' . addslashes($filters['desc']) . '"';
		}
		else
		{
			$condition = $condition . ' AND Description like "%' . addslashes($filters['desc']) . '%"';
		}
	}
	if (($filters['state'] != null) && ($filters['state'] != ''))
	{
		if ($filters['stateType'] == 'distinct')
		{
			$condition = $condition . ' AND State <> ' . addslashes($filters['state']);
		}
		else
		{
			$condition = $condition . ' AND State = ' . addslashes($filters['state']);
		}
	}

	return $condition . ' ';
}

?>