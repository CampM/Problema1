<?php
	include_once './helpers/inputs.php';
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Editar Oferta</title>
	</head>
	
	<body>
		<form action="saveOffer" method="post">

			<input type="hidden" name="id" value="<?=$offer->id?>"/>

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
					<?= InputText('province', $offer->province, $_SESSION['UserInfo']->IsAdmin()); ?>
				</label>
			</div>

			<div>
				<label>
					Estado:
					<?= InputText('state', $offer->state, $_SESSION['UserInfo']->IsAdminOrPsicologist()); ?>
					
				</label>
			</div>

			<div>
				<label>
					Fecha de creacion de la oferta:
					<?= InputText('dateCreation', $offer->dateCreation, $_SESSION['UserInfo']->IsAdmin()); ?>
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
		
	</body>
</html>