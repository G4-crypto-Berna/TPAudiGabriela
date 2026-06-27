<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="style.css">


    <?php
// Activar los errores para depuración
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

// Incluir la conexión a la base de datos
    include('conexion.php');

// Verificamos que los datos vengan del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturamos los datos enviados desde el formulario
        $nombre = $_POST['nombre'] ?? '';
        $email = $_POST['email'] ?? '';
        $idioma = $_POST['idioma'] ?? 'es'; // español por defecto
        $usuario = "admin";

        // Validamos que no estén vacíos
        if (!empty($nombre) && !empty($email)) {

            $hash = hash('sha256', $nombre . $email . $idioma);

            $stmt = $c->prepare("INSERT INTO suscriptores (nombre, email, idioma, hash_integridad) VALUES (?, ?, ?, ?)");
            // Preparamos la consulta SQL (evita inyección SQL)
            $stmt->bind_param("ssss", $nombre, $email, $idioma, $hash);

            if ($stmt->execute()) {

                $idRegistro = $c->insert_id;

                $accion = "INSERT";
                $tabla = "suscriptores";
                $auditoria = $c->prepare("INSERT INTO auditoria (usuario, fecha_hora, accion, tabla_cambiada, id_registro) VALUES (?, NOw(), ?, ?, ?)");

                $auditoria->bind_param("sssi", $usuario, $accion, $tabla, $idRegistro);

                $auditoria->execute();
                $auditoria->close();
                // ✅ Mostrar el mensaje en el idioma correcto
                if ($idioma === 'es') {
                    echo "<h2>✅ ¡El registro se realizo con exito!</h2>";
                    echo "<p>Gracias <strong>$nombre</strong> por suscribirte.</p>";
                    echo "<a href='index.php?idioma=es'>Volver al inicio</a>";
                } elseif ($idioma === 'en') {
                    echo "<h2>✅ Successful registration!</h2>";
                    echo "<p>Thank you, <strong>$nombre</strong>, for subscribing.</p>";
                    echo "<a href='index.php?idioma=en'>Back to home</a>";
                } elseif ($idioma === 'br') {
                    echo "<h2>✅ Registro bem-sucedido!</h2>";
                    echo "<p>Obrigado, <strong>$nombre</strong>, por se inscrever.</p>";
                    echo "<a href='index.php?idioma=br'>Voltar ao início</a>";
                } else {
                    echo "<h2>✅ ¡Registro exitoso!</h2>";
                    echo "<p>Gracias <strong>$nombre</strong> por suscribirte.</p>";
                    echo "<a href='index.php'>Volver al inicio</a>";
                }
            } else {
                echo "<p>❌ Error al guardar los datos: " . $stmt->error . "</p>";
            }

            $stmt->close();
        } else {
            echo "<p>⚠️ Por favor completa todos los campos.</p>";
        }
    } else {
        echo "<p>Acceso no permitido.</p>";
    }

    // Cerramos la conexión
    $c->close();
    ?>

</body>
</html>