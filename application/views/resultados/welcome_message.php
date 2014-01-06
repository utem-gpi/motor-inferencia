<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
		<link rel="stylesheet" href="<?=base_url() ?>main.css">
    </head>
    <body>
		<header>
			<h1>Resultados</h1>
			<small>Sistema de Selección de Personal</small>
			<nav>
				<p>Usted está en</p>
				<ul>
					<li><a href="<?=site_url() ?>">Inicio</a></li>
					<li class="active"><a href="<?=site_url('resultados') ?>">Resultados</a></li>
				</ul>
			</nav>
		</header>
        <section>
			<table>
				<caption>Resultados de postulaciones</caption>
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Perfil</th>
						<th>Aptitud</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($postulantes as $item): ?>
					<tr>
						<td><?=htmlspecialchars($item->nombre) ?></td>
						<td><?=htmlspecialchars($item->perfil->nombre) ?></td>
						<td><?=number_format($item->match * 100.00, 2) ?> %</td>
						<td>
							<a href="<?=site_url('resultados/descriptores/'.$item->id) ?>">Ver</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</section>
		<footer></footer>
    </body>