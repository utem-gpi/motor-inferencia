<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
    </head>
    <body>
		<legend>Descriptores del perfil &laquo;<?=htmlspecialchars($perfil->nombre) ?>&raquo;</legend>
		<form method="post" action="<?=site_url('perfiles/guardar/'.$perfil->id) ?>">
			<?php foreach($parametros as $key => $item): ?>
			<fieldset>
				<legend><?=htmlspecialchars($item->nombre) ?></legend>
				<p><?=htmlspecialchars($item->descripcion) ?></p>
				<fieldset>
					<legend>¿Cómo debería ser el empleado?</legend>
					<?php foreach($item->rangos as $jtem): ?>
					<label><input type="radio" name="descriptor_perfil[<?=$key ?>][id_rango]" value="<?=$jtem->id ?>" required<?=($jtem->checked)? ' checked' : ''?>> <?=htmlspecialchars($jtem->interpretacion) ?></label>
					<?php endforeach ?>
				</fieldset>
				<fieldset>
					<legend>¿Qué tan excluyente es esta característica?</legend>
					<?php foreach($item->exclusividades as $jtem): ?>
					<label><input type="radio" name="descriptor_perfil[<?=$key ?>][id_exclusividad]" value="<?=$jtem->id ?>" required<?=($jtem->checked)? ' checked' : ''?>> <?=htmlspecialchars($jtem->interpretacion) ?></label>
					<?php endforeach ?>
				</fieldset>
			</fieldset>
			<?php endforeach ?>
			<button type="submit">Finalizar</button>
		</form>
    </body>
</html>