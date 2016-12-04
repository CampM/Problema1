<?php 
	include_once './helpers/inputs.php';
	include_once './helpers/functionsViews.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lista Ofertas</title>
		
	</head>
	
	<body>

		<?= AddButton($_SESSION['UserInfo']->IsAdmin(), 'index.php/addOffer'); ?>

		<form action="" method="post">
			<label>
				Descripcion:
				<input type="text" name="descriptionFilter"/>
			</label>

			<label>
				Contacto:
				<input type="text" name="contactFilter"/>
			</label>

			<label>
				Candidato:
				<input type="text" name="candidateFilter"/>
			</label>

			<input type="submit" name="filterSearch" value="Filtrar Busqueda"/>

		</form>

		<table>
			
			<tr>
				<th>Descripcion:</th>
				<th>Contacto:</th>
				<th>Provincia:</th> 
				<th>Estado:</th>
				<th>Candidato seleccionado:</th> 
			</tr>
			
			<?php DrawListOffers($offerList); ?>
			
		
		</table>
		
		
	</body>
</html>