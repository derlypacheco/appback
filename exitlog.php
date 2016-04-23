<?php
session_start();
include('inc/block/cnn.php');
mysqli_query($conexion, "update users set user_online = '0' where user = '".$_SESSION['user']."'") or die("Error: ". $conexion->error);
session_destroy();
header("location:./");
?>
