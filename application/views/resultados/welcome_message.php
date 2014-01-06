<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
    </head>
    <body>
        <h1>Resultados</h1>
        <table>
            <caption>Resultados de postulaciones</caption>
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
                        <a href="<?=site_url('resultados/descriptores/'.$item->id) ?>">Ver</a>
                    </td>
                </tr>
				<?php endforeach ?>
            </tbody>
    </body>