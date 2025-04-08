<form id="formulario" method="POST" action="procesar_formulario.php">
    <!-- Campos del formulario -->
    
    <label for="tipo_documento">Tipo de Documento:</label>
    <input type="text" id="tipo_documento" name="tipo_documento" required>
    
    <label for="numero_documento">Número de Documento:</label>
    <input type="text" id="numero_documento" name="numero_documento" required>
    
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    
    <label for="apellido_paterno">Apellido Paterno:</label>
    <input type="text" id="apellido_paterno" name="apellido_paterno" required>
    
    <label for="apellido_materno">Apellido Materno:</label>
    <input type="text" id="apellido_materno" name="apellido_materno" required>
    
    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" required>
    
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono">
    
    <label for="celular">Celular:</label>
    <input type="text" id="celular" name="celular">
    
    <label for="fax">Fax:</label>
    <input type="text" id="fax" name="fax">
    
    <label for="ruta_viaje">Ruta de Viaje:</label>
    <input type="text" id="ruta_viaje" name="ruta_viaje">
    
    <label for="padre_madre">Padre/Madre:</label>
    <input type="text" id="padre_madre" name="padre_madre">
    
    <label for="bien_contratado">Bien Contratado:</label>
    <input type="text" id="bien_contratado" name="bien_contratado">
    
    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"></textarea>
    
    <label for="tipo_comprobante">Tipo de Comprobante:</label>
    <input type="text" id="tipo_comprobante" name="tipo_comprobante">
    
    <label for="serie_comprobante">Serie de Comprobante:</label>
    <input type="text" id="serie_comprobante" name="serie_comprobante">
    
    <label for="numero_comprobante">Número de Comprobante:</label>
    <input type="text" id="numero_comprobante" name="numero_comprobante">
    
    <label for="monto">Monto:</label>
    <input type="number" id="monto" name="monto" step="0.01">
    
    <label for="reclamo">Reclamo:</label>
    <textarea id="reclamo" name="reclamo"></textarea>
    
    <button type="submit">Enviar</button>
</form>
