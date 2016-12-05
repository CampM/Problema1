<?php 
include_once './models/functionsDB.php';


if (isset($_POST['user']) && isset($_POST['pass'])){

    $model = DoLogin($_POST['user'], $_POST['pass']);

	if ($model != NULL){
		$_SESSION['UserInfo'] = $model;
	}

	header('location: '.$_SERVER['REQUEST_URI']);
}
else
{
	echo LoadView('loginView');
}

?>