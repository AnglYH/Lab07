<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from usuario where id = ?;");
$sentencia->execute([$codigo]);
$usuario = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia_mensaje = $bd->prepare("select * from mensajePago where id_usuario = ?;");
$sentencia_mensaje->execute([$codigo]);
$mensaje = $sentencia_mensaje->fetchAll(PDO::FETCH_OBJ); 
//print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos para Compra : <br><?php echo $usuario->nombre.' '; ?>
                </div>
                <form class="p-4" method="POST" action="registrarMensaje.php">
                    <div class="mb-3">
                        <label class="form-label">Mensaje: </label>
                        <input type="text" class="form-control" name="txtMensaje" autofocus required>
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $usuario->id; ?>"><P></P>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Lista de Libros
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mensaje</th>

                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($mensaje as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->mensaje; ?></td>

                                    <td><a class="text-primary" href="enviarMensaje.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>