<?php

function InputCreator($type, $name, $value){

	echo '<input class="form-control" type="'.$type.'" name="'.$name.'" id="'.$name.'" value="'.$value.'" />';
}

//Crea select option
function SelectOption($name, array $options, $value, $showEmptyOption = true)
{
	echo "<select class=\"form-control\" name=\"$name\" id=\"$name\">";

	if ($showEmptyOption){
		echo '<option value="">Selecciona un elemento</option>';
	}

	foreach($options as $option)
	{
		$optionText = $option['text'];
		$optionValue = $option['value'];

		$isSelected = ($optionValue == $value) ? 'selected' : '';
		
		echo "<option $isSelected value=\"$optionValue\"> $optionText </option>";
	}

	echo "</select>";
}

//Dada una lista de opciones y el valor seleccionado, me devuelve el texto asociado al valor
function GetSelectedOption($name, array $options, $value)
{	
	$selectedOption = '';

	foreach($options as $option)
	{
		$optionText = $option['text'];
		$optionValue = $option['value'];

		if ($optionValue == $value){
			$selectedOption = $optionText;
		}
	}
	return $selectedOption;
}

function InputsRadio($name, array $radioList, $value)
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

		InputRadio($name, $radioText, $radioValue, $userValue);

		$count++;
	}
}

function InputRadio($name, $text, $value, $userValue)
{
	
	$isSelected = '';
	if ($userValue == $value)
	{
		$isSelected = 'checked="checked"';
	}

	echo '<label class="inputRadio">';
	echo '<input type="radio" name="'.$name.'" value="'.$value.'" '. $isSelected . ' />';
	echo " $text</label>";
}

function RemoveButton($isVisible, $url, $text='Eliminar'){
	
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