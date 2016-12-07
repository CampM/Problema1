<?php

/**
 * Función que carga una vista y la devuelve como una cadena
 * @param string $vista
 * @param array $variablesDeVista
 * @return string
 */
function & LoadView($vista, array  $variablesDeVista=NULL)
{
    $ficheroVista=VIEW_PATH.$vista.'.php';
	if (! file_exists($ficheroVista)) {	
		$htmlError="<div>No existe la vista $vista<br/>Fichero:$ficheroVista</div>"; 
		return $htmlError; 
	}

    if (is_array($variablesDeVista))
    {
        extract($variablesDeVista);
    }
    
	ob_start();
	include($ficheroVista);
	$html = ob_get_clean();
	return $html;
}

/**
 * Función que cargar la vista para layout con menos parametros
 */
function & LoadLayout($title, $body)
{
    $ficheroVista='templates/layout';

    $viewVar = array('title' => $title, 'body' => $body);

    return LoadView($ficheroVista, $viewVar);
}