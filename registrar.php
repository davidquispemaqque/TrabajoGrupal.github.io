<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApellidos"]) || empty($_POST["txtF_inscripcion"]) || empty($_POST["txtT_menbresia"]) || empty($_POST["txtEdad"]) || empty($_POST["txtCelular"]) || empty($_POST["txtMonto_pagar"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombres = $_POST["txtNombres"];
$apellidos = $_POST["txtApellidos"];
$f_inscripcion = $_POST["txtF_inscripcion"];
$t_menbresia = $_POST["txtT_menbresia"];
$edad = $_POST["txtEdad"];
$celular = $_POST["txtCelular"];
$monto_pagar = $_POST["txtMonto_pagar"];
$DNI = $_POST["DNI"];

$sentencia = $bd->prepare("INSERT INTO persona (nombres, apellidos, f_inscripcion, t_menbresia, edad, celular, monto_pagar, DNI) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");

$resultado = $sentencia->execute([$nombres, $apellidos, $f_inscripcion, $t_menbresia, $edad, $celular, $monto_pagar,$DNI]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
?>


