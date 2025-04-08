<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('conexion.php'); // Incluir archivo de conexiÃ³n a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y validar los datos del formulario
    $tipo_documento = $_POST['tipo_documento'] ?? '';
    $numero_documento = $_POST['numero_documento'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido_paterno = $_POST['apellido_paterno'] ?? '';
    $apellido_materno = $_POST['apellido_materno'] ?? '';
    $email = $_POST['email'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $celular = $_POST['celular'] ?? '';
    $fax = $_POST['fax'] ?? '';
    $ruta_viaje = $_POST['ruta_viaje'] ?? '';
    $padre_madre = $_POST['padre_madre'] ?? '';
    $bien_contratado = $_POST['bien_contratado'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $tipo_comprobante = $_POST['tipo_comprobante'] ?? '';
    $serie_comprobante = $_POST['serie_comprobante'] ?? '';
    $numero_comprobante = $_POST['numero_comprobante'] ?? '';
    $monto = $_POST['monto'] ?? '';
    $reclamo = $_POST['reclamo'] ?? '';
    $detalle = $_POST['detalle'] ?? '';
    $tipo_accion = $_POST['tipo_accion'] ?? '';

    // Preparar la consulta para guardar los datos
    $stmt = $conn->prepare("INSERT INTO formulario_reclamo (
        tipo_documento, numero_documento, nombre, apellido_paterno, apellido_materno, 
        email, direccion, telefono, celular, fax, ruta_viaje, padre_madre, 
        bien_contratado, descripcion, tipo_comprobante, serie_comprobante, numero_comprobante, 
        monto, reclamo, detalle, tipo_accion
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "sssssssssssssssssssss",
        $tipo_documento, $numero_documento, $nombre, $apellido_paterno, $apellido_materno,
        $email, $direccion, $telefono, $celular, $fax, $ruta_viaje, $padre_madre,
        $bien_contratado, $descripcion, $tipo_comprobante, $serie_comprobante, $numero_comprobante,
        $monto, $reclamo, $detalle, $tipo_accion
    );

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Reclamo registrado exitosamente.";
    } else {
        echo "Error al registrar el reclamo: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
