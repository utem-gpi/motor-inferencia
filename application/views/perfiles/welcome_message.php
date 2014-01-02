<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Sistema de Selección de Personal</title>
    </head>
    <body>
        <h1>Perfiles</h1>
        <form method="post" action="<?=base_url('perfiles/crear') ?>">
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
                <tr>
                    <td>asdf</td>
                    <td>
                        <a href="#">Modificar</a>
                        <a href="#">Eliminar</a>
                    </td>
                </tr>
            </tbody>
    </body>