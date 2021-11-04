<?php 
session_start();
$title = 'panel';

if(empty($_SESSION['idUser'])){
    header('location:../index.php');
}
include('../include/conexion.php');

if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])){
    $busqueda = $_GET['busqueda'];
    $filtro = $_GET['filtro']; ;
    if($filtro == 'localidad'){
        $cmd = $conexion->prepare('SELECT * FROM donante
        INNER JOIN localidad ON localidad.idLocalidad = donante.idLocalidad
        INNER JOIN grupo ON grupo.idGrupo = donante.idGrupo WHERE localidad = :localidad');
        $cmd->execute(array(':localidad'=>$busqueda));
        $resultado = $cmd->fetchAll();
    }else if($filtro == 'grupo'){
        $cmd = $conexion->prepare('SELECT * FROM donante
        INNER JOIN localidad ON localidad.idLocalidad = donante.idLocalidad
        INNER JOIN grupo ON grupo.idGrupo = donante.idGrupo WHERE grupo = :grupo');
        $cmd->execute(array(':grupo'=>$busqueda));
        $resultado = $cmd->fetchAll();
    }
}else{
    $cmd = $conexion->prepare('SELECT * FROM donante
    INNER JOIN localidad ON localidad.idLocalidad = donante.idLocalidad
    INNER JOIN grupo ON grupo.idGrupo = donante.idGrupo');
    $cmd->execute();
    $resultado = $cmd->fetchAll();
}


?>
<?php include('../include/header-adm.php'); ?>

<section class="tabla py-4">
    <div class="container">
        <h2 class="text-center mb-4">Listado de donantes</h2>
        <div class="btns-busqueda">
            <form action="panel-adm.php" method="GET">
                <div class="mb-3">
                    <input type="text" name="busqueda" placeholder='Ingrese su busqueda'>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="filtro" id="flexRadioDefault1" value="grupo" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Grupo Sanguineo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="filtro" id="flexRadioDefault2" value="localidad">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Localidad
                    </label>
                </div>

            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">NyA</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Domicilio</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Localidad</th>
                        <th scope="col">Grupo Sanguineo</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($resultado){
                            foreach ($resultado as $fila) {
                                $fechaFormat = date('d-m-Y', strtotime($fila['fechaNacimiento']));
                                $fechaFormat = str_replace('-', '/', $fechaFormat);

                                echo ' 
                                <tr>
                                <td>'. utf8_encode($fila['nya']) .'</td>
                                <td>'. $fila['dni'] .'</td>
                                <td>'. $fila['telefono'] .'</td>
                                <td>'. $fila['correo'] .'</td>
                                <td>'. utf8_encode($fila['domicilio']) .'</td>
                                <td>'. $fechaFormat .'</td>
                                <td>'. utf8_encode($fila['localidad']) .'</td>
                                <td>'. $fila['grupo'] .'</td>
                                <td><a href="modificar.php?idUser='.$fila['idDonante'].'">Modificar</a></td>
                                </tr>';
                            }
                        }
                     
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include('../include/footer.php'); ?>