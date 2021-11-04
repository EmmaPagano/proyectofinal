<?php
/*  FUNCION CALCULAR EDAD */
function calcularEdad($fechanacimiento){
    list($ano,$mes,$dia) = explode("-",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;

    if ($mes_diferencia < 0){

        $ano_diferencia --;

    }else if($mes_diferencia == 0){

        if ($dia_diferencia < 0){
            $ano_diferencia --;
        }

    }

    return $ano_diferencia;
}


$title = 'registro';

$notificacion = "";
$error = false;



/* 
    CARGAR SELECT DE MANERA DINAMICA
*/

include('include/conexion.php');

/* SELECT GRUPOS  */
$cmd = $conexion->prepare('SELECT * FROM grupo');
$cmd->execute();
$grupos = $cmd->fetchAll();

/* SELECT LOCALIDADES  */
$cmd = $conexion->prepare('SELECT * FROM localidad');
$cmd->execute();
$localidades = $cmd->fetchAll();



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $domicilio = $_POST["domicilio"];
    $idLocalidad = $_POST["localidad"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $idGrupo = $_POST["grupoSanguineo"];


    if (empty($nombre) || empty($dni) || empty($telefono) || empty($correo) || empty($nombre) || empty($domicilio) || empty($idLocalidad) || empty($fechaNacimiento) || empty($idGrupo)){
        $notificacion = "ERROR: Todos los campos deben completarse";
        $error = true;
    }else{
        $cmd = $conexion->prepare('SELECT * FROM donante WHERE dni = :dni');
        $cmd->execute(array(':dni' => $dni));
        $resultado = $cmd->fetch();

        if(!$resultado){

            if(calcularEdad($fechaNacimiento) < 18){
                $notificacion = "Para registrarse como donante debe tener más de 18 años.";
                $error = true;
            }else{
                $cmd = $conexion->prepare("INSERT INTO donante (nya, dni, telefono, correo, domicilio, fechaNacimiento, idLocalidad, idGrupo) VALUES (:nya,:dni,:telefono,:correo,:domicilio,:fecha,:idLocalidad,:idGrupo)");

                $resultado = $cmd->execute(array(':nya'=>$nombre,':dni'=>$dni,':telefono'=>$telefono,':correo'=>$correo,':domicilio'=>$domicilio,':fecha'=>$fechaNacimiento,':idLocalidad'=>$idLocalidad,':idGrupo'=>$idGrupo));

                if($resultado){
                    $notificacion = "Los datos se han registrado con éxito";
                }else{
                    $error=true;
                    $notificacion = "Ha ocurrido un error al intentar insertar la información";
                }
            }

        }else{
            $notificacion = "Usted ya se encuentra registrado en nuestra base datos.";
            $error = true;
        }
        
    }


}

?>

<?php include('include/header.php'); ?>

<section class="registro-contenedor py-4">
    <div class="container">
    <h2 class="text-center mb-4">Formulario de Registro</h2>
    <?php if(!empty($notificacion)):      ?>
        <?php if($error):      ?>
            <p class="notificacion-error"> <?php echo $notificacion; ?> </p>  
        <?php else: ?>
            <p class="notificacion"> <?php echo $notificacion; ?> </p>
        <?php endif; ?>
    <?php endif; ?>
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <form action="registro.php" method="POST">
                    <div class="mb-3">
                        <label for="" >Nombre completo</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ej: Juan Perez">
                    </div>
                    <div class="mb-3">
                        <label for="" >Número de documento</label>
                        <input type="text" class="form-control" name="dni" placeholder="Ej: 35101107">
                    </div>
                    <div class="mb-3">
                        <label for="" >Número de teléfono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Ej: 011 15414220">
                    </div>
                    <div class="mb-3">
                        <label for="" >Correo electrónico</label>
                        <input type="text" class="form-control" name="correo" placeholder="Ej: juanperez@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="" >Domicilio</label>
                        <input type="text" class="form-control" name="domicilio" placeholder="Ej: Av. Las Heras 1425">
                    </div>
                    <div class="mb-3">
                        <label for="" >Localidad</label>
                        <select class="form-select" name="localidad" aria-label="Select localidad">
                            <option selected>Seleccione su localidad</option>
                            <?php
                                
                                foreach ($localidades as $fila) {
                                    echo '<option value="'.$fila['idLocalidad'].'">'.utf8_encode($fila['localidad']).'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" >Fecha de nacimiento <span class='text-secondary fst-italic'>(mayor de 18 años)</span></label>
                        <input type="date" class="form-control" name="fechaNacimiento">
                    </div>
                    <div class="mb-3">
                        <label for="" >Grupo sanguíneo</label>
                        <select class="form-select" name="grupoSanguineo" aria-label="Select grupo sanguíneo">
                            <option selected>Seleccione su grupo sanguíneo</option>
                            <?php
                                foreach ($grupos as $fila) {
                                    echo '<option value="'.$fila['idGrupo'].'">'.$fila['grupo'].'</option>';
                                }
                            ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-enviar">Registrarme</button>
                </form>
            </div>
        </div>
    </div>
</section>

								
								
								
								
								
								
								


<?php include('include/footer.php'); ?>