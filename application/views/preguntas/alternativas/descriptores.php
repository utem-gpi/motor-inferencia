<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
    </head>
    <body>
		<legend>Descriptores de la alternativa &laquo;<?=htmlspecialchars($alternativa->texto) ?>&raquo;</legend>
		<form method="post" action="<?=site_url('preguntas/alternativas/guardar/'.$alternativa->id) ?>">
			<fieldset>
				<legend>¿Qué niveles asigna esta alternativa a cada uno de los parámetros? (desde -20 a +20)</legend>
				<?php foreach($parametros as $item): ?>
					<label>
						<span> <?=htmlspecialchars($item->nombre) ?></span>
						<input type="number" name="descriptor_alternativa[<?=$item->id ?>]" value="<?=(isset($item->descriptor))? (int) $item->descriptor->nivel : 0 ?>" min="-20" max="20" step="1" required>
					</label>
					<br>
				</label>
				<?php endforeach ?>
			</fieldset>
			<button type="submit">Finalizar</button>
		</form>
    </body>
</html>