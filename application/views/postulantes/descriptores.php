<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
		<link rel="stylesheet" href="<?=base_url() ?>main.css">
    </head>
    <body>
		<header>
			<h1>Descriptores del postulante &laquo;<?=htmlspecialchars($postulante->nombre) ?>&raquo;</h1>
			<small>Sistema de Selección de Personal</small>
			<nav>
				<p>Usted está en</p>
				<ul>
					<li><a href="<?=site_url() ?>">Inicio</a></li>
					<li><a href="<?=site_url('postulantes') ?>">Postulaciones</a></li>
					<li class="active"><a href="<?=site_url('postulantes/descriptores/'.$postulante->id) ?>">Descriptores del postulante &laquo;<?=htmlspecialchars($postulante->nombre) ?>&raquo;</a></li>
				</ul>
			</nav>
		</header>
		<section>
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
		</section>
		<footer></footer>
    </body>
</html>