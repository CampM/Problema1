<?php
	include_once './controllers/listOfferController.php';
	include_once './controllers/addOfferController.php';
	include_once './controllers/loginController.php';
	include_once './controllers/showOfferController.php';
	include_once './controllers/deleteOfferController.php';
	include_once './models/functionsDB.php';


	session_start();

	$uri = explode('?', $_SERVER['REQUEST_URI'])[0];

	if (isset($_SESSION['UserInfo'])){

		//Controlar si la url de acceso es sin el fichero index o con el fichero index
		if ((($uri == '/Problema1/app/') || ($uri == '/Problema1/app/index.php'))&&(isset($_POST['filterSearch']))){
		    FilterOfferList();
		} 
		elseif ((($uri == '/Problema1/app/') || ($uri == '/Problema1/app/index.php'))&&(!isset($_POST['filterSearch']))){
		    OfferList();
		} 
		elseif($uri == '/Problema1/app/index.php/addOffer')
		{
			AddOffer();
		}
		elseif($uri == '/Problema1/app/index.php/saveOffer')
		{
			SaveOffer();
		}
		elseif(($uri == '/Problema1/app/index.php/editOffer') && (isset($_GET['id'])))
		{
			EditOffer($_GET['id']);
		}
		elseif(($uri == '/Problema1/app/index.php/showOffer') && (isset($_GET['id'])))
		{
			ShowOffer($_GET['id']);
		}
		elseif(($uri == '/Problema1/app/index.php/deleteOffer') && (isset($_GET['id'])))
		{
			DeleteOffer($_GET['id']);
		}
		elseif(($uri == '/Problema1/app/index.php/confirmDeleteOffer') && (isset($_GET['id'])))
		{
			ConfirmDeleteOffer($_GET['id']);
		}
		
	}
	else
	{
		if (isset($_POST['user']) && isset($_POST['pass'])){

			Login($_POST['user'], $_POST['pass']);
		}
		else //($uri == '/Problema1/app/index.php/login')
		{
			LoginForm();
		}
		/*else
		{
			GoLoginForm();
		}*/
	}

	
	echo $uri;

?>