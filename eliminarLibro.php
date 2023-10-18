<?php
if (isset($_GET['codigo'])) {
    // Verifica si se ha proporcionado el parámetro 'codigo' en la URL.
    
    include 'model/conexion.php';
    // Incluye el archivo de conexión a la base de datos.

    $codigo = $_GET['codigo'];
    // Obtiene el valor del parámetro 'codigo' de la URL.

    $sentencia = $bd->prepare("DELETE FROM libro WHERE id = ?");
    // Prepara una sentencia SQL para eliminar una fila de la tabla 'persona' donde el ID coincide con el valor proporcionado.

    $resultado = $sentencia->execute([$codigo]);
    // Ejecuta la sentencia SQL, pasando el valor del 'codigo' como parámetro.

    if ($resultado === TRUE) {
        // Verifica si la ejecución de la sentencia fue exitosa (devuelve true/false).
        header('Location: libros.php?mensaje=eliminado');
       
    } else {
        header('Location: libros.php?mensaje=error');
        
	}
} else {
    header('Location: libros.php?mensaje=error');

}
?>