<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
		<link rel="stylesheet" href="<?=base_url() ?>main.css">
    </head>
    <body>
		<header>
			<h1>Bienvenido</h1>
			<small>Sistema de Selección de Personal</small>
			<nav>
				<p>Usted está en</p>
				<ul>
					<li class="active"><a href="<?=site_url() ?>">Inicio</a></li>
				</ul>
			</nav>
		</header>
		<section>
			<nav>
				<p>¿Qué desea hacer?</p>
				<ul>
					<li><a href="<?=site_url('perfiles') ?>">Definir perfiles de cargo</a></li>
					<li><a href="<?=site_url('preguntas') ?>">Definir preguntas y alternativas</a></li>
					<li><a href="<?=site_url('postulantes') ?>">Aplicar la encuesta a un postulante</a></li>
					<li><a href="<?=site_url('resultados') ?>">Ver resultados de encuestas</a></li>
				</ul>
			</nav>
		</section>
		<footer></footer>
    </body>
</html>