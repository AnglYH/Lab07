<?php include 'template/header.php' ?>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['usuario'])) {
        header('Location: libros.php');
    }
?>

<!DOCTYPE html> 
<html>
<head>
    <title>Ingresar Datos</title>
    <style>
    .card-container {
        display: flex;
        justify-content: center; /* Centra horizontalmente los elementos */
        align-items: center;
        margin: auto 70%;
        width: 150%;
        height: 70vh;

    }
    .col-md-4 {
        display: inline-block; /* Agrega un margen entre los elementos */
        text-align: center; /* Centra horizontalmente los elementos */
    }
    .card {
        margin: 0 10px; /* Agrega margen a los elementos si es necesario */
        padding: 20px;
        border: 3px solid lightblue;
        border-radius: 10px;
    }
</style>
</head>
<body>  
    <div class="col-md-4 ">
        <?php if (isset($_GET['errorLogin'])): ?>
        <div class="alert alert-danger">El usuario no existe</div>
        <?php endif; ?>
        <div class="card-container">
            <div class="card">  
                <h2>Ingresar</h2>
                <p>Ingrese su nombre y número de celular para ingresar</p>
                <form class="p-4" action="ingresar.php" method="POST">
                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" required><br><br>

                    <label class="form-label" for="celular">Celular:</label>
                    <input class="form-control" type="text" name="celular" required><br><br>

                    <input class="btn btn-primary" type="submit" value="Ingresar">
                </form>
            </div>
            <div class="card">
                <h2>Registrarse</h2>
                <p>Ingrese su nombre y número de celular para crear un usuario</p>
                <form class="p-4" action="procesarUsuario.php" method="POST">
                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" required><br><br>

                    <label class="form-label" for="celular">Celular:</label>
                    <input class="form-control" type="text" name="celular" required><br><br>

                    <input class="btn btn-primary" type="submit" value="Registrarse">
                </form>
            </div>
        </div>

    </div>
</body>
</html>

<?php include 'template/footer.php' ?>