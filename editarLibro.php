<?php include 'template/header.php' ?>
<?php
    if(!isset($_GET['codigo'])){
        header('Location: libros.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from libro where id = ?;");
    $sentencia ->execute([$codigo]);    
    $libro = $sentencia->fetch(PDO::FETCH_OBJ);
    
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos del libro:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Título: </label>
                        <input type="text" class="form-control" name="txtTitulo" required 
                        value="<?php echo $libro->titulo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor: </label>
                        <input type="text" class="form-control" name="txtAutor" autofocus required
                        value="<?php echo $libro->autor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Género: </label>
                        <input type="text" class="form-control" name="txtGenero" autofocus required
                        value="<?php echo $libro->genero; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Publicación: </label>
                        <input type="date" class="form-control" name="txtFechaPublicacion" autofocus required
                        value="<?php echo $libro->fecha_publicacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editorial: </label>
                        <input type="text" class="form-control" name="txtEditorial" autofocus required
                        value="<?php echo $libro->editorial; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ISBN: </label>
                        <input type="text" class="form-control" name="txtISBN" autofocus required
                        value="<?php echo $libro->isbn; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $libro->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'template/footer.php' ?>