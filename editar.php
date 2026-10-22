<?php
// Activar los errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexion.php");

// Si se envió el formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $idioma = $_POST["idioma"];

    // Generar nuevamente el hash
    $hash = hash("sha256",$nombre.$email.$idioma);

    // Actualizar el registro
    $stmt = $c->prepare("UPDATE suscriptores SET nombre=?, email=?, idioma=?, hash_integridad=? WHERE id=?");

    $stmt->bind_param("ssssi",$nombre,$email,$idioma,$hash,$id);

    if($stmt->execute()){

        // Registrar auditoría
        $usuario = "admin";
        $accion = "UPDATE";
        $tabla = "suscriptores";

        $auditoria = $c->prepare("INSERT INTO auditoria(usuario,fecha_hora,accion,tabla_cambiada,id_registro) VALUES (?,NOW(),?,?,?)");

        $auditoria->bind_param("sssi",$usuario,$accion,$tabla,$id);

        $auditoria->execute();

        $auditoria->close();

        echo "<h2>Registro actualizado correctamente.</h2>";

        echo "<a href='listar.php'>Volver al listado</a>";

    }else{

        echo "Error al actualizar.";

    }

    $stmt->close();

}else{

    // Obtener el registro
    $id = $_GET["id"];

    $sql = "SELECT * FROM suscriptores WHERE id=$id";

    $resultado = $c->query($sql);

    $fila = $resultado->fetch_assoc();

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Editar Suscriptor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container mt-4">

        <h2>Editar Suscriptor</h2>

        <form action="editar.php" method="post">

            <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">

            <div class="mb-3">

                <label>Nombre</label>

                <input type="text" class="form-control" name="nombre" value="<?php echo $fila["nombre"]; ?>">

            </div>

            <div class="mb-3">

                <label>Email</label>

                <input type="email" class="form-control" name="email" value="<?php echo $fila["email"]; ?>">

            </div>

            <div class="mb-3">

                <label>Idioma</label>

                <select class="form-control" name="idioma">

                    <option value="es" <?php if($fila["idioma"]=="es"){ echo "selected"; } ?>>Español</option>

                    <option value="en" <?php if($fila["idioma"]=="en"){ echo "selected"; } ?>>Inglés</option>

                    <option value="br" <?php if($fila["idioma"]=="br"){ echo "selected"; } ?>>Portugués</option>

                </select>

            </div>

            <button class="btn btn-success" type="submit">

                Guardar Cambios

            </button>

            <a href="listar.php" class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</body>

</html>

<?php

}

$c->close();

?>