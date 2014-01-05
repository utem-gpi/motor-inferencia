<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
    </head>
    <body>
        <h1>Alternativas para la pregunta &laquo;<?=htmlspecialchars($pregunta->texto) ?>&raquo;</h1>
        <form method="post" action="<?=site_url('preguntas/alternativas/crear/'.$pregunta->id) ?>">
            <fieldset>
                <legend>Ingresar nueva alternativa</legend>
                <label>
                    <span>Texto</span>
                    <input type="text" name="alternativa[texto]" required>
                </label>
                <button type="submit">Continuar</button>
            </fieldset>
        </form>
        <table>
            <caption>Alternativas existentes</caption>
            <thead>
                <tr>
                    <th>Texto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
				<?php foreach($alternativas as $item): ?>
                <tr>
                    <td><?=htmlspecialchars($item->texto) ?></td>
                    <td>
                        <a href="<?=site_url('preguntas/alternativas/descriptores/'.$item->id) ?>">Modificar</a>
                        <a href="<?=site_url('preguntas/alternativas/eliminar/'.$item->id) ?>" onclick="return confirm('¿Está seguro que desea eliminar la alternativa?');">Eliminar</a>
                    </td>
                </tr>
				<?php endforeach ?>
            </tbody>
    </body>