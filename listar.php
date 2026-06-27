<?php
include("conexion.php");

$sql = "SELECT * FROM suscriptores";
$resultado = $c->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Gabriela Bernachea</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-4">

    <h1 class="text-center">
        Registro de suscriptores
    </h1>

    <br>

    <a href="index.php" class="btn btn-primary">
        Volver al formulario
    </a>

    <br><br>

    <table class="table table-bordered table-hover">

        <tr class="table-info">

            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Idioma</th>
            <th>Estado</th>
            <th>Integridad</th>
            <th>Acciones</th>

        </tr>

        <?php

        while($fila = $resultado->fetch_assoc()){

            $hash = hash("sha256",$fila["nombre"].$fila["email"].$fila["idioma"]);

            if($hash == $fila["hash_integridad"]){

                $integridad = "Correcta";

            }else{

                $integridad = "Alterada";

            }

            if($fila["activo"] == 1){

                $estado = "Activo";

            }else{

                $estado = "Eliminado";

            }

        ?>

        <tr>

            <td><?php echo $fila["id"]; ?></td>

            <td><?php echo $fila["nombre"]; ?></td>

            <td><?php echo $fila["email"]; ?></td>

            <td><?php echo $fila["idioma"]; ?></td>

            <td><?php echo $estado; ?></td>

            <td><?php echo $integridad; ?></td>

            <td>

                <a href="editar.php?id=<?php echo $fila["id"]; ?>" class="btn btn-warning btn-sm">
                    Editar
                </a>

                <?php

                if($fila["activo"] == 1){

                ?>

                <a href="eliminar.php?id=<?php echo $fila["id"]; ?>" class="btn btn-danger btn-sm">
                    Eliminar
                </a>

                <?php

                }

                ?>

            </td>

        </tr>

        <?php

        }

        ?>

    </table>

</div>

</body>

</html>

<?php

$c->close();

?>