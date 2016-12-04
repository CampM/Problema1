<?php
function inputText($name, $value, $canEdit){
	$readOnly = '';
	if (! $canEdit){
		$readOnly = 'readonly="readonly"';
	}
	echo '<input type="text" name="'.$name.'" value="'.$value.'" '.$readOnly.' />';
}

function inputNumber($name, $value, $canEdit){
	$readOnly = '';
	if (! $canEdit){
		$readOnly = 'readonly="readonly"';
	}
	echo '<input type="number" name="'.$name.'" value="'.$value.'" '.$readOnly.' />';
}

function RemoveButton($isVisible, $url, $text='Eliminar'){
	
	if ($isVisible){
		echo '<a href="'.$url.'">'.$text.'</a>';
	}

}

function AddButton($isVisible, $url, $text='Añadir nueva oferta'){
	
	if ($isVisible){
		echo '<a href="'.$url.'">'.$text.'</a>';
	}

}

function EditButton($isVisible, $url, $text='Modificar'){
	
	if ($isVisible){
		echo '<a href="'.$url.'">'.$text.'</a>';
	}

}

function ViewButton($isVisible, $url, $text='Mas detalles'){
	
	if ($isVisible){
		echo '<a href="'.$url.'">'.$text.'</a>';
	}

}
?>