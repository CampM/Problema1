<?php 
/**
 * Controlamos el tipo de error producido y en funcion a este cargamos una vista para dicho error
 */

if(isset($_GET['e']))
{
	$title = 'ERROR '. $_GET['e'];
	$message = 'Ha sucedido un error desconocido.';
	switch ($_GET['e'])
	{
		case '404':
			$message = 'Recurso no encontrado.';
			break;
		case '500':
			$message = 'Error interno del servidor.';
			break;
		case '500.1':
			$message = 'Error interno del servidor. La oferta no existe.';
			break;
		case '500.2':
			$message = 'Error interno del servidor. Error en el guardado de la oferta.';
			break;
		case '500.3':
			$message = 'Error interno del servidor. Permisos insuficientes.';
			break;
		default:
			$title = 'ERROR DESCONOCIDO';
			break;
	}
	
	//Cargamos la vista del error con su respectivo mensaje
	echo LoadLayout($title, LoadView('errorView', array('message' => $message)));
}

?>