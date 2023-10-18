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
</head>
<body>  
    <div>
        <?php if (isset($_GET['errorLogin'])): ?>
        <div class="alert alert-danger">El usuario no existe</div>
        <?php endif; ?>
        <div>
            <h2>Ingresar</h2>
            <p>Ingrese su nombre y número de celular para ingresar</p>
            <form action="ingresar.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required><br><br>

                <label for="celular">Celular:</label>
                <input type="text" name="celular" required><br><br>

                <input type="submit" value="Ingresar">
            </form>
        </div>
        <div>
            <h2>Registrarse</h2>
            <p>Ingrese su nombre y número de celular para crear un usuario</p>
            <form action="procesarUsuario.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required><br><br>

                <label for="celular">Celular:</label>
                <input type="text" name="celular" required><br><br>

                <input type="submit" value="Registrarse">
            </form>
        </div>
    </div>
</body>
</html>

<?php include 'template/footer.php' ?>