<?php
/**
 * Vista para la modificacion de oferta para el administrador
 */

	include_once HELPERS_PATH.'inputs.php';
	include_once MODEL_PATH.'offerModel.php';
?>

<div class="row">
	<div class="col-md-6">
		<form class="offerForm" action="" method="post">

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

			<label>
				Fecha de creacion de la oferta: <?php echo $offer->dateCreation; ?>
			</label>

			<div class="row">
				<div class="col-md-6 form-group">
					<label for="description">
						Descripcion:
					</label>
					<?= InputCreator('text', 'description', $offer->description); ?>
				</div>
				<div class="col-md-6 form-group">
					<label for="contact">
						Persona de contacto:
					</label>
					<?= InputCreator('text', 'contact', $offer->contact); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 form-group">
					<label for="contactTLF">
						Telefono de contacto:
					</label>
					<?= InputCreator('text', 'contactTLF', $offer->contactTLF); ?>

				</div>
				<div class="col-md-6 form-group">
					<label for="contactMail"> 
						Correro electronico:
					</label>
					<?= InputCreator('text', 'contactMail', $offer->contactMail); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 form-group">
					<label for="address"> 
						Direccion:
					</label>
					<?= InputCreator('text', 'address', $offer->address); ?>
				</div>
				<div class="col-md-6 form-group">
					<label for="assentament">
						Poblacion:
					</label>
					<?= InputCreator('text', 'assentament', $offer->assentament); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 form-group">
					<label for="postCode"> 
						Codigo Postal:
					</label>
					<?= InputCreator('number', 'postCode', $offer->postCode); ?>
				</div>
				<div class="col-md-6 form-group">
					<label for="province">
						Provincia:
					</label>
					<?= SelectOption('province', $provinceList, $offer->province) ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 form-group">
					<label for="notes"> 
						Otros datos candidato:
					</label>
					<?= InputCreator('text', 'notes', $offer->notes); ?>
				</div>
				<div class="col-md-6 form-group">
					<label for="dateComunication"> 
						Fecha de comunicacion:
					</label>
					<?= InputCreator('text', 'dateComunication', $offer->dateComunication); ?>
				</div>
			</div>




			<div class="row">
				<div class="col-md-6 form-group">
					<label for="psicologist"> 
						Psicologo encargado:
					</label>
					<?= InputCreator('text', 'psicologist', $offer->psicologist); ?>
				</div>
				<div class="col-md-6 form-group">
					<label for="candidate">
						Candidato seleccionado:
					</label>
					<?= InputCreator('text', 'candidate', $offer->candidate); ?>
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