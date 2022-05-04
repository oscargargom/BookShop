<?php 
$contrasena = "usuario";
$usuario = "root";
$nombre_bd = "tiendaLibros";

try {
	$bd = new PDO (
		'mysql:host=dwes.lan;
		dbname='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>