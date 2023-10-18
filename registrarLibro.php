<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtTitulo"]) || empty($_POST["txtAutor"]) || empty($_POST["txtGenero"]) || empty($_POST["txtFechaPublicacion"]) || empty($_POST["txtEditorial"]) || empty($_POST["txtISBN"])) {
    header('Location: libros.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$titulo = $_POST["txtTitulo"];
$autor = $_POST["txtAutor"];
$genero = $_POST["txtGenero"];
$fecha_publicacion = $_POST["txtFechaPublicacion"];
$editorial = $_POST["txtEditorial"];
$isbn = $_POST["txtISBN"];

$sentencia = $bd->prepare("INSERT INTO   libro(titulo,autor,genero,fecha_publicacion,editorial,isbn) VALUES (?,?,?,?,?,?);");
$resultado = $sentencia->execute([$titulo, $autor, $genero, $fecha_publicacion, $editorial, $isbn]);

if ($resultado) {
    header('Location: libros.php?mensaje=registrado');
} else {
    header('Location: libros.php?mensaje=error');
    exit();
}

