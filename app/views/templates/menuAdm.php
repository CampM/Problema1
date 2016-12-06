<?php
/**
 * Plantilla del menu de administrador
 * @var Ambiguous $urlAdd
 */

	$urlAdd = '?'.CTRL_VAR.'='.CTRL_ADD;
	$urlOfferList = '?'.CTRL_VAR.'='.CTRL_HOME;
	$urlUserList = '?'.CTRL_VAR.'='.CTRL_HOME;
	$urlCloseSesion = '?'.CTRL_VAR.'='.CTRL_CLOSE;
?>

<div class="div-menu">
	<!--Añadir oferta -->
    <a href="<?=$urlAdd?>">Añadir nueva oferta</a>
    <!--Listado de ofertas -->
    <a href="<?=$urlOfferList?>">Listado de ofertas</a>
    <!--Listado de usuarios -->
    <a href="<?=$urlUserList?>">Listado de usuarios</a>
    <!--Cerrar sesion -->
    <a href="<?=$urlCloseSesion?>">Cerrar sesión</a>
</div>