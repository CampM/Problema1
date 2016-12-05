<?php 
include_once MODEL_PATH.'functionsDB.php';

//Controlador encargado de la lista de ofertas
if (isset($_POST['filterSearch'])){
    $offerList = FilterAllOffer();
} 
else
{
    $offerList = ConsultAllOffer();
} 

echo LoadLayout(
	'Listado de ofertas',
	LoadView('listOfferView', array('offerList' => $offerList))
	)


/*

	TODO POR GET
	Si por get me llegan variables tipo filterDesc, filterProvince --> decidir si filtramos o no.
	Las columnas de la tabla (cabecera) sera un enlace con ord=desc, ord=province
	Tambien llegara una "pag" con el numero de la pagina. 

	Todos los enlaces (de paginacion o de ordenacion) deben contener toda la informacion tanto de filtro, como de pagina a cargar como de ordenacion

*/

?>