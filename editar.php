<?php include 'template/header.php' ?>

<?php
if(!isset($_GET['id_ventas'])){
    header('Location: index.php?mensaje=error');
    exit();
}

include_once 'model/conexion.php';
$id_ventas = $_GET['id_ventas'];

$sentencia = $bd->prepare("SELECT * FROM ventas WHERE id_ventas = ?;");
$sentencia->execute([$id_ventas]);
$venta = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="text" class="form-control" name="txtFecha" required 
                        value="<?php echo $venta->fecha; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora: </label>
                        <input type="text" class="form-control" name="txtHora" autofocus required
                        value="<?php echo $venta->hora; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID Empleado: </label>
                        <input type="text" class="form-control" name="txtIdEmpl" autofocus required
                        value="<?php echo $venta->id_empl; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID Producto: </label>
                        <input type="text" class="form-control" name="txtIdProd" autofocus required
                        value="<?php echo $venta->id_prod; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID Cliente: </label>
                        <input type="text" class="form-control" name="txtIdCli" autofocus required
                        value="<?php echo $venta->id_cli; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total: </label>
                        <input type="text" class="form-control" name="txtTotal" autofocus required
                        value="<?php echo $venta->total; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad: </label>
                        <input type="text" class="form-control" name="txtCantidad" autofocus required
                        value="<?php echo $venta->cantidad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="text" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $venta->precio; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id_ventas" value="<?php echo $venta->id_ventas; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
