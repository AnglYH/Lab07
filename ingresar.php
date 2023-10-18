<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica si se enviaron datos a través del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta a la base de datos
    include_once "model/conexion.php";

    // Obtiene los datos del formulario
    $nombre = $_POST["nombre"];
    $celular = $_POST["celular"];

    // Inserta los datos en la tabla 'usuario'
    $consulta = "INSERT INTO usuario (nombre, celular) VALUES (?, ?)";
    $sentencia = $bd->prepare("SELECT * FROM usuario WHERE nombre = ? AND celular = ? LIMIT 1");
    
    // select first row
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    $sentencia->execute([$nombre, $celular]);
    $resultado = $sentencia->fetch();
    $exists = ($resultado !== false);
    $bd = null;

    if ($exists) {
        $_SESSION['usuario'] = $resultado;
        header('Location: libros.php');
    } else {
        header('Location: index.php?errorLogin');
    }
}
?>
