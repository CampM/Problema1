<?php 
include_once './models/functionsDB.php';



function LoginForm(){

	include './views/loginView.php';
}

function Login($user, $pass){

	$model = DoLogin($user, $pass);

	if ($model != NULL){
		$_SESSION['UserInfo'] = $model;
	}

	header('location: '.$_SERVER['REQUEST_URI']);
}

/*function GoLoginForm(){
	header('location: ../index.php/login');
}*/

?>