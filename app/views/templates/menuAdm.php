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

<ul>
	<!--Añadir oferta -->
    <li><a href="<?=$urlAdd?>">Añadir nueva oferta</a></li>
    <!--Listado de ofertas -->
    <li><a href="<?=$urlOfferList?>">Listado de ofertas</a></li>
    <!--Listado de usuarios -->
    <li><a href="<?=$urlUserList?>">Listado de usuarios</a></li>
    <!--Cerrar sesion -->
    <li><a href="<?=$urlCloseSesion?>">Cerrar sesión</a></li>
</ul>