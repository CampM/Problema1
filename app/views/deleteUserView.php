
<!-- Vista para el borrado de usuario -->


<div class="commonForm">

	<p>¿Seguro que desea borrar el usuario <?= $user->username ?>?</p>

	<a class="btn btn-default" href="<?= INDEX_PATH.'?'.CTRL_VAR.'='.CTRL_DELETE_USER.'&confirm=confirm&id='.$_GET['id'] ?>">
		Aceptar
	</a>

	<a class="btn btn-default" href="<?=USERS_PATH?>">
		Cancelar
	</a>
</div>