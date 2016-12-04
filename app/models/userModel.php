<?php
class UserModel{

	public $id;
	public $name;
	public $userType;
	public $username;
	public $pass;

	function __construct($id = NULL, $name = NULL, $userType = NULL, $username = NULL, $pass = NULL){

		$this->id = $id;
		$this->name = $name;
		$this->userType = $userType;
		$this->username = $username;
		$this->pass = $pass;
		
	}

	function IsAdmin(){
		return $this->userType == 'admin';
	}

	function IsPsicologist(){
		return $this->userType == 'psicologist';
	}

	function IsAdminOrPsicologist(){
		return $this->IsAdmin() || $this->IsPsicologist();
	}
}
?> 