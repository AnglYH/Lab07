<?php
$contrasena = "tecsup2023";
$usuario = "tecsup";  
$nombre_bd = "crud";    

try {
    $bd = new PDO (
        'mysql:host=localhost;
        dbname='.$nombre_bd,
        $usuario,
        $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (Exception $e) {
    echo "Error de conexión ".$e->getMessage();
}