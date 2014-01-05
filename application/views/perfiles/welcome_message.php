<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>Sistema de Selección de Personal</title>
    </head>
    <body>
        <h1>Perfiles</h1>
        <form method="post" action="<?=site_url('perfiles/crear') ?>">
            <fieldset>
                <legend>Ingresar nuevo perfil</legend>
                <label>
                    <span>Nombre</span>
                    <input type="text" name="perfil[nombre]" required>
                </label>
                <button type="submit">Continuar</button>
            </fieldset>
        </form>
        <table>
            <caption>Perfiles existentes</caption>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
				<?php foreach($perfiles as $item): ?>
                <tr>
                    <td><?=htmlspecialchars($item->nombre) ?></td>
                    <td>
                        <a href="<?=site_url('perfiles/descriptores/'.$item->id) ?>">Modificar</a>
                        <a href="<?=site_url('perfiles/eliminar/'.$item->id) ?>" onclick="return confirm('¿Está seguro que desea eliminar el perfil?');">Eliminar</a>
                    </td>
                </tr>
				<?php endforeach ?>
            </tbody>
    </body>