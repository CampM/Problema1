<?php 

//Pruebas de Abstraccion Base Datos
require '../app/models/DataBaseProvider.php';

/*Creamos la instancia del objeto. Ya estamos conectados*/
$bd=DataBaseProvider::getInstance();

/*Creamos una query sencilla*/
$sql='SELECT descripcion FROM oferta';

/*Ejecutamos la query*/
$bd->Consulta($sql);

/*Realizamos un bucle para ir obteniendo los resultados*/
while ($reg=$bd->LeeRegistro())
{
	echo $reg['descripcion'].'<br />';
}

/*function ValorPost($nombreCampo, $valorPorDefecto='')
{
	if (isset($_POST[$nombreCampo]))
		return $_POST[$nombreCampo];
	else
		return $valorPorDefecto;
}
*/

?>

