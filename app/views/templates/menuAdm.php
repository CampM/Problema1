<?php
/**
 * Plantilla del menu de administrador
 * @var Ambiguous $urlAdd
 */

	$urlAdd = '?'.CTRL_VAR.'='.CTRL_ADD;
	$urlOfferList = '?'.CTRL_VAR.'='.CTRL_HOME;
    $urlAddUser = '?'.CTRL_VAR.'='.CTRL_ADD_USER;
	$urlUserList = '?'.CTRL_VAR.'='.CTRL_USERS;
	$urlCloseSesion = '?'.CTRL_VAR.'='.CTRL_CLOSE;
?>

<div class="div-menu">
    <!--Listado de ofertas -->
    <a href="<?=$urlOfferList?>">Listado de ofertas</a>
    <!--Añadir oferta -->
    <a href="<?=$urlAdd?>">Añadir nueva oferta</a>
    <!--Listado de usuarios -->
    <a href="<?=$urlUserList?>">Listado de usuarios</a>
    <!--Añadir usuario -->
    <a href="<?=$urlAddUser?>">Añadir nuevo usuario</a>
    <!--Cerrar sesion -->
    <a href="<?=$urlCloseSesion?>">Cerrar sesión</a>
</div>