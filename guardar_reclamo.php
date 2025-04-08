<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reclamación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 900px;
            margin: auto;
        }
        h3 {
            margin-top: 30px;
            color: #333;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        .form-row, .form-row-3 {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        .form-group {
            flex: 1;
            min-width: 200px;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form id="formulario" action="guardar_reclamo.php" method="POST">
        <!-- Sección 1 -->
        <h3>1. Identificación del consumidor reclamante</h3>
        <div class="form-row">
            <div class="form-group">
                <select name="tipo_documento" required>
                    <option value="" disabled selected hidden>Tipo de documento</option>
                    <option value="DNI">DNI</option>
                    <option value="CE">CE</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="numero_documento" placeholder="Número de documento" required>
            </div>
        </div>
        <div class="form-row-3">
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <input type="text" name="apellido_paterno" placeholder="Apellido Paterno" required>
            </div>
            <div class="form-group">
                <input type="text" name="apellido_materno" placeholder="Apellido Materno">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección">
            </div>
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
