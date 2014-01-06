<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
		<link rel="stylesheet" href="<?=base_url() ?>main.css">
    </head>
    <body>
		<header>
			<h1>Postulaciones</h1>
			<small>Sistema de Selección de Personal</small>
			<nav>
				<p>Usted está en</p>
				<ul>
					<li><a href="<?=site_url() ?>">Inicio</a></li>
					<li class="active"><a href="<?=site_url('postulantes') ?>">Postulaciones</a></li>
				</ul>
			</nav>
		</header>
		<section>
			<form method="post" action="<?=site_url('postulantes/crear') ?>">
				<fieldset>
					<legend>Ingresar nueva postulación</legend>
					<label>
						<span>Nombre postulante</span>
						<input type="text" name="postulante[nombre]" required>
					</label>
					<label>
						<span>Cargo al que postula</span>
						<select name="postulante[id_perfil]" required>
							<?php foreach($perfiles as $item): ?>
							<option value="<?=$item->id ?>"><?=htmlspecialchars($item->nombre) ?></option>
							<?php endforeach ?>
						</select>
					</label>
					<button type="submit">Continuar</button>
				</fieldset>
			</form>
			<table>
				<caption>Postulaciones existentes</caption>
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($postulantes as $item): ?>
					<tr>
						<td><?=htmlspecialchars($item->nombre) ?></td>
						<td>
							<a href="<?=site_url('postulantes/descriptores/'.$item->id) ?>">Modificar</a>
							<a href="<?=site_url('postulantes/eliminar/'.$item->id) ?>" onclick="return confirm('¿Está seguro que desea eliminar la postulación?');">Eliminar</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</section>
		<footer></footer>
    </body>