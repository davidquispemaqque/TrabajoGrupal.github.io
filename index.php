<!DOCTYPE html>
<body>
    <link rel="stylesheet" href="styles.css">
    <video autoplay muted loop id="video-background">
        <source src="http://localhost/Gym%20video.mp4" type="video/mp4">
    </video>
</body>
</html>
<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from persona");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-10">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Fecha inscripcion</th>
                                <th scope="col">Tiempo menbresia</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Monto. pagar</th>
                                <th scope="col">DNI</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($persona as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->nombres; ?></td>
                                <td><?php echo $dato->apellidos; ?></td>
                                <td><?php echo $dato->f_inscripcion; ?></td>
                                <td><?php echo $dato->t_menbresia; ?></td>
                                <td><?php echo $dato->edad; ?></td>
                                <td><?php echo $dato->celular; ?></td>
                                <td><?php echo $dato->monto_pagar; ?></td>
                                <td><?php echo $dato->DNI; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a class="text-primary" href="agregarPromocion.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4 ms-md-auto">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombres: </label>
                        <input type="text" class="form-control" name="txtNombres" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" name="txtApellidos" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de inscripcion: </label>
                        <input type="date" class="form-control" name="txtF_inscripcion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tiempo de menbresia: </label>
                        <input type="number" class="form-control" name="txtT_menbresia" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="text" class="form-control" name="txtEdad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="number" class="form-control" name="txtCelular" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monto a pagar: </label>
                        <input type="number" class="form-control" name="txtMonto_pagar" step="0.01" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DNI: </label>
                        <input type="number" class="form-control" name="DNI" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                        
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>