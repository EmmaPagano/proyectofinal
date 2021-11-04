<?php 

$notificacionError = "";
$banderaJS = false;
// ANALIZO SI LLEGO UNA PETICION TIPO POST
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // CAPTURO LOS VALORES QUE LLEGAN DEL FORMULARIO
    $fechaInicio = $_POST['fecha_inicio'];
    $fechaDespido = $_POST['fecha_despido'];
    $sueldo = $_POST['sueldo_max'];
    $preaviso = $_POST['preaviso'];
    $montoLiquidacion = 0;

    // ANALIZO SI HAY ALGUN VALOR VACIO, MUESTRO ERROR
    if(empty($fechaInicio) || empty($fechaDespido) || empty($sueldo) || empty($preaviso) ){
        $notificacionError = "Error: Por favor rellene todos los campos del formulario";
        $banderaJS = true;
    }else if(strtotime($fechaInicio) > strtotime($fechaDespido)){
        $notificacionError = "Error: La fecha de ingreso no puede ser posterior a la fecha de despido.";
        $banderaJS = true;
    }else{
        // SI NO HAY NINGUN VALOR VACIO, INSTACIO LOS OBJETOS PARA PODER USAR EL METODO DIFF
        $fecha1 = new DateTime($fechaInicio);
        $fecha2 = new DateTime($fechaDespido);
        // CALCULO LA DIFERENCIA GENERAL ENTRE LAS FECHAS
        $diferenciaFecha = $fecha2->diff($fecha1);

        // OBTENEMOS LA DIFERENCIA DE MESES
        $difMeses = $diferenciaFecha->format("%m");
        // OBTENEMOS LA DIFERENCIA DE AÑOS PERO LA MULTIPLICAMOS POR 12 Y LO TRANFORMAMOS EN MESES
        $difAnios = $diferenciaFecha->format("%y") * 12;

        // SUMO EL TOTAL DE MESES
        $mesesTotales = $difMeses + $difAnios;
        // CALCULO LOS ANIOS TOTALES
        $anioTotales = $mesesTotales / 12;
        
        // OBTENGO EL RESTO PARA CALCULAR SI DEBO SUMAR 1 AÑO, SI ES QUE TRABAJO 3 MESES O MÁS
        $resto = $anioTotales - floor($anioTotales);

        if ($resto >= 0.25){
            $anioTotales = $anioTotales + 1;
        }

        $anioTotales = floor($anioTotales);

        if ($preaviso == "si"){
            $montoLiquidacion = $anioTotales * $sueldo;
        }else{
            $montoLiquidacion = ($anioTotales * $sueldo) + $sueldo;
        }

        $banderaJS = true;
    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- META DESCRIPTION Y KEYWORDS -->
    <meta name="description"
    content="CONTENIDO A VISUALIZAR EN EL BUSCADOR.">
    <meta name="keywords" content="PALABRAS CLAVES">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />


    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css" />

    <title>Estudio Juridico</title>
</head>

<body>
    <!-- HEADER -->

    <header class="encabezado">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img class="logo-img img-fluid" src="img/logo-transparente.png" alt="" /></a>
            </div>

            <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" href="index.php">Inicio</a>
                            <a class="nav-link" href="#areas">Especialidades</a>
                            <a class="nav-link" href="#team">Equipo</a>
                            <a class="nav-link" href="#form-calculator">Calculadora</a>
                            <a class="nav-link" href="#footer">Contacto</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- FIN HEADER -->

    <!-- WELCOME-MESSAGE -->

    <section class="welcome-message">
        <div class="container">
            <h2 class="text-center text-white">¿Lo despidieron?</h2>
            <a href="#form-calculator" class="btn-calculadora">Calcular Indeminización</a>
        </div>
    </section>
    <!-- FIN WELCOME-MESSAGE -->

    <!-- INICIO MAIN -->
    <main class="main-content my-4">
        <!-- PRESENTATION -->
        <section class="presentation">
            <div class="container container-md-fluid">
                <div class="row">
                    <div class="d-none d-md-block d-xl-none col-md-12">
                        <h3 class="section-title color-titulares">
                            BIENVENIDO A <span class="color-enfasis">ESTUDIO PEQUEÑO</span>
                        </h3>
                        <hr class="separador d-none d-md-block">
                    </div>
                    <div class="col-12 col-md-6">
                        <img class="img-fluid" src="img/foto1.jpg" alt="" />
                    </div>
                    <div class="col-12 col-md-6">
                        <h3 class="section-title color-titulares d-md-none d-xl-block">
                            BIENVENIDO A <span class="color-enfasis">ESTUDIO PEQUEÑO</span>
                        </h3>
                        <hr class="separador d-none d-xl-block" />
                        <p class="section-description color-parrafos d-md-none d-lg-block">
                            Contamos con profesionales especializados en el rubro y una trayectoria de mas de 30 años en
                            Derecho Laboral. Estamos mayormente orientados en la defensa al trabajador, por lo tanto
                            asumimos la defensa en juicio sin costos iniciales. En consecuencia solo se cobrará el 20%
                            del monto que el trabajador perciba. En resumen, solamente cobramos si usted cobra.
                        </p>
                        <div class="presentation-icons">
                            <i class="fa fa-university" aria-hidden="true"></i>
                            <div class="presentation-text">
                                <h4 class="presentation-subtitle">Proteja sus derechos</h4>
                                <p class="color-parrafos">
                                    Nuestra excelencia es garantía del mejor patrocinio que puede recibir.
                                </p>
                            </div>
                        </div>
                        <div class="presentation-icons">
                            <i class="far fa-handshake" aria-hidden="true"></i>
                            <div class="presentation-text">
                                <h4 class="presentation-subtitle">Confianza</h4>
                                <p class="color-parrafos">
                                    La gran mayoría de nuestros clientes llegan recomendados por otros clientes
                                    satisfechos.
                                </p>
                            </div>
                        </div>
                        <div class="presentation-icons">
                            <i class="fas fa-balance-scale" aria-hidden="true"></i>
                            <div class="presentation-text">
                                <h4 class="presentation-subtitle">No está solo</h4>
                                <p class="color-parrafos">
                                    Si nos contrata, tendrá detrás de Usted un enorme equipo altamente calificado.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FIN PRESENTATION -->

        <!-- STATS -->
        <section class="stats">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 stats-container">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <h5 class="counter" data-target="1020">0</h5>
                        <p>Patrocinios en divorcios</p>
                    </div>
                    <div class="col-12 col-md-4 stats-container">
                        <i class="fa fa-university" aria-hidden="true"></i>
                        <h5 class="counter" data-target="1870">0</h5>
                        <p>Casos ganados</p>
                    </div>
                    <div class="col-12 col-md-4 stats-container">
                        <i class="fa fa-laptop" aria-hidden="true"></i>
                        <h5 class="counter" data-target="1450">0</h5>
                        <p>Liquidaciones por mes</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FIN STATS -->

        <!-- PRACTICE AREA -->

        <section class="practice-area" id="areas">
            <div class="container">
                <h3 class="section-title color-titulares">
                    ÁREAS DE <span class="color-enfasis">ESPECIALIDAD</span>
                </h3>
                <hr class="separador" />
                <p class="section-description color-parrafos">
                    No sólo nos destacamos en el Derecho Laboral sino que también ofrecemos asesoramiento jurídico
                    integral.
                </p>

                <div class="row">
                    <div class="col-12 col-md-4 container-area">
                        <img class="img-fluid" src="img/areas-1.jpg" alt="" />
                        <h5>Divorcios</h5>
                        <p class="color-parrafos">
                            Durante esta penosa situación nos encargamos de la división de bienes y velamos por sus
                            demás requerimientos.
                        </p>
                    </div>
                    <div class="col-12 col-md-4 container-area">
                        <img class="img-fluid" src="img/areas-2.jpg" alt="" />
                        <h5>Accidentes de tránsito</h5>
                        <p class="color-parrafos">
                            Si tiene necesidades del fuero Civil o Penal, LawFirm le llevará tranquilidad a lo largo de
                            todo el proceso.
                        </p>
                    </div>
                    <div class="col-12 col-md-4 container-area">
                        <img class="img-fluid" src="img/areas-3.jpg" alt="" />
                        <h5>Seguridad Social</h5>
                        <p class="color-parrafos">
                            Reclamamos las malas liquidaciones de haberes y luchamos para que Usted tenga una jubilación
                            justa.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!--  FIN PRACTICE AREA -->
    </main>
    <!-- FIN MAIN -->

    <!-- OUR TEAM -->
    <section class="our-team" id="team">
        <div class="container">
            <h3 class="section-title color-titulares">
                NUESTRO <span class="color-enfasis">EQUIPO</span>
            </h3>
            <hr class="separador" />
            <p class="section-description color-parrafos">
                Los abogados de LawFirm tienen una sólida trayectoria académica y profesional.
            </p>
            <div class="row">
                <div class="col-12 col-md-3 container-team">
                    <img class="img-fluid" src="img/team-1.jpg" alt="" />
                    <h5>Javiera Álvarez Raso</h5>
                    <p class="color-parrafos">
                        Magíster en Derecho Laboral (Universidad de Belgrano) y Presidente de la Asociación de Abogados
                        Laboralistas de la República Argentina.
                    </p>
                </div>

                <div class="col-12 col-md-3 container-team">
                    <img class="img-fluid" src="img/team-2.jpg" alt="" />
                    <h5>Nicolás Pequeño</h5>
                    <p class="color-parrafos">
                        Doctor en Derecho (Universidad Católica Argentina) graduado con honores y especialista en
                        Accidentes del Trabajo.
                    </p>
                </div>

                <div class="col-12 col-md-3 container-team">
                    <img class="img-fluid" src="img/team-3.jpg" alt="" />
                    <h5>Catalina Diakow</h5>
                    <p class="color-parrafos">
                        Especialista en Conciliaciones y ex decana de la Facultad de Derecho de la Universidad de
                        Córdoba.
                    </p>
                </div>

                <div class="col-12 col-md-3 container-team">
                    <img class="img-fluid" src="img/team-4.jpg" alt="" />
                    <h5>Eduardo Rivera</h5>
                    <p>
                        Magíster en Derecho Civil (Universidad Torcuato Di Tella) y ex asesor del Directorio del Banco
                        Interamericano de Desarrollo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FIN OUR TEAM -->

    <section class="calculator" id="form-calculator">
        <div class="container">
            <h3 class="section-title color-titulares">
                CALCULE SU <span class="color-enfasis">LIQUIDACIÓN</span>
            </h3>
            <hr class="separador" />
            <div class="row">
                <div class="col-12 col-md-5">

                    <form class="form-calculadora" action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="fechaInicio" class="form-label">Fecha de ingreso:</label>
                            <input name="fecha_inicio" id="fechaInicio" type="date" class="form-control"
                                aria-describedby="dateHelp" required />
                            <div id="dateHelp" class="form-text">
                                Indique fecha de ínicio de la relación laboral
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="fechaDespido" class="form-label">Fecha de despido:</label>
                            <input name="fecha_despido" id="fechaDespido" type="date" class="form-control"
                                aria-describedby="dateHelp2" required />
                            <div id="dateHelp2" class="form-text">
                                Indique fecha de finalización de la relación laboral
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="sueldo" class="form-label">Mejor sueldo bruto:</label>
                            <input name="sueldo_max" id="sueldo" type="number" class="form-control"
                                aria-describedby="sueldoHelp" required />
                            <div id="sueldoHelp" class="form-text">
                                Indique su mayor sueldo recibido el último año
                            </div>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="preaviso" value="si" id="preavisoSi">
                            <label class="form-check-label" for="preavisoSi">
                                Hubo preaviso
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="preaviso" value="no" id="preavisoNo"
                                checked>
                            <label class="form-check-label" for="preavisoNo">
                                No hubo preaviso
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary d-block m-auto">
                            Calcular
                        </button>
                    </form>

                </div>
                <div class="col-12 offset-md-1 col-md-6 d-none d-md-block">
                    <h4 class="text-center mb-4">¿Como calcular la <span class="color-enfasis">indemnización?</span>
                    </h4>
                    <p class="color-parrafo">Para calcular la indemnización por despido sin causa, lo primero que ha de
                        tenerse en cuenta es si, en efecto, se trata de un despido injustificado. La ley limita
                        considerablemente esta facultad, por lo que, en la gran mayoría de las veces la causa invocada
                        por el empleador no satisface el standard mínimo previsto por la ley laboral. De allí que, antes
                        de aceptar una causal de despido y/o consentir una liquidación final, consulte con nuestros
                        abogados especialistas en derecho laboral.</p>
                    <p class="color-parrafo">La indemnización por despido sin causa, es también llamada indemnización
                        por antigüedad, y está prevista en el art. 245 de la ley de contrato de trabajo. Equivale a UN
                        MES de sueldo bruto por año de trabajo o fracción mayor a tres meses de trabajo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->

    <footer class="footer mt-5 fondo-footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 info">
                    <h3 class="section-title color-titulares text-white">Contactanos</h3>
                    <hr class="separador" />
                    <p><i class="fas fa-phone-alt"></i> +1 1234 456789</p>
                    <p><i class="far fa-envelope"></i> info@ejpequeño.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> Av. Libertador 887</p>
                </div>
                <div class="col-12 col-md-6 redes">
                    <h3 class="section-title color-titulares text-white">Redes Sociales</h3>
                    <hr class="separador" />
                    <a class="fab fa-facebook footer__icon" href="https://www.facebook.com/emmapagano.online"></a>
                    <a class="fab fa-whatsapp footer__icon" href="https://wa.me/5492346418590"></a>  
                    <a class="fab fa-linkedin footer__icon" href="https://www.linkedin.com/in/emmapagano/"></a>
                </div>
            </div>
        </div>
        <div class="copyright">
                    <p>Copyright © 2021 Estudio Jurídico Pequeño. Todos los derechos reservados</p>
                    <p>Diseño y Desarrollo por Emmanuel Pagano</p>
                </div>
    </footer>
    <!-- FIN FOOTER -->


    <!-- Modal -->

    <div class="modal fade" id="modalNotificacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Información de su liquidación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php 
                        if($notificacionError != ""){
                            echo '<p>'. $notificacionError .'</p>';
                        }else{
                            echo '<p>Datos ingresados:</p>
                                <ul>
                                    <li>Fecha de ingreso: '. date("d/m/Y", strtotime($fechaInicio)) .' </li>
                                    <li>Fecha de despido: '. date("d/m/Y", strtotime($fechaDespido)) .'</li>
                                    <li>Salario máximo: '. $sueldo .'</li>
                                    <li>Antiguedad: '.($difAnios / 12).' años y '. $difMeses .' meses</li>
                                    <li>Preaviso: '.$preaviso.' hubo preaviso</li>
                                </ul>';
                            echo '<div class="modal-monto">
                                    <h5>Indeminización Total: </h5>
                                    <p>'.$montoLiquidacion.'</p>
                                    </div>';
                        }
                    ?>
                    
                </div>
                <div class="modal-footer">
                    <a class="fab fa-facebook footer__icon" href="https://www.facebook.com/emmapagano.online"></a>
                    <a class="fab fa-whatsapp-square footer__icon" href="https://wa.me/5492346418590"></a>  
                    <a class="fab fa-linkedin footer__icon" href="https://www.linkedin.com/in/emmapagano/"></a>
                </div>
            </div>
        </div>
    </div>


    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/b9b95d4cba.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script src="js/main.js"></script>

    <script type="text/javascript">

        /*
            CAMBIAR ESTILO DE MENU AL HACER SCROLL
        */


        $(function () {
            $(window).scroll(function () {
                var scrolltop = $(this).scrollTop();
                if(scrolltop > 20){
                 $('.encabezado').addClass('fondo-menu');
                    $('.nav-link').css("color", "#999999");
                   $('.logo-img').attr("src", 'img/logo-color2.png');
                }else{
                    $('.logo-img').attr("src", 'img/logo-transparente.png');
                    $('.nav-link').css("color", "#fff");
                    $('.encabezado').removeClass('fondo-menu');
                }
            });

        });


    /*
        DESENCADENAR MODAL
    */ 
    var banderaJS = '<?php echo $banderaJS;?>'

    $(document).ready(() => {
        var myModal = new bootstrap.Modal(document.getElementById('modalNotificacion'), {
            keyboard: false
        });
        //SI PROCESO UNA CONSULTA DISPARO LA NOTIFICACION DE EXITO.
        if (banderaJS) {
            myModal.toggle();
        }
    });

    </script>
</body>

</html>