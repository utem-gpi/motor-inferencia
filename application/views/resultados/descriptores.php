<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
		<link rel="stylesheet" href="<?=base_url() ?>main.css">
    </head>
    <body>
		<header>
			<h1>Resultados para el postulante &laquo;<?=htmlspecialchars($postulante->nombre) ?>&raquo; al cargo &laquo;<?=htmlspecialchars($perfil->nombre) ?>&raquo;</h1>
			<small>Sistema de Selección de Personal</small>
			<nav>
				<p>Usted está en</p>
				<ul>
					<li><a href="<?=site_url() ?>">Inicio</a></li>
					<li><a href="<?=site_url('resultados') ?>">Resultados</a></li>
					<li class="active"><a href="<?=site_url('resultados/descriptores/'.$postulante->id) ?>">Resultados para el postulante &laquo;<?=htmlspecialchars($postulante->nombre) ?>&raquo; al cargo &laquo;<?=htmlspecialchars($perfil->nombre) ?>&raquo;</a></li>
				</ul>
			</nav>
		</header>
		<section>
			<table>
				<thead>
					<tr>
						<th>Parámetro</th>
						<th>Mínimo</th>
						<th>Máximo</th>
						<th>Obtenido</th>
						<th>Ajuste al perfil</th>
					</tr>
					<tbody>
						<?php foreach ($resultados as $item): ?>
						<tr>
							<td><?=htmlspecialchars($item->parametro) ?></td>
							<td><?=number_format($item->min, 3) ?></td>
							<td><?=number_format($item->max, 3) ?></td>
							<td><?=number_format($item->nivel, 3) ?></td>
							<td><?=((bool) $item->match)? 'Sí' : 'No' ?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="4">Aptitud del postulante para el cargo</th>
							<td><?=number_format($resumen->match * 100, 2) ?> %</td>
						</tr>
					</tfoot>
				</thead>
			</table>
		</section>
		<footer></footer>
    </body>
</html>