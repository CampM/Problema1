<?php 
/**
 * Controlador encargado de la lista de ofertas
 */
include_once MODEL_PATH.'functionsDB.php';

if ($_SESSION['UserInfo']->IsAdmin())
{

	if (!isset($_SESSION['userSetting'])){
	    $_SESSION['userSetting'] = array(
	    	'currentPage' => 0
		);
	} 


	if (isset($_GET['page']))
	{
		$_SESSION['userSetting']['currentPage'] = $_GET['page'];
	}
		
	$listUserData = ConsultAllUser($_SESSION['userSetting']);

	echo LoadLayout(
		'Listado de usuarios',
		LoadView('listUserView', array('listUserData' => $listUserData))
		);
}
else
{
   // Error No Permisos
	header('location: '.ERROR_PATH.'&e=500.3');
}

?>