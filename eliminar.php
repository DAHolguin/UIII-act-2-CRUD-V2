<?php
if (!isset($_GET['id_ventas'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$id_ventas = $_GET['id_ventas'];

$sentencia = $bd->prepare("DELETE FROM ventas WHERE id_ventas = ?;");
$resultado = $sentencia->execute([$id_ventas]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=eliminado');
} else {
    header('Location: index.php?mensaje=error');
}
?>