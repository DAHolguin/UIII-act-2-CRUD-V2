<?php
print_r($_POST);
if(!isset($_POST['id_ventas'])){
    header('Location: index.php?mensaje=error');
}

include 'model/conexion.php';
$id_ventas = $_POST['id_ventas'];
$fecha = $_POST['txtFecha'];
$hora = $_POST['txtHora'];
$id_empl = $_POST['txtIdEmpl'];
$id_prod = $_POST['txtIdProd'];
$id_cli = $_POST['txtIdCli'];
$total = $_POST['txtTotal'];
$cantidad = $_POST['txtCantidad'];
$precio = $_POST['txtPrecio'];

$sentencia = $bd->prepare("UPDATE ventas SET fecha = ?, hora = ?, id_empl = ?, id_prod = ?, id_cli = ?, total = ?, cantidad = ?, precio = ? WHERE id_ventas = ?;");
$resultado = $sentencia->execute([$fecha, $hora, $id_empl, $id_prod, $id_cli, $total, $cantidad, $precio, $id_ventas]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=editado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
?>
