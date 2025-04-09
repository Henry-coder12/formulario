<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php'; // Cargar Composer autoload

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('conexion.php'); // Incluir archivo de conexión a la base de datos

header('Content-Type: application/json'); // Configurar respuesta como JSON

$response = [
    'success' => false,
    'message' => ''
];

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

    try {
        // Guardar datos en la base de datos
        $stmt = $conn->prepare("INSERT INTO formulario_reclamo (
            tipo_documento, numero_documento, nombre, apellido_paterno, apellido_materno, email, direccion, telefono, celular, fax, ruta_viaje,
            padre_madre, bien_contratado, descripcion, tipo_comprobante, serie_comprobante, numero_comprobante, monto, reclamo, detalle, tipo_accion
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssssssssssssssssssss",
            $tipo_documento, $numero_documento, $nombre, $apellido_paterno, $apellido_materno, $email, $direccion, $telefono, $celular, $fax,
            $ruta_viaje, $padre_madre, $bien_contratado, $descripcion, $tipo_comprobante, $serie_comprobante, $numero_comprobante, $monto,
            $reclamo, $detalle, $tipo_accion
        );

        if ($stmt->execute()) {
            // Enviar correo con PHPMailer
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'henryalejandro.mg@gmail.com'; // Tu correo Gmail
                $mail->Password   = 'sngc shyt tzog apxs'; // Contraseña o contraseña de aplicación
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('tu_correo@gmail.com', 'Soporte de Reclamos');
                $mail->addAddress($email, "$nombre $apellido_paterno $apellido_materno");

                $mail->isHTML(true);
                $mail->Subject = 'Confirmación de Recepción de Reclamo';
                $mail->Body    = "Hemos recibido tu reclamo. Nos pondremos en contacto contigo pronto.";

                $mail->send();

                $response['success'] = true;
                $response['message'] = "Reclamo registrado exitosamente y correo enviado a $email.";
            } catch (Exception $e) {
                $response['message'] = "Reclamo registrado, pero ocurrió un error al enviar el correo: {$mail->ErrorInfo}";
            }
        } else {
            $response['message'] = "Error al registrar el reclamo: " . $stmt->error;
        }

        $stmt->close();
    } catch (Exception $e) {
        $response['message'] = "Error en el servidor: " . $e->getMessage();
    }

    $conn->close();
}

echo json_encode($response); // Responder con JSON
exit;
?>