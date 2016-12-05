<?php
class OfferModel{

	public $id;
	public $description;
	public $contact;
	public $contactTLF;
	public $contactMail;
	public $address;
	public $assentament;
	public $postCode;
	public $province;
	public $state;
	public $dateCreation;
	public $dateComunication;
	public $psicologist;
	public $candidate;
	public $notes;

	function __construct($id = NULL, $description = NULL, $contact = NULL, $contactTLF = NULL, $contactMail = NULL, $address = NULL, $assentament = NULL, $postCode = NULL, $province = NULL, $state = NULL, $dateCreation = NULL, $dateComunication = NULL, $psicologist = NULL, $candidate = NULL, $notes = NULL){

		if ($dateCreation == NULL){
			$dateCreation = date('Y-m-d');
		}

		$this->id = $id;
		$this->description = $description;
		$this->contact = $contact;
		$this->contactTLF = $contactTLF;
		$this->contactMail = $contactMail;
		$this->address = $address;
		$this->assentament = $assentament;
		$this->postCode = $postCode;
		$this->province = $province;
		$this->state = $state;
		$this->dateCreation = $dateCreation;
		$this->dateComunication = $dateComunication;
		$this->psicologist = $psicologist;
		$this->candidate = $candidate;
		$this->notes = $notes;
	}

	function GetErrors(){
		/*
		//NO BORRAR -NO BORRAR -NO BORRAR -NO BORRAR -NO BORRAR -NO BORRAR -NO BORRAR -NO BORRAR -NO BORRAR -NO BORRAR -NO BORRAR -NO BORRAR 

		$error = array();
		if(($this->description == NULL) || (trim($this->description) == ''))
		{
			array_push($error, 'Descripcion es un campo obligatorio.');
		}

		if(($this->contact == NULL) || (trim($this->contact) == ''))
		{
			array_push($error, 'Persona de contacto es un campo obligatorio.');
		}

		if(($this->contactTLF == NULL) || (trim($this->contactTLF) == ''))
		{
			array_push($error, 'Telefono de contacto es un campo obligatorio.');
		}
		else if (preg_match ('/^[0-9]{3}-[0-9]{6}$/' , $this->contactTLF) != 1)
		{
			array_push($error, 'Telefono de contacto incorrecto. Ejemplo: 666-666666');
		}

		if (($this->postCode != NULL) && (preg_match ('/^[0-9]{5}$/' , $this->postCode) != 1))
		{
			array_push($error, 'Codigo postal incorrecto. Ejemplo: 66666');
		}

		if(($this->contactMail == NULL) || (trim($this->contactMail) == ''))
		{
			array_push($error, 'Correo electronico es un campo obligatorio.');
		}
		else if(filter_var($this->contactMail, FILTER_VALIDATE_EMAIL) == false)
		{
			array_push($error, 'Correo electronico incorrecto.');
		}

		if (($this->dateComunication != NULL) && !$this->ValidateDate($this->dateComunication))
		{
			array_push($error, 'Fecha de comunicacion incorrecta. Ejemplo: 2016-11-20');
		}
		else if (($this->dateComunication != NULL) && ($this->dateComunication <= $this->GetToday()))
		{
			array_push($error, 'Fecha de comunicacion debe ser mayor que el dia actual.');
		}

		return $error;*/
	}

	function ValidateDate($date)
	{
	    $d = DateTime::createFromFormat('Y-m-d', $date);
	    return $d && $d->format('Y-m-d') == $date;
	}

	function GetToday(){
		return date("Y-m-d");
	}
}
?> 