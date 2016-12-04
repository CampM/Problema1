<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Editar Oferta</title>
	</head>
	
	<body>

		<div>
			<label>
				Descripcion:
				<input type="text" name="description" value="<?=$offer->description ?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Persona de contacto:
				<input type="text" name="contact" value="<?=$offer->contact ?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Telefono de contacto:
				<input type="text" name="contactTLF" value="<?=$offer->contactTLF?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label> 
				Correro electronico:
				<input type="text" name="contactMail" value="<?=$offer->contactMail?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Direccion:
				<input type="text" name="address" value="<?=$offer->address?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Poblacion:
				<input type="text" name="assentament" value="<?=$offer->assentament?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Codigo Postal:
				<input type="text" name="postCode" value="<?=$offer->postCode?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Provincia:
				<input type="text" name="province" value="<?=$offer->province?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Estado:
				<input type="text" name="state" value="<?=$offer->state?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Fecha de creacion de la oferta:
				<input type="text" name="dateCreation" value="<?=$offer->dateCreation?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Fecha de comunicacion:
				<input type="text" name="dateComunication" value="<?=$offer->dateComunication?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Psicologo encargado:
				<input type="text" name="psicologist" value="<?=$offer->psicologist?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Candidato seleccionado:
				<input type="text" name="candidate" value="<?=$offer->candidate?>" readonly="readonly"/>
			</label>
		</div>

		<div>
			<label>
				Otros datos candidato:
				<input type="text" name="notes" value="<?=$offer->notes?>" readonly="readonly"/>
			</label>
		</div>
		
		<a href="../index.php">Volver</a>
		
	</body>
</html>