<?php
include_once '../controlador/conexion.php';
include_once '../email/email_register-user.php';
session_start();
$nombre = $_POST['nombre'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$privilegio = $_POST['privilegio'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

//Declaramos la sentencia SQL
$sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE email = '$email' OR telefono = '$telefono'";
//Preparamos la sentencia para ser ejecutada
$consulta = $pdo->prepare($sql);
$consulta->execute();
//Generamos un arreglo con el metodo fectAll() con toda la informacion de la tabla de la base de datos
$resultado = $consulta->fetchAll();
//Recorremos el arreglo $resultado para poder obtener la informacion del indice que deseamos
foreach ($resultado as $info) {
	//obtenemos el indice contar para asignarlo a una variable
    $contar = $info['contar'];
}
//Creamos una condicion que valide que existe un  usuario con los valores que manda el formulario para que nos deje acceder al sistema
if ($contar>0) {
	header('location: ../errors/error-duplicate-user.php');
} else {
    $sql_agregar = 'INSERT INTO usuarios (nombre,primerApellido,segundoApellido,privilegio,telefono,email) VALUES (?,?,?,?,?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($nombre, $primerApellido, $segundoApellido, $privilegio, $telefono, $email));
    correoRegisterUser($nombre, $primerApellido, $email);
    header('location: ../vistas/usuarios.php');
}
?>