<?php

//Devuelve cierto si el parametro de entrada cumple las condiciones de estar relleno
function ValidateRequired($data){
	return !(($data == NULL) || (trim($data) == ''));
}


//Devuelve verdadero o falso para la validacion de la fecha en formato español
function ValidateDate($date)
{
	if ($date == NULL)
	{
		return true;
	}

	//Creo una variable con un valor datetime desde un string en formato de fecha español
    $d = date_create_from_format('d-m-Y', $date);

    //Devuelvo verdadero o falso en funcion de que el valor de $d no sea nulo y date = a string con formato de fecha español
    return $d && (date_format($d, 'd-m-Y') == $date);
}

//Devuelve verdadero o falso en funcion de si la fecha es mayor o no a la actual
function ValidateDateGreaterThanToday($date)
{
	if ($date == NULL)
	{
		return true;
	}

	if (!ValidateDate($date))
	{
		return false;
	}

	$d = date_create_from_format('d-m-Y', $date);
	//Sentencias para eliminar la hora
	$today = date_create('today');
	$today = date_format($today, 'd-m-Y');
	$today = date_create_from_format('d-m-Y', $today);

	return $d > $today;
}


//Filtrado de errores
function GetOfferErrors($offer){
		$error = array();

		if(!ValidateRequired($offer->description))
		{
			array_push($error, 'Descripcion es un campo obligatorio.');
		}

		if(!ValidateRequired($offer->contact))
		{
			array_push($error, 'Persona de contacto es un campo obligatorio.');
		}

		if(!ValidateRequired($offer->contactTLF))
		{
			array_push($error, 'Telefono de contacto es un campo obligatorio.');
		}
		else if (preg_match ('/^[0-9]{3}-[0-9]{6}$/' , $offer->contactTLF) != 1)
		{
			array_push($error, 'Telefono de contacto incorrecto. Ejemplo: 666-666666');
		}

		if (($offer->postCode != NULL) && (preg_match ('/^[0-9]{5}$/' , $offer->postCode) != 1))
		{
			array_push($error, 'Codigo postal incorrecto. Ejemplo: 66666');
		}

		if(!ValidateRequired($offer->contactMail))
		{
			array_push($error, 'Correo electronico es un campo obligatorio.');
		}
		else if(filter_var($offer->contactMail, FILTER_VALIDATE_EMAIL) == false)
		{
			array_push($error, 'Correo electronico incorrecto.');
		}

		if (!ValidateDate($offer->dateComunication))
		{
			array_push($error, 'Fecha de comunicacion incorrecta. Ejemplo: 20-11-2016');
		}
		else if (!ValidateDateGreaterThanToday($offer->dateComunication))
		{
			array_push($error, 'Fecha de comunicacion debe ser mayor que el dia actual.');
		}

		return $error;
}

?>