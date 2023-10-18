<?php include 'template/header.php' ?>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include_once "model/conexion.php";
    $sentenciaLibro = $bd -> query("select * from libro");
    $libro = $sentenciaLibro->fetchAll(PDO::FETCH_OBJ);

    $usuario = $_SESSION['usuario'];

    if (!isset($usuario)) {
        header('Location: index.php');
    }
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>

            <?php if (isset($_GET['sendMessage'])): ?>
                <div class="alert alert-<?php echo $_GET['sendMessage'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo $_GET['sendMessage'] === 'success' ? 'se ha enviado el mensaje!' : 'No se ha podido enviar el mensaje!' ?></strong>
                </div>
            <?php endif; ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de libros
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Género</th>
                                <th scope="col">Fecha de publicación</th>
                                <th scope="col">Editorial</th>
                                <th scope="col">ISBN</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($libro as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->titulo; ?></td>
                                <td><?php echo $dato->autor; ?></td>
                                <td><?php echo $dato->genero; ?></td>
                                <td><?php echo $dato->fecha_publicacion; ?></td>
                                <td><?php echo $dato->editorial; ?></td>
                                <td><?php echo $dato->isbn; ?></td>
                                <td><a class="text-success" href="editarLibro.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>

                                <td><a class="text-primary" href="registrarMensaje.php?libroId=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
 
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminarLibro.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>    
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrarLibro.php">
                    <div class="mb-3">
                        <label class="form-label">Título: </label>
                        <input type="text" class="form-control" name="txtTitulo" autofocus required>
                    </div>
                    <div class = "mb-3">
                        <label class="form-label">Autor: </label>       
                        <input type="text" class="form-control" name="txtAutor" autofocus required>       
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Género: </label>
                        <input type="text" class="form-control" name="txtGenero" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha publicación: </label>
                        <input type="date" class="form-control" name="txtFechaPublicacion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editorial: </label>
                        <input type="text" class="form-control" name="txtEditorial" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ISBN: </label>
                        <input type="text" class="form-control" name="txtISBN" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>