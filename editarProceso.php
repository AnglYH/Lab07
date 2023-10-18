<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: libros.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $titulo = $_POST['txtTitulo'];
    $autor = $_POST['txtAutor'];
    $genero = $_POST['txtGenero'];
    $fecha_publicacion = $_POST['txtFechaPublicacion'];
    $editorial = $_POST['txtEditorial'];
    $isbn = $_POST['txtISBN'];

    $sentencia = $bd->prepare("UPDATE libro SET titulo = ?, autor = ?, genero = ?, fecha_publicacion = ?, editorial = ?, isbn = ? where id = ?;");
    $resultado = $sentencia->execute([$titulo, $autor, $genero, $fecha_publicacion, $editorial, $isbn, $codigo]);

    if ($resultado === TRUE) {
        header('Location: libros.php?mensaje=editado');
    } else {
        header('Location: libros.php?mensaje=error');
        exit();
    }
