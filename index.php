<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("SELECT * FROM ventas");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            Lista de ventas
        </div>
        <div class="p-4">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">ID Empleado</th>
                        <th scope="col">ID Producto</th>
                        <th scope="col">ID Cliente</th>
                        <th scope="col">Total</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col" colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($ventas as $venta) {
                        ?>

                        <tr>
                            <td scope="row">
                                <?php echo $venta->id_ventas; ?>
                            </td>
                            <td>
                                <?php echo $venta->fecha; ?>
                            </td>
                            <td>
                                <?php echo $venta->hora; ?>
                            </td>
                            <td>
                                <?php echo $venta->id_empl; ?>
                            </td>
                            <td>
                                <?php echo $venta->id_prod; ?>
                            </td>
                            <td>
                                <?php echo $venta->id_cli; ?>
                            </td>
                            <td>
                                <?php echo $venta->total; ?>
                            </td>
                            <td>
                                <?php echo $venta->cantidad; ?>
                            </td>
                            <td>
                                <?php echo $venta->precio; ?>
                            </td>
                            <td><a class="text-success" href="editar.php?id_ventas=<?php echo $venta->id_ventas; ?>"><i
                                        class="bi bi-pencil-square"></i></a></td>
                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger"
                                    href="eliminar.php?id_ventas=<?php echo $venta->id_ventas; ?>"><i
                                        class="bi bi-trash"></i></a></td>
                        </tr>

                        <?php
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Ingresar datos:
            </div>
            <form class="p-4" method="POST" action="registrar.php">
                <div class="mb-3">
                    <label class="form-label">Fecha: </label>
                    <input type="text" class="form-control" name="txtFecha" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hora: </label>
                    <input type="text" class="form-control" name="txtHora" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Empleado: </label>
                    <input type="text" class="form-control" name="txtIdEmpl" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Producto: </label>
                    <input type="text" class="form-control" name="txtIdProd" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ID Cliente: </label>
                    <input type="text" class="form-control" name="txtIdCli" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total: </label>
                    <input type="text" class="form-control" name="txtTotal" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cantidad: </label>
                    <input type="text" class="form-control" name="txtCantidad" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio: </label>
                    <input type="text" class="form-control" name="txtPrecio" autofocus required>
                </div>
                <div class="d-grid">
                    <input type="hidden" name="oculto" value="1">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>