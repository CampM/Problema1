<?php
/**
 * Vista de la lista de ofertas
 */
	include_once HELPERS_PATH.'inputs.php';
?>

<div class="row">
	<div class="col-md-12">
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Usuario</th>
						<th>Tipo</th>
						<th colspan="2"></th> 
					</tr>
				</thead>

				<tbody>
				
					<?php 
						foreach($listUserData['list'] as $user)
						{
							echo '<tr>';

								echo '<td>'.$user->name.'</td>';
								echo '<td>'.$user->username.'</td>';
								echo '<td>'.GetSelectedOption('', $GLOBALS['userTypes'] , $user->userType) .'</td>';

								echo '<td>';
								EditButton(true, '?'.CTRL_VAR.'='.CTRL_EDIT_USER.'&id='.$user->id);
								echo '</td>';
								
								echo '<td>';
								RemoveButton(true, '?'.CTRL_VAR.'='.CTRL_DELETE_USER.'&id='.$user->id);
								echo '</td>';

							echo '</tr>';
						}
					?>
					
				</tbody>
			</table>

			<div>
				Total de resultados: <?=$listUserData['total']?>
			</div>

			<div>
				<a title="Ir a primera" href="?<?= CTRL_VAR . '=' . CTRL_USERS ?>&page=0">
					<span class="glyphicon glyphicon-fast-backward"></span>
				</a>

				<a title="Ir a anterior" href="?<?= CTRL_VAR . '=' . CTRL_USERS . '&page=' . $listUserData['prevPage'] ?>">
					<span class="glyphicon glyphicon-backward"></span>
				</a>

				<?php

					for ($i = $listUserData['pageFirstShow']; $i <= $listUserData['pageLastShow']; $i++){
						echo '<a class="pageNumber" href="?' .  CTRL_VAR . '=' . CTRL_USERS . '&page=' . $i . '">' . ($i + 1) . '</a>';
					}

				?>

				<a title="Ir a siguiente" href="?<?= CTRL_VAR . '=' . CTRL_USERS . '&page=' . $listUserData['nextPage'] ?>">
					<span class="glyphicon glyphicon-forward"></span>
				</a>
				<a title="Ir a ultima" href="?<?= CTRL_VAR . '=' . CTRL_USERS . '&page=' . $listUserData['lastPage'] ?>">
					<span class="glyphicon glyphicon-fast-forward"></span>
				</a>

			</div>
		</div>
	</div>
</div>