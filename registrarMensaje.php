<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once 'model/conexion.php';
require_once 'enviarMensaje.php';

$usuario = $_SESSION['usuario'];
$libroId = intval($_GET['libroId']);

$sentencia = $bd->prepare("SELECT * FROM libro WHERE id = ? LIMIT 1");
$sentencia->setFetchMode(PDO::FETCH_ASSOC);
$sentencia->execute([$libroId]);
$libro = $sentencia->fetch();

$mensaje = $usuario['nombre'] . ', le informamos que se ha completado correctamente la compra del libro: ' . $libro['titulo'] ;

$sentencia = $bd->prepare("INSERT INTO mensajePago(mensaje,id_usuario,id_libro) VALUES (?,?,?);");
$resultado = $sentencia->execute([$mensaje, $usuario['id'], $libro['id']]);

if ($resultado) {
    try {
        enviarMensajeWhatsapp($usuario['celular'], $mensaje);
        header('Location: libros.php?sendMessage=success');
    } catch (Exception $e) {
        header('Location: libros.php?sendMessage=error');
    }
}  else {
    header('Location: libros.php?sendMessage=error');
}
