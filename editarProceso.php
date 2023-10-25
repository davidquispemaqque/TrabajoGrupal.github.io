<?php
print_r($_POST);
if (!isset($_POST['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_POST['codigo'];
$nombres = $_POST['txtNombres'];
$apellidos = $_POST['txtApellidos'];
$f_inscripcion = $_POST['txtF_inscripcion'];
$t_menbresia = $_POST['txtT_menbresia']; // Campo corregido: txtF_menbresia
$edad = $_POST["txtEdad"];
$celular = $_POST['txtCelular'];
$monto_pagar = $_POST["txtmonto_pagar"]; // Campo corregido: txtmonto_pagar
$DNI = $_POST['txtDNI'];

// Corrige la consulta SQL: agrega el signo de interrogación faltante para monto_pagar
$sentencia = $bd->prepare("UPDATE persona SET nombres = ?, apellidos = ?, f_inscripcion = ?, t_menbresia = ?, edad = ?, celular = ?, monto_pagar = ?, DNI = ? WHERE id = ?");
$resultado = $sentencia->execute([$nombres, $apellidos, $f_inscripcion, $t_menbresia, $edad, $celular, $monto_pagar, $DNI, $codigo]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=editado');
    exit();
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
?>
