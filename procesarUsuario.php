<?php
// Verifica si se enviaron datos a través del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta a la base de datos
    include_once "model/conexion.php";

    // Obtiene los datos del formulario
    $nombre = $_POST["nombre"];
    $celular = $_POST["celular"];

    // Inserta los datos en la tabla 'usuario'
    $consulta = "INSERT INTO usuario (nombre, celular) VALUES (?, ?)";
    $sentencia = $bd->prepare($consulta);
    $resultado = $sentencia->execute([$nombre, $celular]);

    // Cierra la conexión a la base de datos
    $bd = null;

    // Redirige a 'libros.php' después de almacenar los datos
    if ($resultado) {
        header("Location: libros.php?mensaje=registrado");
    } else {
        header("Location: libros.php?mensaje=error");
    }
}
?>
