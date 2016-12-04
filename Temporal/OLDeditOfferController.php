<?php 

//DESACTUALIZADO
include_once '../models/functionsDB.php';
$listOffer = '../views/listOfferView.php';
$editOffer = '../views/editOfferView.php';


if ($_POST){
	$error = false;
	
	
	
	if ($error){
		include $editOffer;
	}
	else 
	{	
		OfferInsert($_POST["description"], $_POST["contact"], $_POST["contactTLF"], $_POST["contactMail"], $_POST["address"], $_POST["assentament"], $_POST["postCode"], $_POST["province"], $_POST["state"], $_POST["dateCreation"], $_POST["dateComunication"], $_POST["psicologist"], $_POST["candidate"], $_POST["notes"]);
		include $listOffer;
	}
}
else
{	
	if ($_GET){
		$id=$_GET['id'];
		switch ($_GET['button']) {

			case 'info':
				$consult= ConsultOffer('SELECT * FROM offer where Id = '.$id.';');
				include $editOffer;
				break;

			case 'modify':
				$consult= ConsultOffer('SELECT * FROM offer where Id = '.$id.';');
				include $editOffer;
				break;

			case 'delete':
				$consult= ConsultOffer('SELECT * FROM offer where Id = '.$id.';');
				include $editOffer;
				break;

			default:
				include $listOffer;
				break;
		}
	}
	else
	{

		include $editOffer;
	}
}

?>