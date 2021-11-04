<?php
session_start();

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

$title = 'panel';
$error = false;
$notificacion = "";

// ESTE CONDICIONAL ES PARA ANALIZAR SI EL ADMIN ESTA LOGEADO
if(empty($_SESSION['idUser'])){
    header('location:panel-adm.php');
}

// ESTE CONDICIONAL ES PARA ANALIZAR SI ME LLEGA UNA PETICION GET Y LA VARAIBLE IDUSER LLEGA VACIA, REDIRECCIONO AL PANEL ADM

if($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET['idUser'])){
    header('location:panel-adm.php');
}

include('../include/conexion.php');
// CAPTURO EL ID DEL USUARIO EN UNA VARIABLE
if(isset($_GET['idUser'])){
    $idUser = $_GET['idUser'];
    /* OBTENER DATOS DEL DONANTE */

    $cmd = $conexion->prepare('SELECT * FROM donante
        INNER JOIN localidad ON localidad.idLocalidad = donante.idLocalidad
        INNER JOIN grupo ON grupo.idGrupo = donante.idGrupo WHERE idDonante = :idDonante');
    $cmd->execute(array(':idDonante' => $idUser));
    $resultado = $cmd->fetch();
}

    /* 
    CARGAR SELECT DE MANERA DINAMICA
    */
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
    $resultado['nya'] = $nombre;
    $dni = $_POST["dni"];
    $resultado['dni'] = $dni;
    $telefono = $_POST["telefono"];
    $resultado['telefono'] = $telefono;
    $correo = $_POST["correo"];
    $resultado['correo'] = $correo;
    $domicilio = $_POST["domicilio"];
    $resultado['domicilio'] = $domicilio;
    $idLocalidad = $_POST["localidad"];
    $resultado['idLocalidad'] = $idLocalidad;
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $resultado['fechaNacimiento'] = $fechaNacimiento;
    $idGrupo = $_POST["grupoSanguineo"];
    $resultado['idGrupo'] = $idGrupo;
    $idDonante = $_POST['idDonante'];
    $resultado['idDonante'] = $idDonante;


    if (empty($nombre) || empty($dni) || empty($telefono) || empty($correo) || empty($nombre) || empty($domicilio) || empty($idLocalidad) || empty($fechaNacimiento) || empty($idGrupo) || empty($idDonante)){
        $notificacion = "ERROR: Todos los campos deben completarse";
        $error = true;
    }else{
            if(calcularEdad($fechaNacimiento) < 18){
                $notificacion = "Para registrarse como donante debe tener más de 18 años.";
                $error = true;
            }else{
                $cmd = $conexion->prepare("UPDATE donante SET nya = :nya, dni=:dni, telefono = :telefono, correo = :correo,domicilio = :domicilio,fechaNacimiento = :fecha,idLocalidad = :idLocalidad,idGrupo = :idGrupo WHERE idDonante = :idDonante");
                $resultado = $cmd->execute(array(':nya'=>$nombre,':dni'=>$dni,':telefono'=>$telefono,':correo'=>$correo,':domicilio'=>$domicilio,':fecha'=>$fechaNacimiento,':idLocalidad'=>$idLocalidad,':idGrupo'=>$idGrupo, 'idDonante' => $idDonante));
                if($cmd->rowCount() > 0){
                    $notificacion = "Los datos se han guardado con éxito";
                    header('location:panel-adm.php');
                }else{
                    $error=true;
                    $notificacion = "Ha ocurrido un error al intentar insertar la información";
                }
            }
        
    }

}


?>


<?php include('../include/header-adm.php'); ?>

<section class="form-modificar py-4">
    <div class="container">
    <h2 class="text-center mb-4">Modificar datos del donantes</h2>

    <?php if(!empty($notificacion)):      ?>
        <?php if($error):      ?>
            <p class="notificacion-error"> <?php echo $notificacion; ?> </p>  
        <?php else: ?>
            <p class="notificacion"> <?php echo $notificacion; ?> </p>
        <?php endif; ?>
    <?php endif; ?>

        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <form action="modificar.php" method="POST">
                    <input type="hidden" name="idDonante" value="<?php echo $resultado['idDonante'] ?>">
                <div class="mb-3">
                        <label for="" >Nombre completo</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ej: Juan Perez" value="<?php echo $resultado['nya']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" >Número de documento</label>
                        <input type="text" class="form-control" name="dni" placeholder="Ej: 35101107" value="<?php echo $resultado['dni']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" >Número de teléfono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Ej: 011 15414220" value="<?php echo $resultado['telefono']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" >Correo electrónico</label>
                        <input type="text" class="form-control" name="correo" placeholder="Ej: juanperez@gmail.com" value="<?php echo $resultado['correo']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" >Domicilio</label>
                        <input type="text" class="form-control" name="domicilio" placeholder="Ej: Av. Las Heras 1425" value="<?php echo utf8_encode($resultado['domicilio']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" >Localidad</label>
                        <select class="form-select" name="localidad" aria-label="Select localidad">
                            <option selected>Seleccione su localidad</option>
                            <?php
                                
                                foreach ($localidades as $fila) {

                                    if($fila['idLocalidad'] == $resultado['idLocalidad']){
                                        echo '<option value="'.$fila['idLocalidad'].'" selected>'.utf8_encode($fila['localidad']).'</option>';
                                    }else{
                                        echo '<option value="'.$fila['idLocalidad'].'">'.utf8_encode($fila['localidad']).'</option>';
                                    }
                                    
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" >Fecha de nacimiento <span class='text-secondary fst-italic'>(mayor de 18 años)</span></label>
                        <input type="date" class="form-control" name="fechaNacimiento" value="<?php echo $resultado['fechaNacimiento']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" >Grupo sanguíneo</label>
                        <select class="form-select" name="grupoSanguineo" aria-label="Select grupo sanguíneo">
                            <option selected>Seleccione su grupo sanguíneo</option>
                            <?php
                                foreach ($grupos as $fila) {
                                    if($fila['idGrupo'] == $resultado['idGrupo']){
                                        echo '<option value="'.$fila['idGrupo'].'" selected>'.$fila['grupo'].'</option>';
                                    }else{
                                        echo '<option value="'.$fila['idGrupo'].'">'.$fila['grupo'].'</option>';
                                    }
                                    
                                }
                            ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-enviar">Guardar</button>
              
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('../include/footer.php'); ?>