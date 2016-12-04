<?php
include_once './models/dataBaseProvider.php';
include_once './helpers/inputs.php';

/*function ValorPost($nombreCampo, $valorPorDefecto='')
{
	if (isset($_POST[$nombreCampo]))
		return $_POST[$nombreCampo];
	else 
		return $valorPorDefecto;
}*/

function DrawListOffers($offerList){

	$isAdmin = $_SESSION['UserInfo']->IsAdmin();
	
	foreach($offerList as $offer){
		echo '<tr>';

			echo '<td>'.$offer->description.'</td>';
			echo '<td>'.$offer->contact.'</td>';
			echo '<td>'.$offer->assentament.'</td>';
			echo '<td>'.$offer->state.'</td>';
			echo '<td>'.$offer->psicologist.'</td>';
			echo '<td>'.$offer->candidate.'</td>';
					
			echo '<td>';
			ViewButton(true, 'index.php/showOffer?id='.$offer->id);
			echo '</td>';

			echo '<td>';
			EditButton(true, 'index.php/editOffer?id='.$offer->id);
			echo '</td>';
			
			echo '<td>';
			RemoveButton($isAdmin, 'index.php/deleteOffer?id='.$offer->id);
			echo '</td>';

		echo '</tr>';
	}


	//$consult = Consulta('SELECT * FROM offer;');
	
	/*while ($reg=$db->LeeRegistro())
		{
			$id = $reg['Id'];
			$destination = '../controllers/editOfferController.php';

				echo '<td>'.$reg['Description'].'</td>';
				echo '<td>'.$reg['Contact'].'</td>';
				echo '<td>'.$reg['Assentament'].'</td>';
				echo '<td>'.$reg['State'].'</td>';
				echo '<td>'.$reg['Psicologist'].'</td>';
				echo '<td>'.$reg['Candidate'].'</td>';
				echo '<td><a href="'.$destination.'?button=info&id='.$id.'"><button>Informacion detallada</button></a></td>';
				echo '<td><a href="'.$destination.'?button=modify&id='.$id.'"><button>Modificar</button></a></td>';
				echo '<td><a href="'.$destination.'?button=delete&id='.$id.'"><button>Eliminar</button></a></td>';
		}*/
}

?>