<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reclamo</title>
</head>
<body>
    <h1>Formulario de Reclamo</h1>
    <form id="formulario" action="guardar_reclamo.php" method="POST">
        <label for="tipo_documento">Tipo de Documento:</label>
        <input type="text" id="tipo_documento" name="tipo_documento" required><br><br>

        <label for="numero_documento">Número de Documento:</label>
        <input type="text" id="numero_documento" name="numero_documento" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" required><br><br>

        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" id="apellido_materno" name="apellido_materno" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion"><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono"><br><br>

        <label for="celular">Celular:</label>
        <input type="text" id="celular" name="celular"><br><br>

        <label for="fax">Fax:</label>
        <input type="text" id="fax" name="fax"><br><br>

        <label for="ruta_viaje">Ruta de Viaje:</label>
        <input type="text" id="ruta_viaje" name="ruta_viaje"><br><br>

        <label for="padre_madre">Padre o Madre:</label>
        <input type="text" id="padre_madre" name="padre_madre"><br><br>

        <label for="bien_contratado">Bien Contratado:</label>
        <input type="text" id="bien_contratado" name="bien_contratado"><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br><br>

        <label for="tipo_comprobante">Tipo de Comprobante:</label>
        <input type="text" id="tipo_comprobante" name="tipo_comprobante"><br><br>

        <label for="serie_comprobante">Serie de Comprobante:</label>
        <input type="text" id="serie_comprobante" name="serie_comprobante"><br><br>

        <label for="numero_comprobante">Número de Comprobante:</label>
        <input type="text" id="numero_comprobante" name="numero_comprobante"><br><br>

        <label for="reclamo">Reclamo:</label>
        <textarea id="reclamo" name="reclamo" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Enviar Reclamo</button>
    </form>
</body>
</html>
