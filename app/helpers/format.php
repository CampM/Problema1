<?php

/**
 * Función encargada de pasar una fecha dada en formato BBDD a formato español
 */
function ConvertToSpanishDate($date){
	$spanishDate = '';
	if (($date != null) && ($date != '0000-00-00')){
		$dateTmp = date_create_from_format('Y-m-d', $date);
		$spanishDate = date_format($dateTmp, 'd-m-Y');
	}
	return $spanishDate;
}

/**
 * Función encargada de pasar una fecha dada en formato español a formato BBDD
 */
function ConvertToBBDDDate($date){
	$bbddDate = '';
	if (($date != null) && ($date != '0000-00-00')){
		$dateTmp = date_create_from_format('d-m-Y', $date);
		$bbddDate = date_format($dateTmp, 'Y-m-d');
	}
	return $bbddDate;
}

?>