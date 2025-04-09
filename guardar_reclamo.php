<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php'; // Cargar Composer autoload

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('conexion.php'); // Incluir archivo de conexión a la base de datos

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
        echo "Reclamo registrado exitosamente.";

        // Enviar correo con PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP de Gmail
            $mail->SMTPAuth   = true;
            $mail->Username   = '@gmail'; // Tu correo Gmail
            $mail->Password   = 'tu contraselña aca'; // Tu contraseña o contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Configuración del correo
            $mail->setFrom('g@gmail.com', 'Soporte de Reclamos'); // Remitente
            $mail->addAddress($email, "$nombre $apellido_paterno $apellido_materno"); // Correo del cliente

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Confirmacion de Recepcion de Reclamo';
            $mail->Body    = "
                <p>Hola <strong>$nombre $apellido_paterno $apellido_materno</strong>,</p>
                <p>Hemos recibido tu reclamo con los siguientes datos:</p>
                <ul>
                    <li><strong>Tipo de Documento:</strong> $tipo_documento</li>
                    <li><strong>Número de Documento:</strong> $numero_documento</li>
                    <li><strong>Nombre Completo:</strong> $nombre $apellido_paterno $apellido_materno</li>
                    <li><strong>Dirección:</strong> $direccion</li>
                    <li><strong>Teléfono:</strong> $telefono</li>
                    <li><strong>Celular:</strong> $celular</li>
                    <li><strong>Fax:</strong> $fax</li>
                    <li><strong>Ruta de Viaje:</strong> $ruta_viaje</li>
                    <li><strong>Padre/Madre:</strong> $padre_madre</li>
                    <li><strong>Bien Contratado:</strong> $bien_contratado</li>
                    <li><strong>Tipo de Comprobante:</strong> $tipo_comprobante</li>
                    <li><strong>Serie del Comprobante:</strong> $serie_comprobante</li>
                    <li><strong>Número del Comprobante:</strong> $numero_comprobante</li>
                    <li><strong>Monto:</strong> $monto</li>
                    <li><strong>Reclamo:</strong> $reclamo</li>
                    <li><strong>Detalle:</strong> $detalle</li>
                    <li><strong>Tipo de Acción:</strong> $tipo_accion</li>
                </ul>
                <p>Gracias por contactarnos. Nos pondremos en contacto contigo pronto.</p>
            ";

            // Enviar el correo
            $mail->send();
            echo "Correo de confirmación enviado a $email.";
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error al registrar el reclamo: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
