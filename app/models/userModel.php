<?php
/**
 * Clase de usuario
 * @author 2DAW
 *
 */

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


	/**
	 * Devuelve true si el usuario de la sesion es admin
	 * @return boolean
	 */
	function IsAdmin(){
		return $this->userType == 'admin';
	}

	/**
	 * Devuelve true si el usuario de la sesion es psicologist
	 * @return boolean
	 */
	function IsPsicologist(){
		return $this->userType == 'psicologist';
	}


	/**
	 * Devuelve true si el usuario de la sesion es psicologist o admin
	 * @return boolean
	 */
	function IsAdminOrPsicologist(){
		return $this->IsAdmin() || $this->IsPsicologist();
	}
}
?> 