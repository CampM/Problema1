<?php
/**
 * Vista de la lista de ofertas
 */
	include_once HELPERS_PATH.'inputs.php';
?>
<form action="" method="post">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="dateCreationFilter">
					Fecha de creacion:
				</label>

				<?php SelectOption(
						'dateCreationTypeFilter', 
						array(
							array('value' => 'equal', 'text' => 'Igual a'),
							array('value' => 'greater', 'text' => 'Posterior a'),
							array('value' => 'lesser', 'text' => 'Anterior a'),
						), 
						$_SESSION['offerSetting']['filterPage']['dateType'],
						false)
				?>
				<input id="dateCreationFilter" class="form-control" type="text" name="dateCreationFilter" value="<?=$_SESSION['offerSetting']['filterPage']['dateCreation']?>" />
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label for="descriptionFilter">
					Descripcion:
				</label>

				<?php SelectOption(
						'descriptionTypeFilter', 
						array(
							array('value' => 'contain', 'text' => 'Contiene'),
							array('value' => 'equal', 'text' => 'Igual a'),
						), 
						$_SESSION['offerSetting']['filterPage']['descType'],
						false)
				?>

				<input id="descriptionFilter" class="form-control" type="text" name="descriptionFilter" value="<?=$_SESSION['offerSetting']['filterPage']['desc']?>" />
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>
					Estado:
				</label>

				<?php SelectOption(
						'stateTypeFilter', 
						array(
							array('value' => 'equal', 'text' => 'Igual a'),
							array('value' => 'distinct', 'text' => 'Distinto de'),
						), 
						$_SESSION['offerSetting']['filterPage']['stateType'],
						false)
				?>
				
				<?php SelectOption(
						'stateFilter', 
						$GLOBALS['offerStates'], 
						$_SESSION['offerSetting']['filterPage']['state'],
						true)
				?>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-md-12">
			<input class="btn btn-default" type="submit" name="filterSearch" value="Filtrar Busqueda"/>
			<input class="btn btn-default" type="submit" name="resetSearch" value="Limpiar"/>
		</div>
	</div>
</form>

<div class="row">
	<div class="col-md-12">
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="offerDate"><a href="?<?= CTRL_VAR . '=' . CTRL_HOME . '&order=dateCreation' ?>">Fecha de creación</a></th>
						<th><a href="?<?= CTRL_VAR . '=' . CTRL_HOME . '&order=description' ?>">Descripcion</a></th>
						<th class="offerContact"><a href="?<?= CTRL_VAR . '=' . CTRL_HOME . '&order=contact' ?>">Contacto</a></th>
						<th>Estado</th> 
						<th colspan="3"></th> 
					</tr>
				</thead>

				<tbody>
				
					<?php 
						$isAdmin = $_SESSION['UserInfo']->IsAdmin();

						foreach($listOfferData['list'] as $offer)
						{
							echo '<tr>';

								echo '<td class="offerDate">'.$offer->dateCreation.'</td>';
								echo '<td>'.$offer->description.'</td>';
								echo '<td class="offerContact">'.$offer->contact.'</td>';
								echo '<td>'.GetSelectedOption('province', $GLOBALS['offerStates'], $offer->state).'</td>';
										
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

			<div>
				Total de resultados: <?=$listOfferData['total']?>
			</div>

			<div>
				<a title="Ir a primera" href="?<?= CTRL_VAR . '=' . CTRL_HOME ?>&page=0">
					<span class="glyphicon glyphicon-fast-backward"></span>
				</a>

				<a title="Ir a anterior" href="?<?= CTRL_VAR . '=' . CTRL_HOME . '&page=' . $listOfferData['prevPage'] ?>">
					<span class="glyphicon glyphicon-backward"></span>
				</a>

				<?php

					for ($i = $listOfferData['pageFirstShow']; $i <= $listOfferData['pageLastShow']; $i++){
						echo '<a class="pageNumber" href="?' .  CTRL_VAR . '=' . CTRL_HOME . '&page=' . $i . '">' . ($i + 1) . '</a>';
					}

				?>

				<a title="Ir a siguiente" href="?<?= CTRL_VAR . '=' . CTRL_HOME . '&page=' . $listOfferData['nextPage'] ?>">
					<span class="glyphicon glyphicon-forward"></span>
				</a>
				<a title="Ir a ultima" href="?<?= CTRL_VAR . '=' . CTRL_HOME . '&page=' . $listOfferData['lastPage'] ?>">
					<span class="glyphicon glyphicon-fast-forward"></span>
				</a>

			</div>
		</div>
	</div>
</div>