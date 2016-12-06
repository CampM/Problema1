<?php
/**
 * Vista de informacion completa de la oferta
 */
	include_once HELPERS_PATH.'inputs.php';
?>


<div>
	<label>
		Fecha de creacion de la oferta: <?php echo $offer->dateCreation; ?>
	</label>
</div>

<div>
	<label>
		Descripcion: <?php echo $offer->description; ?>
	</label>
</div>

<div>
	<label>
		Persona de contacto: <?php echo $offer->contact; ?>
	</label>
</div>

<div>
	<label>
		Telefono de contacto: <?php echo $offer->contactTLF; ?>
	</label>
</div>

<div>
	<label> 
		Correro electronico: <?php echo $offer->contactMail; ?>
	</label>
</div>

<div>
	<label>
		Direccion: <?php echo $offer->address; ?>
	</label>
</div>

<div>
	<label>
		Poblacion: <?php echo $offer->assentament; ?>
	</label>
</div>

<div>
	<label>
		Codigo Postal: <?php echo $offer->postCode; ?>
	</label>
</div>

<div>
	<label>
		Provincia: <?php echo GetSelectedOption('province', $provinceList, $offer->province); ?>
	</label>
</div>

<div>
	<label>
		Estado: <?php echo GetSelectedOption('province', array(
					array('value' => 'P', 'text' => 'Pendiente de inciar selección'),
					array('value' => 'R', 'text' => 'Realizando selección'),
					array('value' => 'S', 'text' => 'Seleccionado candidato'),
					array('value' => 'C', 'text' => 'Cancelada'),
				), $offer->state); ?>
		
	</label>
</div>

<div>
	<label>
		Fecha de comunicacion: <?php echo $offer->dateComunication; ?>
	</label>
</div>

<div>
	<label>
		Psicologo encargado: <?php echo $offer->psicologist; ?>
	</label>
</div>

<div>
	<label>
		Candidato seleccionado: <?php echo $offer->candidate; ?>
	</label>
</div>

<div>
	<label>
		Otros datos candidato: <?php echo $offer->notes; ?>
	</label>
</div>

<a href="<?=INDEX_PATH?>">Volver</a>
		