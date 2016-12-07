<?php 
/**
 * Archivo de configuracion
 */

 //Datos basicos para la conexion de base de datos
$db_conf=array(
		'servidor'=>'localhost',
		'usuario'=>'root',
		'password'=>'',
		'base_datos'=>'joboffer'
		);

//Tamaño de paginacion de las listas de oferta y usuario
$pageSize = 10;

//Numero de paginacion a mostrar por encima y por debajo de la actual
$pageShow = 3;

//Estados de una oferta
$offerStates = array(
						array('value' => 'P', 'text' => 'Pendiente de inciar selección'),
						array('value' => 'R', 'text' => 'Realizando selección'),
						array('value' => 'S', 'text' => 'Seleccionado candidato'),
						array('value' => 'C', 'text' => 'Cancelada'),
					);

//Tipos de usuario
$userTypes = array(
						array('value' => 'A', 'text' => 'Administrador'),
						array('value' => 'P', 'text' => 'Psicólogo'),
					);

?>