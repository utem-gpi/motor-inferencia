<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
    </head>
    <body>
        <h1>Preguntas</h1>
        <form method="post" action="<?=site_url('preguntas/welcome/crear') ?>">
            <fieldset>
                <legend>Ingresar nueva pregunta</legend>
                <label>
                    <span>Texto</span>
                    <input type="text" name="pregunta[texto]" required>
                </label>
                <button type="submit">Continuar</button>
            </fieldset>
        </form>
        <table>
            <caption>Preguntas existentes</caption>
            <thead>
                <tr>
                    <th>Texto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
				<?php foreach($preguntas as $item): ?>
                <tr>
                    <td><?=htmlspecialchars($item->texto) ?></td>
                    <td>
                        <a href="<?=site_url('preguntas/alternativas/index/'.$item->id) ?>">Modificar</a>
                        <a href="<?=site_url('preguntas/welcome/eliminar/'.$item->id) ?>" onclick="return confirm('¿Está seguro que desea eliminar la pregunta?');">Eliminar</a>
                    </td>
                </tr>
				<?php endforeach ?>
            </tbody>
    </body>