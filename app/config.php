<?php 
/**
 * Capa de abstraccion de base de datos
 * @var array $db_conf
 */

$db_conf=array(
		'servidor'=>'localhost',
		'usuario'=>'root',
		'password'=>'',
		'base_datos'=>'joboffer'
		);

$pageSize = 10;
$pageShow = 3;

$offerStates = array(
						array('value' => 'P', 'text' => 'Pendiente de inciar selección'),
						array('value' => 'R', 'text' => 'Realizando selección'),
						array('value' => 'S', 'text' => 'Seleccionado candidato'),
						array('value' => 'C', 'text' => 'Cancelada'),
					);

$userTypes = array(
						array('value' => 'A', 'text' => 'Administrador'),
						array('value' => 'P', 'text' => 'Psicólogo'),
					);

?>