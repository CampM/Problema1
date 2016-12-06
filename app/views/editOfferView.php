<?php
/**
 * Vista para la modificacion de oferta para el administrador
 */

	include_once HELPERS_PATH.'inputs.php';
	include_once MODEL_PATH.'offerModel.php';
?>

<form action="" method="post">

	<input type="hidden" name="id" value="<?=$offer->id?>"/>

	<?php
		if (count($errors) > 0)
		{
			echo '<ul class="errorList">';
			foreach ($errors as $error) 
			{
				echo "<li>$error</li>";
			}
			echo '</ul>';
		}
	?>

	<div>
		<label>
			Fecha de creacion de la oferta: <?php echo $offer->dateCreation; ?>
		</label>
	</div>

	<div>
		<label>
			Descripcion:
			<?= InputCreator('text', 'description', $offer->description); ?>
		
		</label>
	</div>

	<div>
		<label>
			Persona de contacto:
			<?= InputCreator('text', 'contact', $offer->contact); ?>

		</label>
	</div>

	<div>
		<label>
			Telefono de contacto:
			<?= InputCreator('text', 'contactTLF', $offer->contactTLF); ?>
		</label>
	</div>

	<div>
		<label> 
			Correro electronico:
			<?= InputCreator('text', 'contactMail', $offer->contactMail); ?>
		</label>
	</div>

	<div>
		<label>
			Direccion:
			<?= InputCreator('text', 'address', $offer->address); ?>
		</label>
	</div>

	<div>
		<label>
			Poblacion:
			<?= InputCreator('text', 'assentament', $offer->assentament); ?>
		</label>
	</div>

	<div>
		<label>
			Codigo Postal:
			<?= InputCreator('number', 'postCode', $offer->postCode); ?>
		</label>
	</div>

	<div>
		<label>
			Provincia:
			<?= SelectOption('province', $provinceList, $offer->province) ?>
		</label>
	</div>

	<div>
		<label>
			Estado:
			<?= 
				InputsRadio(
					'state', 
					array(
						array('value' => 'P', 'text' => 'Pendiente de inciar selección'),
						array('value' => 'R', 'text' => 'Realizando selección'),
						array('value' => 'S', 'text' => 'Seleccionado candidato'),
						array('value' => 'C', 'text' => 'Cancelada'),
					),
					$offer->state);
			?>
		</label>
	</div>

	<div>
		<label>
			Fecha de comunicacion:
			<?= InputCreator('text', 'dateComunication', $offer->dateComunication); ?>
		</label>
	</div>

	<div>
		<label>
			Psicologo encargado:
			<?= InputCreator('text', 'psicologist', $offer->psicologist); ?>
		</label>
	</div>

	<div>
		<label>
			Candidato seleccionado:
			<?= InputCreator('text', 'candidate', $offer->candidate); ?>
			
		</label>
	</div>

	<div>
		<label>
			Otros datos candidato:
			<?= InputCreator('text', 'notes', $offer->notes); ?>
			
		</label>
	</div>
	
	<input type="submit" value="Enviar"/>
</form>