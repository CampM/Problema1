<?php
/**
 * Vista para la modificacion de usuarios
 */

	include_once HELPERS_PATH.'inputs.php';
	include_once MODEL_PATH.'userModel.php';
?>

<div class="row">
	<div class="col-md-6">
		<form class="commonForm" action="" method="post">

			<input type="hidden" name="id" value="<?=$user->id?>"/>

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

			<div class="row">
				<div class="col-md-6 form-group">
					<label for="name">
						Nombre:
					</label>
					<?= InputCreator('text', 'name', $user->name); ?>
				</div>
				<div class="col-md-6 form-group">
					<label for="username">
						Nombre de usuario:
					</label>
					<?= InputCreator('text', 'username', $user->username); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 form-group">
					<label for="pass">
						Contraseña:
					</label>
					<?= InputCreator('password', 'pass', $user->pass); ?>
				</div>
				<div class="col-md-6 form-group">
					<label for="pass2">
						Repetir contraseña:
					</label>
					<?= InputCreator('password', 'pass2', $user->pass2); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 form-group">
					<label for="userType">
						Tipo de usuario:
					</label>
					<?= 
						InputsRadio(
							'userType', 
							$GLOBALS['userTypes'],
							$user->userType);
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