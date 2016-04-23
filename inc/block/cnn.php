<?php
$conexion = new mysqli("localhost", "root", "root", "api");
if ($conexion->connect_errno) {
    echo "Fallo la conexion con MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    exit();
}
?>
