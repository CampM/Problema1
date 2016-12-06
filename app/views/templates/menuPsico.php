<?php
/**
 * Plantilla del menu de psicologo
 * @var Ambiguous $urlOfferList
 */

	$urlOfferList = '?'.CTRL_VAR.'='.CTRL_HOME;
	$urlCloseSesion = '?'.CTRL_VAR.'='.CTRL_CLOSE;
?>

<ul>
    <!--Listado de ofertas -->
    <li><a href="<?=$urlOfferList?>">Listado de ofertas</a></li>
    <!--Cerrar sesion -->
    <li><a href="<?=$urlCloseSesion?>">Cerrar sesión</a></li>
</ul>