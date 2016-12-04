<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Editar Oferta</title>
	</head>
	
	<body>
		<form action="../controllers/editOfferController.php" method="post">
			<p> Descripcion: <input type="text" name="description"></p>
			<p> Persona de contacto: <input type="text" name="contact" value="<?=ValorPost('contact')?>"></p>
			<p> Telefono de contacto: <input type="text" name="contactTLF"></p>
			<p> Correro electronico: <input type="text" name="contactMail"></p>
			<p> Direccion: <input type="text" name="address"></p>
			<p> Poblacion: <input type="text" name="assentament"></p>
			<p> Codigo Postal: <input type="number" name="postCode"></p>
			<p> Provincia: <input type="text" name="province"></p>
			<p> Estado: <input type="text" name="State"></p>
			<p> Fecha de creacion de la oferta: <input type="text" name="dateCreation"></p>
			<p> Fecha de comunicacion: <input type="text" name="dateComunication"></p>
			<p> Psicologo encargado: <input type="text" name="psicologist"></p>
			<p> Candidato seleccionado: <input type="text" name="candidate"></p>
			<p> Otros datos candidato: <input type="text" name="notes"></p>
			
			<input type="submit" value="Enviar">
		</form>
	
		
	</body>
</html>