<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from persona where id = ?;");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombres: </label>
                        <input type="text" class="form-control" name="txtNombres" required 
                        value="<?php echo $persona->nombres; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" name="txtApellidos" autofocus required
                        value="<?php echo $persona->apellidos; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de inscripcion: </label>
                        <input type="date" class="form-control" name="txtF_inscripcion" autofocus required
                        value="<?php echo $persona->f_inscripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tiempo de menbresia: </label>
                        <input type="text" class="form-control" name="txtT_menbresia" autofocus required
                        value="<?php echo $persona->t_menbresia; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="text" class="form-control" name="txtEdad" autofocus required
                        value="<?php echo $persona->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="number" class="form-control" name="txtCelular" autofocus required
                        value="<?php echo $persona->celular; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monto a pagar: </label>
                        <input type="number" class="form-control" name="txtmonto_pagar" autofocus required
                        value="<?php echo $persona->monto_pagar; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DNI: </label>
                        <input type="number" class="form-control" name="txtDNI" autofocus required
                        value="<?php echo $persona->DNI; ?>">
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>