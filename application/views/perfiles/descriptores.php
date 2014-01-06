<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
		<link rel="stylesheet" href="<?=base_url() ?>main.css">
    </head>
    <body>
		<header>
			<h1>Descriptores del perfil &laquo;<?=htmlspecialchars($perfil->nombre) ?>&raquo;</h1>
			<small>Sistema de Selección de Personal</small>
			<nav>
				<p>Usted está en</p>
				<ul>
					<li><a href="<?=site_url() ?>">Inicio</a></li>
					<li><a href="<?=site_url('perfiles') ?>">Perfiles</a></li>
					<li class="active"><a href="<?=site_url('perfiles/descriptores/'.$perfil->id) ?>">Descriptores del perfil &laquo;<?=htmlspecialchars($perfil->nombre) ?>&raquo;</a></li>
				</ul>
			</nav>
		</header>
		<section>
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
		</section>
		<footer></footer>
    </body>
</html>