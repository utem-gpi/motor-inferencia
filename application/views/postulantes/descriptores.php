<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
    </head>
    <body>
		<legend>Descriptores del postulante &laquo;<?=htmlspecialchars($postulante->nombre) ?>&raquo;</legend>
		<form method="post" action="<?=site_url('postulantes/guardar/'.$postulante->id) ?>">
			<?php foreach($preguntas as $key => $item): ?>
			<fieldset>
				<legend><?=htmlspecialchars($item->texto) ?></legend>
				<?php foreach($item->alternativas as $jtem): ?>
				<label><input type="radio" name="descriptor_postulante[<?=$key ?>][id_alternativa]" value="<?=$jtem->id ?>" required<?=($jtem->checked)? ' checked' : ''?>> <?=htmlspecialchars($jtem->texto) ?></label>
				<?php endforeach ?>
			</fieldset>
			<?php endforeach ?>
			<button type="submit">Finalizar</button>
		</form>
    </body>
</html>