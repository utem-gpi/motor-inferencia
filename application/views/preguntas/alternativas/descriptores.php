<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
		<link rel="stylesheet" href="<?=base_url() ?>main.css">
    </head>
    <body>
		<header>
			<h1>Descriptores de la alternativa &laquo;<?=htmlspecialchars($alternativa->texto) ?>&raquo;</h1>
			<small>Sistema de Selección de Personal</small>
			<nav>
				<p>Usted está en</p>
				<ul>
					<li><a href="<?=site_url() ?>">Inicio</a></li>
					<li><a href="<?=site_url('preguntas') ?>">Preguntas</a></li>
					<li><a href="<?=site_url('preguntas/alternativas/index/'.$pregunta->id) ?>">Alternativas para la pregunta &laquo;<?=htmlspecialchars($pregunta->texto) ?>&raquo;</a></li>
					<li class="active"><a href="<?=site_url('preguntas/alternativas/descriptores/'.$alternativa->id) ?>">Descriptores de la alternativa &laquo;<?=htmlspecialchars($alternativa->texto) ?>&raquo;</a></li>
				</ul>
			</nav>
		</header>
		<section>
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
		</section>
		<footer></footer>
    </body>
</html>