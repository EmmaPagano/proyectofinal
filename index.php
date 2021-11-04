<?php 
$notificacion = "";
$error = false;
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $nombreConsulta = ucfirst(strtolower($_POST['nombre']));
        $emailConsulta = strtolower($_POST['email']);
        $telefonoConsulta = $_POST['telefono'];
        $consulta = ucfirst(strtolower($_POST['consulta']));

        if($nombreConsulta == "" || $emailConsulta == "" || $telefonoConsulta == "" || $consulta == "" ){
            $notificacion = "Por favor rellene todos los campos";
            $error = true;
        }else{
            // INDICO EL DESTINATARIO
            $email_to = "info@emmapagano.online";
            // ASUNTO DEL CORREO
            $email_subject = "Mensaje enviado desde el formulario Web";
            // REMITENTE
            $email_from="info@emmapagano.online";
            // ARMO EL MENSAJE O EL CUERPO DEL CORREO
            $email_message = "<b>Detalles de la consulta realizada a traves del formulario:</b><br><br>";
            $email_message .= "<b>Nombre</b>: " . $nombreConsulta . "<br>";
            $email_message .= "<b>E-mail</b>: " . $emailConsulta. "<br>";
            $email_message .= "<b>Telefono</b>: " . $telefonoConsulta . "<br>";
            $email_message .= "<b>Mensaje</b>: " . $consulta . "<br><br>";
  
  
        // ENCABEZADOS PARA BRINDAR INFORMACION EXTRA SOBRE EL CORREO A ENVIAR (TIPO DE CONTENIDO, CODIFICACION DE CARACTERES, ETC)
  
            $headers = 'From: '.$email_from."\r\n".
            'Reply-To: '.$email_from."\r\n" .
            'Content-Type: text/html; charset=utf-8\r\n'.
            'X-Mailer: PHP/' . phpversion();

            // UNA VEZ ARMADAS MIS VARIABLES, EJECUTO LA FUNCION MAIL 
            if (mail($email_to, $email_subject, $email_message, $headers)){
                $notificacion = "El mensaje ha sido enviado con exito!";
            }else {
                $notificacion = "Ha ocurrido un error, el mensaje no pudo enviarse. Porfavor vuelva a intentarlo";
                $error = true;
            }

        }

    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- META DESCRIPTION Y KEYWORDS -->
    <meta name="description"
    content="Mi nombre es Emmanuel Pagano. Tengo 31 años y estoy cursando las últimas materias de la carrera de Programación en la Universidad Tecnológica Nacional (UTN). Actualmente me concentro en Desarrollo Web.">
    <meta name="keywords" content="Emmanuel, Pagano, Desarrollo, Web, Diseño, Página, Sitio">
    <title>Emmanuel Pagano Desarrollo Web</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <header class="hero">
        <div class="container">
            <nav class="nav">
                <a href="#contacto" class="nav__items nav__items--cta">Contactame ahora</a>
                <a href="#about_me" class="nav__items">Sobre mí</a>
                <a href="#my_projects" class="nav__items">Proyectos</a>
            </nav>

            <section class="hero__container">
                <div class="hero__texts">
                    <h1 class="hero__title"> Hola, soy Emmanuel Pagano, futuro Técnico en Programación</h1>
                    <h2 class="hero__subtitle">Volviendo realidad tus ideas</h2>
                </div>
            </section>
        </div>

        <div class="hero__wave" style=" overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    
    </header>

    <main>
        <section class="presentation container">

        <!-- <a href="#" class="presentation__cta">Contactame ahora</a>  -->


            <div class="about_me" id="about_me">
                <img src="assets/0fcce292-9e44-4cfe-8e8b-9ad78a080952.jpg" alt="Foto" class="presentation__picture">
                <h2 class="subtitle">Mi nombre es Emmanuel Pagano</h2>
                <p class="presentatio__copy">Tengo 31 años y estoy cursando las últimas materias de la carrera de Programación en la Universidad Tecnológica Nacional (UTN). Actualmente me concentro en Desarrollo Web.</p>
            </div>
            

        </section>

        <section class="about container">
            <div class="about__texts">
                <h2 class="subtitle"> Sobre mi trabajo</h2>
                <p class="about__paragraph">HTML, CSS, SASS, Bootstrap, MySQL, PHP, JS son algunas de las herramientas que utilizo para brindarte soluciones digitales en Internet. Mi tarea consiste en darte máxima visibilidad en el mundo virtual.</p>
                <div class="about__icons about__icons-mobile icons__superior">
                        <img class="img-fluid" src="assets/html.svg" alt="">
                        <img class="img-fluid" src="assets/css.svg" alt="">
                        <img class="img-fluid" src="assets/sass.svg" alt="">
                </div>
                
                <p class="about__paragraph">Para cumplir con este trabajo, te ofrezco diseñar o mejorar tu sitio web, posicionarlo de un modo estratégico en Internet, gestionar el marketing y administrar de forma inteligente la publicidad on line.</p>
                <div class="about__icons about__icons-mobile">
                        <img class="img-fluid" src="assets/mysql.svg" alt="">
                        <img class="img-fluid" src="assets/php.svg" alt="">
                        <img class="img-fluid" src="assets/js.svg" alt="">
                    </div>
            </div>
                <div class="about__skills">
                    <div class="about__icons icons__superior">
                        <img class="img-fluid" src="assets/html.svg" alt="">
                        <img class="img-fluid" src="assets/css.svg" alt="">
                        <img class="img-fluid" src="assets/sass.svg" alt="">
                    </div>
                    <div class="about__icons">
                        <img class="img-fluid" src="assets/mysql.svg" alt="">
                        <img class="img-fluid" src="assets/php.svg" alt="">
                        <img class="img-fluid" src="assets/js.svg" alt="">
                    </div>
                </div>
                
                <figure class="about__img about__img--left">
                    <img src="assets/undraw_programming_2svr.svg" alt="Imagen" class="about__picture">
                </figure>

                <div class="about__texts">
                    <h2 class="subtitle"> Diseño web Responsive y Optimizado para buscadores</h2>
                    <p class="about__paragraph">Tu página web va a funcionar y lucir muy bien, no sólo en monitores de computadoras, sino también en dispositivos móviles como celulares y tablets. El diseño web Responsive ayudará a aumentar considerablemente la audiencia de la misma y por ende sus resultados.</p>
                    <p class="about__paragraph">Además, abordamos la programación de nuestros diseños de manera que luzcan bien tanto para las personas, como para los motores de búsqueda como Google. Esto contribuye sustancialmente a que tu página obtenga mejores posiciones en los resultados de búsqueda.</p>
                </div>

                
        </section>

        <section class="form-section container" id="contact">
            
            <div class="container-form" id="contacto">
                <h2 class="subtitle"> Contactame</h2>
                <form action="index.php" method="POST">
        
                    <input type="text" name="nombre" placeholder="Indique su nombre" required>

                    <input type="text" name="email" placeholder="Indique su e-mail" required>

                    <input type="text" name="telefono" placeholder="Indique su teléfono" required>

                    <textarea name="consulta" rows="10"></textarea>

                    <button class="presentation__cta" name="btn-enviar" type="submit">Enviar</button>

                    <?php
                        if($notificacion != ""){
                            if($error){
                                echo "<p id='notificacion' class='notificacion-error'>" . $notificacion . "</p>";
                            }else{
                                echo "<p id='notificacion' class='notificacion'>" . $notificacion . "</p>";
                            }
                            
                        }
                    ?>

                </form>
            </div>

        </section>


        <section class="projects" id="my_projects">
            <div class="container">
                <h2 class="subtitle">Mis proyectos</h2>
                <div class="projects__grid">

                    <article class="projects__item">
                        <img src="assets/img1.jpg" alt="Imagen Proyecto 1" class="projects__img">
                        <a href="estudio_juridico/index.php" target="_blank">
                        <div class="projects__hover">
                            <h2 class="projects__title">Página web para estudio jurídico</h2>
                            <i class="far fa-file-alt projects__icon" ></i>
                        </div>
                        </a>
                    </article>

                    <article class="projects__item">
                        <img src="assets/img2.jpg" alt="Imagen Proyecto 2" class="projects__img">
                        <a href="sitio_artista/index.php" target="_blank">
                        <div class="projects__hover">
                            <h2 class="projects__title">Página web para artista</h2>
                            <i class="far fa-file-alt projects__icon" ></i>
                        </div>
                    </article>

                    <article class="projects__item">
                        <img src="assets/img3.jpg" alt="Imagen Proyecto 3" class="projects__img">
                        <a href="registro_donantes/index.php" target="_blank">
                        <div class="projects__hover">
                            <h2 class="projects__title">Registro de donantes de sangre</h2>
                            <i class="far fa-file-alt projects__icon" ></i>
                        </div>
                        </a>
                    </article>

                </div>
            </div>
        </section>

        <section class="testimony container">
            <h2 class="subtitle">Qué dicen los clientes</h2>
            <div class="testimony__grid">
                <article class="testimony__item">
                    <div class="testimony__person">
                        <img src="assets/abogado.jpg" alt="Foto abogado" class="testimony__img">
                        <div class="testimony__texts">
                            <h3 class="testimony__name">Dr. Conrado Peña<h3>
                            <p class="testimony__verification">Socio en Estudio Pequeño</p>
                        </div>
                    </div>
                    <div class="testimony__review">Emmanuel superó nuestras expectativas con la página que diseñó para la firma. Logró el estilo y las funcionalidades que requeríamos. Muy profesional.</div>
                </article>
                <article class="testimony__item">
                    <div class="testimony__person">
                        <img src="assets/artista2.jpg" alt="Foto artista" class="testimony__img">
                        <div class="testimony__texts">
                            <h3 class="testimony__name">Miss Monique<h3>
                            <p class="testimony__verification">DJ</p>
                        </div>
                    </div>
                    <div class="testimony__review">Estoy feliz con mi nueva página. Me ayuda a estar más cerca del público, que ahora cuenta con un nuevo canal para ver mi contenido y estar al tanto de los próximos eventos. </div>
                </article>
            </div>

        </section>
    </main>

    <footer class="footer">
        <div class="container footer__grid">

            <section class="footer__info">
               <div class="content-info"><span class="info__container-icons"><i class="fas fa-phone"></i></span> <span>2346-418590</span></div>
                <div class="content-info"><span class="info__container-icons"><i class="far fa-envelope"></i></span><span>info@emmapagano.online</span></div>
                <div class="content-info"><span class="info__container-icons"><i class="fas fa-map-marker-alt"></i></span><span>Alberti, Buenos Aires</span></div> 

                
            </section>

            <section class="footer__contact">
                <h3 class="footer__title">Contacto</h3>
                <div class="footer__icons">

                <span class="footer__container-icons">
                    <a class="fab fa-facebook footer__icon" href="#"></a>
                </span>
                <span class="footer__container-icons">
                    <a class="fab fa-whatsapp-square footer__icon" href="https://wa.me/5492346418590"></a>     
                </span>
                <span class="footer__container-icons">
                    <a class="fab fa-linkedin footer__icon" href="https://www.linkedin.com/in/emmapagano/"></a>
                </span>
                </div>
            </section>

        </div>

    </footer>

 
    <script src="https://kit.fontawesome.com/b9b95d4cba.js" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">

    // CUANDO EL DOCUMENTO ESTA CARGADO EN SU TOTALIDAD EJECUTO UNA FUNCION
    
        $(document).ready(function() {
            // DENTRO DE UNA VARIABLE JS, ALMACENO EL VALOR DE LA VARIABLE PHP
            var notificacion = "<?php echo ($notificacion != '') ? true : false; ?>"
            // ANALIZO SI NOTIFICACION ES TRUE, VOY A REALIZAR UN DESPLAZAMIENTO (SCROLL) HACIA EL FORMULARIO
            if (notificacion){
                // REDIRIGO HACIA LA SECCION CONTACTO
                window.location.href = '#contacto';
            }
        });

    </script>
</body>
</html>