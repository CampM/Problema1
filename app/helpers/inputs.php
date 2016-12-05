<?php
function SelectOption($name, array $options, $value, $canEdit)
{
	$readOnly = '';
	if (! $canEdit){
		$readOnly = 'disabled="disabled"';
	}

	echo "<select $readOnly name=\"$name\">";

	foreach($options as $option)
	{
		$optionText = $option['text'];
		$optionValue = $option['value'];

		$isSelected = ($optionValue == $value) ? 'selected' : '';
		
		echo "<option $isSelected value=\"$optionValue\"> $optionText </option>";
	}

	echo "</select>";
}

function InputsRadio($name, array $radioList, $value, $canEdit)
{

	$existChecked = false;
	foreach($radioList as $radio)
	{
		$radioValue = $radio['value'];
		$existChecked = $existChecked || ($radioValue == $value);
	}
	
	$count = 0;
	foreach($radioList as $radio)
	{
		$radioText = $radio['text'];
		$radioValue = $radio['value'];

		$userValue = $value;
		if (($existChecked == false) && ($count == 0)){
			$userValue = $radioValue;
		}

		InputRadio($name, $radioText, $radioValue, $userValue, $canEdit);

		$count++;
	}
}

function InputRadio($name, $text, $value, $userValue, $canEdit)
{
	$readOnly = '';
	if (! $canEdit){
		$readOnly = 'disabled="disabled"';
	}

	$isSelected = '';
	if ($userValue == $value)
	{
		$isSelected = 'checked="checked"';
	}

	echo '<label>';
	echo '<input type="radio" name="'.$name.'" value="'.$value.'" '.$readOnly.' '. $isSelected . ' />';
	echo " $text</label>";
}

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
	echo '<input type="text" name="'.$name.'" value="'.$value.'" '.$readOnly.' />';
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