<?php
/**
 * Vista para la modificacion de oferta para el psicologo
 */

	include_once HELPERS_PATH.'inputs.php';
	include_once MODEL_PATH.'offerModel.php';
?>

<div>
	<label>
		Fecha de creacion de la oferta: <?php echo $offer->dateCreation; ?>
	</label>
</div>

<div class="row">
	<div class="col-md-6">
		
		<form class="commonForm" action="" method="post">

			<input type="hidden" name="id" value="<?=$offer->id?>"/>

			<?php
			//Para mostrar los errores generados en los campos de la oferta
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


			<div class="row">
				<div class="col-md-6 form-group">
					<label for="candidate">
						Candidato seleccionado:
					</label>
					<?= InputCreator('text', 'candidate', $offer->candidate); ?>
				</div>
				<div class="col-md-6 form-group">
					<label for="notes"> 
						Otros datos candidato:
					</label>
					<?= InputCreator('text', 'notes', $offer->notes); ?>
				</div>
			</div>


			<div class="row">
				<div class="col-md-12 form-group">
					<label for="state">
						Estado:
					</label>
					<?= 
						InputsRadio(
							'state', 
							$GLOBALS['offerStates'],
							$offer->state);
					?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<input class="btn btn-default" type="submit" value="Enviar"/>
				</div>
			</div>

		</form>
	</div>
</div>


<div class="row">
	<div class="col-md-6">

		<div class="row">
			<div class="col-md-6 form-group">
				<label>
					Descripcion:
				</label>
				<div class="form-control">
					<?php echo $offer->description; ?>
				</div>
			</div>
			<div class="col-md-6 form-group">
				<label>
					Persona de contacto:
				</label>
				<div class="form-control">
					<?php echo $offer->contact; ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 form-group">
				<label>
					Telefono de contacto:
				</label>
				<div class="form-control">
					<?php echo $offer->contactTLF; ?>
				</div>
			</div>
			<div class="col-md-6 form-group">
				<label>
					Correro electronico:
				</label>
				<div class="form-control">
					<?php echo $offer->contactMail; ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 form-group">
				<label>
					Direccion:
				</label>
				<div class="form-control">
					<?php echo $offer->address; ?>
				</div>
			</div>
			<div class="col-md-6 form-group">
				<label>
					Poblacion:
				</label>
				<div class="form-control">
					<?php echo $offer->assentament; ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 form-group">
				<label>
					Codigo Postal:
				</label>
				<div class="form-control">
					<?php echo $offer->postCode; ?>
				</div>
			</div>
			<div class="col-md-6 form-group">
				<label>
					Provincia:
				</label>
				<div class="form-control">
					<?php echo GetSelectedOption('province', $provinceList, $offer->province); ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 form-group">
				<label>
					Psicologo encargado:
				</label>
				<div class="form-control">
					<?php echo $offer->psicologist; ?>
				</div>
			</div>
			<div class="col-md-6 form-group">
				<label>
					Fecha de comunicacion:
				</label>
				<div class="form-control">
					<?php echo $offer->dateComunication; ?>
				</div>
			</div>
		</div>
	</div>
</div>