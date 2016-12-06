<?php
/**
 * Vista de la lista de ofertas
 */
	include_once HELPERS_PATH.'inputs.php';
?>
<div class="row">
	<div class="col-md-12">
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
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div>
			<table class="">
				<thead>
					<tr>
						<th>Descripcion:</th>
						<th>Contacto:</th>
						<th>Provincia:</th> 
						<th>Estado:</th>
						<th>Candidato seleccionado:</th> 
					</tr>
				</thead>

				<tbody>
				
					<?php 
						$isAdmin = $_SESSION['UserInfo']->IsAdmin();

						foreach($offerList as $offer)
						{
							echo '<tr>';

								echo '<td>'.$offer->description.'</td>';
								echo '<td>'.$offer->contact.'</td>';
								echo '<td>'.$offer->assentament.'</td>';
								echo '<td>'.$offer->state.'</td>';
								echo '<td>'.$offer->psicologist.'</td>';
								echo '<td>'.$offer->candidate.'</td>';
										
								echo '<td>';
								ViewButton(true, '?'.CTRL_VAR.'='.CTRL_INFO.'&id='.$offer->id);
								echo '</td>';

								echo '<td>';
								EditButton(true, '?'.CTRL_VAR.'='.CTRL_EDIT.'&id='.$offer->id);
								echo '</td>';
								
								echo '<td>';
								RemoveButton($isAdmin, '?'.CTRL_VAR.'='.CTRL_DELETE.'&id='.$offer->id);
								echo '</td>';

							echo '</tr>';
						}
					?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>