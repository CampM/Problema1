<?php 
/**
 * Controlador encargado de la lista de ofertas
 */
include_once MODEL_PATH.'functionsDB.php';

if (!isset($_SESSION['offerSetting'])){
    $_SESSION['offerSetting'] = array(
    	'currentPage' => 0,
    	'orderPage' => '',
    	'filterPage' => array(
    		 'dateType' => '',
    		 'dateCreation' => '',
    		 'descType' => '',
    		 'desc' => '',
    		 'stateType' => '',
    		 'state' => '',
    		)
    	);
} 


if (isset($_GET['page']))
{
	$_SESSION['offerSetting']['currentPage'] = $_GET['page'];
}
if (isset($_GET['order']))
{
	$_SESSION['offerSetting']['orderPage'] = $_GET['order'];
}

if (isset($_POST['filterSearch']))
{
	$_SESSION['offerSetting']['filterPage']['dateType'] = $_POST['dateCreationTypeFilter'];
	$_SESSION['offerSetting']['filterPage']['dateCreation'] = $_POST['dateCreationFilter'];
	$_SESSION['offerSetting']['filterPage']['descType'] = $_POST['descriptionTypeFilter'];
	$_SESSION['offerSetting']['filterPage']['desc'] = $_POST['descriptionFilter'];
	$_SESSION['offerSetting']['filterPage']['stateType'] = $_POST['stateTypeFilter'];
    $_SESSION['offerSetting']['filterPage']['state'] = $_POST['stateFilter'];
    $_SESSION['offerSetting']['currentPage'] = 0;
} 

if (isset($_POST['resetSearch']))
{
    $_SESSION['offerSetting']['filterPage']['dateType'] = '';
    $_SESSION['offerSetting']['filterPage']['dateCreation'] = '';
    $_SESSION['offerSetting']['filterPage']['descType'] = '';
    $_SESSION['offerSetting']['filterPage']['desc'] = '';
    $_SESSION['offerSetting']['filterPage']['stateType'] = '';
    $_SESSION['offerSetting']['filterPage']['state'] = '';
    $_SESSION['offerSetting']['currentPage'] = 0;
} 

	
$listOfferData = ConsultAllOffer($_SESSION['offerSetting']);

echo LoadLayout(
	'Listado de ofertas',
	LoadView('listOfferView', array('listOfferData' => $listOfferData))
	)



?>