<?php

include("conexion.php");

if(isset($_GET["id"])){

    $id = $_GET["id"];

    $stmt = $c->prepare("UPDATE suscriptores SET activo = 0 WHERE id = ?");

    $stmt->bind_param("i", $id);

    if($stmt->execute()){

        // Registrar auditoría
        $usuario = "admin";
        $accion = "SOFT DELETE";
        $tabla = "suscriptores";

        $auditoria = $c->prepare("INSERT INTO auditoria(usuario, fecha_hora, accion, tabla_cambiada, id_registro) VALUES (?, NOW(), ?, ?, ?)");

        $auditoria->bind_param("sssi", $usuario, $accion, $tabla, $id);

        $auditoria->execute();

        $auditoria->close();

        echo "<h2>Registro eliminado correctamente.</h2>";

        echo "<br>";

        echo "<a href='listar.php' class='btn btn-primary'>Volver al listado</a>";

    }else{

        echo "Error al eliminar el registro.";

    }

    $stmt->close();

}else{

    echo "No se recibió ningún ID.";

}

$c->close();

?>