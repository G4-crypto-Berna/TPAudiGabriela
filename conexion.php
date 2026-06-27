<?php
    $host = "localhost";

    $user = "root";

    $pass = "";

    $base = "marketing";

    $c = new mysqli($host, $user, $pass, $base);

    if ($c->connect_error) die("Error de conexión: " . $c->connect_error);
    

?>