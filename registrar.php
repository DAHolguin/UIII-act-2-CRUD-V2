<?php
//print_r($_POST);
if (
    empty($_POST["oculto"]) || 
    empty($_POST["txtFecha"]) || 
    empty($_POST["txtHora"]) || 
    empty($_POST["txtIdEmpl"]) || 
    empty($_POST["txtIdProd"]) || 
    empty($_POST["txtIdCli"]) || 
    empty($_POST["txtTotal"]) || 
    empty($_POST["txtCantidad"]) || 
    empty($_POST["txtPrecio"])
) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$fecha = $_POST["txtFecha"];
$hora = $_POST["txtHora"];
$id_empl = $_POST["txtIdEmpl"];
$id_prod = $_POST["txtIdProd"];
$id_cli = $_POST["txtIdCli"];
$total = $_POST["txtTotal"];
$cantidad = $_POST["txtCantidad"];
$precio = $_POST["txtPrecio"];

$sentencia = $bd->prepare("INSERT INTO ventas(fecha, hora, id_empl, id_prod, id_cli, total, cantidad, precio) VALUES (?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$fecha, $hora, $id_empl, $id_prod, $id_cli, $total, $cantidad, $precio]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
?>
