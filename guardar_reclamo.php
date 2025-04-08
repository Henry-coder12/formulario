<?php
include('conexion.php');  // Incluir la conexión a la base de datos

// Obtener los datos del formulario
$tipo_documento = $_POST['tipo_documento'];
$numero_documento = $_POST['numero_documento'];
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$fax = $_POST['fax'];
$ruta_viaje = $_POST['ruta_viaje'];
$padre_madre = $_POST['padre_madre'];
$bien_contratado = $_POST['bien_contratado'];
$descripcion = $_POST['descripcion'];
$tipo_comprobante = $_POST['tipo_comprobante'];
$serie_comprobante = $_POST['serie_comprobante'];
$numero_comprobante = $_POST['numero_comprobante'];
$reclamo = $_POST['reclamo'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO formulario_reclamo (tipo_documento, numero_documento, nombre, apellido_paterno, apellido_materno, email, direccion, telefono, celular, fax, ruta_viaje, padre_madre, bien_contratado, descripcion, tipo_comprobante, serie_comprobante, numero_comprobante, reclamo)
VALUES ('$tipo_documento', '$numero_documento', '$nombre', '$apellido_paterno', '$apellido_materno', '$email', '$direccion', '$telefono', '$celular', '$fax', '$ruta_viaje', '$padre_madre', '$bien_contratado', '$descripcion', '$tipo_comprobante', '$serie_comprobante', '$numero_comprobante', '$reclamo')";

if ($conn->query($sql) === TRUE) {
    echo "Reclamo registrado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();  // Cerrar la conexión
?>
