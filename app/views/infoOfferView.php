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


<div class="row">
	<div class="col-md-3 form-group">
		<label>
			Descripcion:
		</label>
		<div class="form-control">
			<?php echo $offer->description; ?>
		</div>
	</div>
	<div class="col-md-3 form-group">
		<label>
			Persona de contacto:
		</label>
		<div class="form-control">
			<?php echo $offer->contact; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3 form-group">
		<label>
			Telefono de contacto:
		</label>
		<div class="form-control">
			<?php echo $offer->contactTLF; ?>
		</div>
	</div>
	<div class="col-md-3 form-group">
		<label>
			Correro electronico:
		</label>
		<div class="form-control">
			<?php echo $offer->contactMail; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3 form-group">
		<label>
			Direccion:
		</label>
		<div class="form-control">
			<?php echo $offer->address; ?>
		</div>
	</div>
	<div class="col-md-3 form-group">
		<label>
			Poblacion:
		</label>
		<div class="form-control">
			<?php echo $offer->assentament; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3 form-group">
		<label>
			Codigo Postal:
		</label>
		<div class="form-control">
			<?php echo $offer->postCode; ?>
		</div>
	</div>
	<div class="col-md-3 form-group">
		<label>
			Provincia:
		</label>
		<div class="form-control">
			<?php echo GetSelectedOption('province', $provinceList, $offer->province); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3 form-group">
		<label>
			Otros datos candidato:
		</label>
		<div class="form-control">
			<?php echo $offer->notes; ?>
		</div>
	</div>
	<div class="col-md-3 form-group">
		<label>
			Fecha de comunicacion:
		</label>
		<div class="form-control">
			<?php echo $offer->dateComunication; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3 form-group">
		<label>
			Psicologo encargado:
		</label>
		<div class="form-control">
			<?php echo $offer->psicologist; ?>
		</div>
	</div>
	<div class="col-md-3 form-group">
		<label>
			Candidato seleccionado:
		</label>
		<div class="form-control">
			<?php echo $offer->candidate; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3 form-group">
		<label>
			Estado:
		</label>
		<div class="form-control">
			<?php echo GetSelectedOption('province', $GLOBALS['offerStates'], $offer->state); ?>
		</div>
	</div>
</div>

<a href="<?=INDEX_PATH?>">Volver</a>
		