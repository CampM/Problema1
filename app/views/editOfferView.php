<?php
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
			Descripcion:
			<?= InputText('description', $offer->description, $_SESSION['UserInfo']->IsAdmin()); ?>
		
		</label>
	</div>

	<div>
		<label>
			Persona de contacto:
			<?= InputText('contact', $offer->contact, $_SESSION['UserInfo']->IsAdmin()); ?>

		</label>
	</div>

	<div>
		<label>
			Telefono de contacto:
			<?= InputText('contactTLF', $offer->contactTLF, $_SESSION['UserInfo']->IsAdmin()); ?>
		</label>
	</div>

	<div>
		<label> 
			Correro electronico:
			<?= InputText('contactMail', $offer->contactMail, $_SESSION['UserInfo']->IsAdmin()); ?>
		</label>
	</div>

	<div>
		<label>
			Direccion:
			<?= InputText('address', $offer->address, $_SESSION['UserInfo']->IsAdmin()); ?>
		</label>
	</div>

	<div>
		<label>
			Poblacion:
			<?= InputText('assentament', $offer->assentament, $_SESSION['UserInfo']->IsAdmin()); ?>
		</label>
	</div>

	<div>
		<label>
			Codigo Postal:
			<?= InputNumber('postCode', $offer->postCode, $_SESSION['UserInfo']->IsAdmin()); ?>
		</label>
	</div>

	<div>
		<label>
			Provincia:
			<?= SelectOption('province', $provinceList, $offer->province, $_SESSION['UserInfo']->IsAdmin()) ?>
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
					$offer->state, 
					$_SESSION['UserInfo']->IsAdminOrPsicologist()) 
			?>
		</label>
	</div>

	<div>
		<label>
			Fecha de creacion de la oferta:
			<?= InputText('dateCreation', $offer->dateCreation, $_SESSION['UserInfo']->IsAdmin()); 
				//AQUI CONTROLAR QUE, SI ES AÑADIR, MOSTRAR FECHA ACTUAL, EN CASO DE MODIFICACION MOSTRAR LA FECHA DE CREACION GUARDADA

			?>
		</label>
	</div>

	<div>
		<label>
			Fecha de comunicacion:
			<?= InputText('dateComunication', $offer->dateComunication, $_SESSION['UserInfo']->IsAdmin()); ?>
		</label>
	</div>

	<div>
		<label>
			Psicologo encargado:
			<?= InputText('psicologist', $offer->psicologist, $_SESSION['UserInfo']->IsAdmin()); ?>
		</label>
	</div>

	<div>
		<label>
			Candidato seleccionado:
			<?= InputText('candidate', $offer->candidate, $_SESSION['UserInfo']->IsAdminOrPsicologist()); ?>
			
		</label>
	</div>

	<div>
		<label>
			Otros datos candidato:
			<?= InputText('notes', $offer->notes, $_SESSION['UserInfo']->IsAdminOrPsicologist()); ?>
			
		</label>
	</div>
	
	<input type="submit" value="Enviar"/>
</form>