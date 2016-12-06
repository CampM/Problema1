<?php

/**
 * Controlador encargado del cierre de sesion
 */

session_destroy();
header('location: '.INDEX_PATH);

?>