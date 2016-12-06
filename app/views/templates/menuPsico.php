<?php
/**
 * Plantilla del menu de psicologo
 * @var Ambiguous $urlOfferList
 */

	$urlOfferList = '?'.CTRL_VAR.'='.CTRL_HOME;
	$urlCloseSesion = '?'.CTRL_VAR.'='.CTRL_CLOSE;
?>

<div class="div-menu">
    <!--Listado de ofertas -->
    <a href="<?=$urlOfferList?>">Listado de ofertas</a>
    <!--Cerrar sesion -->
    <a href="<?=$urlCloseSesion?>">Cerrar sesión</a>
</div>