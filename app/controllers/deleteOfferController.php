<?php 
include_once MODEL_PATH.'offerModel.php';
include_once MODEL_PATH.'functionsDB.php';

//Si existe get[id]
if(isset($_GET['id']))
{
	//Si existe confirmacion de borrado
	if(isset($_GET['confirm']))
	{
		$isOk = DeleteOfferById($_GET['id']);

		//Si se borro correctamente
		if ($isOk){
			//Reedireccion del navegador
			header('location: '.INDEX_PATH);
		}
	}
	else
	{
		echo LoadLayout(
			'Borrar oferta',
			LoadView('deleteOfferView')
		);
	}
}
else
{
	/*
    // Error 404
   echo LoadLayout('Página no encontrada', 'Error 404: Pagina no encontrada');*/
   echo LoadLayout(
			'Borrar oferta',
			LoadView('error404View')
		);
}

?>