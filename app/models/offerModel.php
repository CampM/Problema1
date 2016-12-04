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
}
?> 