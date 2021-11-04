<?php 
$notificacion = "";
$error = false;

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $nombreConsulta = ucfirst(strtolower($_POST['nombre']));
      $emailConsulta = strtolower($_POST['correo']);
      $telefonoConsulta = $_POST['telefono'];
      $comentarios = ucfirst(strtolower($_POST['comentarios']));

        if($nombreConsulta == "" || $emailConsulta == "" || $telefonoConsulta == "" || $comentarios == ""  ){
            $notificacion = "Por favor complete todos los campos";
            $error = true;
        }else if(!isset($_POST["chk-politicas"])){
          $notificacion = "Debe aceptar las políticas de privacidad de nuestro sitio";
          $error = true;
        }
        else { 
            $politicas = $_POST['chk-politicas'];
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
            $email_message .= "<b>Mensaje</b>: " . $comentarios . "<br><br>";
  
  
        // ENCABEZADOS PARA BRINDAR INFORMACION EXTRA SOBRE EL CORREO A ENVIAR (TIPO DE CONTENIDO, CODIFICACION DE CARACTERES, ETC)
  
            $headers = 'From: '.$email_from."\r\n".
            'Reply-To: '.$email_from."\r\n" .
            'Content-Type: text/html; charset=utf-8\r\n'.
            'X-Mailer: PHP/' . phpversion();

            // UNA VEZ ARMADAS MIS VARIABLES, EJECUTO LA FUNCION MAIL 
            if (mail($email_to, $email_subject, $email_message, $headers)){
                $notificacion = "El mensaje ha sido enviado con exito!";
            }else {
                $notificacion = "Ha ocurrido un error, el mensaje no pudo enviarse. Por favor vuelva a intentarlo";
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
        content="CONTENIDO A VISUALIZAR EN EL BUSCADOR.">
        <meta name="keywords" content="PALABRAS CLAVES">
    
        <!-- LIGHTBOX GALERIA DE IMAGENES -->
        <link rel="stylesheet" href="lightbox2/dist/css/lightbox.css">	


        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    
    
        <!-- ICONOS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
            integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
            crossorigin="anonymous" />

        <!-- FUENTES-->    
    
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Raleway:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

        <!-- ESTILO PERSONALIZADO-->       
        <link rel="stylesheet" href="css/styles.css" />






    <title>Sitio artista</title>
</head>


<body>
    <header class="encabezado" >
        <div class="container">
            <!--MENÚ DE NAVEGACIÓN-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <div class="logo">
                  <a class="navbar-brand" href="#"><img src="img/logo.svg" alt="logo"></a>
                  </div>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#about">Acerca de mí</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#music">Música</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#eventos">Próximos eventos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
            <!--FIN MENÚ DE NAVEGACIÓN-->
            <!--XXX-->
            <div class="encabezado-titulos">
            <h1 class="encabezado-titular text-white text-center">Miss Monique</h1>
            <h4 class="encabezado-subtitulo text-white text-center">Sitio No Oficial</h4>
            </div>
            <!--XXX-->
            <ul class="encabezado-redes">
                <li><a href="https://www.facebook.com/MissMoniqueUA/" target="_blank" class="link-redes"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/djmissmonique" target="_blank" class="link-redes"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/djmissmonique/" target="_blank" class="link-redes"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UClIIy-aQBXRi1OHupBcrjJw" target="_blank" class="link-redes"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://soundcloud.com/alesia-arkusha?fbclid=IwAR3W2E_2iN0W0AeUAzZYUtweWBLe4hE4ntj1n76ZRvvIfy0fkm1fVhkKH8s" target="_blank" class="link-redes"><i class="fab fa-soundcloud"></i></a></li>
            </ul>
            </div>
    </header>

    <main class="contenido-principal">
        <section class="biografia py-5" id="about">
            <h2 class="seccion-titular text-center mb-2">Acerca de mí</h2>
            <hr class="separador-titular mb-5">
            <div class="container">
              <div class="row">
                <h3 class="seccion-subtitulo text-center">Biografía</h3>
                <div class="col-12 col-md-6 col-texto">
                    <p>Alesia Arkusha, mas conocida en el mundo de la música electrónica por el apodo de “Miss Monique”, pasó por un camino espinoso desde principiante hasta profesional de DJ. Logró un gran éxito gracias al lanzamiento de podcasts populares en Youtube bajo los títulos “Mind Games” y “MiMo Weekly”, así como lanzamientos en sellos tan famosos como Black Hole y Bonzai Progressive.</p>
                    <p>Esta joven de 28 años es posiblemente la DJ más reconocida de Progressive House en Europa. Poco a poco, saltando a la fama, está comenzando a crear olas en el circuito internacional también por lo que pronto la veremos en los festivales internacionales mas reconocidos del mundo .</p>
                    <p>Se puede decir que todo comenzó en el año 2011. Alesya ha estado actuando activamente en Ucrania durante 2 años con sus sets de DJ, después de haber visitado casi todas las ciudades ucranianas. El 2013 marcó la transmisión del programa radial “Mind Games Podcast”. El crecimiento de su popularidad permitió ganar una gran base de oyentes predominantemente extranjeros. Gracias a esto, Miss Monique comenzó a actuar en las plataformas de conciertos extranjeras y en 2014, comenzó a cooperar con el sello Freegrant Music.</p>
                </div>
                <div class="col-12 col-md-6 col-texto">
                  <p>A partir de 2017, Miss Monique ha realizado con éxito sus sets en más de 40 países del mundo y también presentó su espectáculo dos veces en la mundialmente famosa Ibiza.</p>
                  <p>En los últimos años, Miss Monique hizo su debut en Ibiza, así como cientos de espectáculos en todo el mundo; de Hungría a Bielorrusia, a la República Checa e incluso a la India. Su mezcla ecléctica de trance, house progresivo y techno, le da a Miss Monique una versatilidad que se adapta a lugares íntimos y espacios de titulares de festivales, por igual.</p>
                  <p>Desde que ingresó al estudio, ha comenzado a colaborar con algunos de los DJ más importantes del mundo; su éxito más grande y más reconocible, “No Fear” fue defendido por artistas como Armin van Buuren, Paul van Dyk, Paul Oakenfold, Gareth Emery y muchos más.</p>
                </div>
              </div>
            </div>
        </section>

<!--SECCIÓN MÚSICA-->
        <section class="mis-trabajos py-5" id="music">
          <h2 class="seccion-titular text-center mb-2 text-white">Música</h2>
          <hr class="separador-titular separador-black mb-5">
          <div class="container">
            <div class="row my-4">
              <h3 class="seccion-subtitulo text-white">Contenido más reciente</h3>
              <div class="col-12 col-md-6 col-soundcloud">
                
                <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/570517179&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/842293681&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/16104670&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                <iframe class="d-md-none d-lg-block" width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1117374937&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
              </div>
              <div class="col-md-6 d-none d-md-block">
                  <img src="img/missmonique10.jpg" class="img-fluid" alt="">
              </div>
            </div>
            <!--FILA EVENTOS-->
            <div class="row my-4">
              <div class="col-12 col-md-6 col-video">
               <iframe width="100%" height="" src="https://www.youtube.com/embed/13NOUOz8jT0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-12 col-md-6 col-video">
              <iframe width="100%" height="" src="https://www.youtube.com/embed/mNF9eMOuSUk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </section>

        <!--GALERÍA DE IMÁGENES-->
        <section class="galeria py-5 d-none d-md-block">
          <div class="container">
            <!-- PRIMERA FILA DE LA GALERIA -->
            <div class="fila-galeria">
              <div class="col-galeria-izq">
                <a href="img/missmonique7.jpg" data-lightbox="galeria-dj"><img class="img-fluid" src="img/missmonique7.jpg" alt=""></a>
                <a href="img/missmonique8.jpg" data-lightbox="galeria-dj"><img class="img-fluid" src="img/missmonique8.jpg" alt=""></a>
              </div>

              <div class="col-galeria-mid">
                <a href="img/missmonique9.jpg" data-lightbox="galeria-dj"><img class="img-fluid" src="img/missmonique9.jpg" alt=""></a>
              </div>

              <div class="col-galeria-der">
                <a href="img/missmonique13.jpg" data-lightbox="galeria-dj"><img class="img-fluid" src="img/missmonique13.jpg" alt=""></a>
                <a href="img/missmonique12.jpg" data-lightbox="galeria-dj"><img class="img-fluid" src="img/missmonique12.jpg" alt=""></a>
              </div>
            
            </div>  

            <!-- SEGUNDA FILA DE LA GALERIA -->
            <div class="fila-galeria mt-3">
              <div class="col-galeria"><a href="img/missmonique6.jpg" data-lightbox="galeria-dj"><img class="img-fluid" src="img/missmonique6.jpg" alt=""></a></div>
              <div class="col-galeria"><a href="img/missmonique14.jpg" data-lightbox="galeria-dj"><img class="img-fluid" src="img/missmonique14.jpg" alt=""></a></div>
              <div class="col-galeria"><a href="img/missmonique4.jpg" data-lightbox="galeria-dj"><img class="img-fluid" src="img/missmonique4.jpg" alt=""></a></div>
            </div>

          </div>
        </section>
        <!--PRÓXIMOS EVENTOS-->
        <section class="eventos py-5" id="eventos">
          <h2 class="seccion-titular text-center mb-2">Próximos eventos</h2>
          <hr class="separador-titular mb-5">
          <div class="container">
            <div class="row">
              <div class="col-12 col-md-3">
                <div class="card">
                  <img src="img/evento1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Ultra Music Festival</h5>
                    <p class="card-text">Febrero 2022 - Miami</p>
                    <a href="#" class="btn btn-primary">+Info</a>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-3">
                <div class="card">
                    <img src="img/evento2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Tomorrowland</h5>
                      <p class="card-text">Febrero 2022 - Rio de Janeiro</p>
                      <a href="#" class="btn btn-primary">+Info</a>
                    </div>
                </div>
              </div>
                
              <div class="col-12 col-md-3">
                <div class="card">
                    <img src="img/evento3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Crobar Be Techno</h5>
                      <p class="card-text">Marzo 2022 - Buenos Aires</p>
                      <a href="#" class="btn btn-primary">+Info</a>
                    </div>
                  </div>
              </div>

              <div class="col-12 col-md-3">
                <div class="card">
                  <img src="img/evento4.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Creamfields</h5>
                    <p class="card-text">Marzo 2022 - Valparaíso</p>
                    <a href="#" class="btn btn-primary">+Info</a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>

    </main>

    <!--FORMULARIO DE CONTACTO-->
    <section class="contacto py-5" id="contacto">
      <h2 class="seccion-titular text-center mb-2">Contacto</h2>
      <hr class="separador-titular mb-5">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 mx-auto col-form">
            <form method="POST" action="index.php">
              <div class="mb-3">
                <label for="inputNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputNombre" name="nombre" required>
              </div>
              <div class="mb-3">
                <label for="inputCorreo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="inputCorreo" name="correo" required>
              </div>
              <div class="mb-3">
                <label for="inputTelefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="inputTelefono" name="telefono" required>
              </div>
              <div class="mb-3">
                <label for="inputComentarios" class="form-label">Comentarios</label>
                <textarea class="form-control" id="inputComentarios" name="comentarios" rows="4" required></textarea>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="checkPolitica" name="chk-politicas" value="true">
                <label class="form-check-label" for="checkPolitica">Acepto las políticas de privacidad</label>
              </div>
              <button type="submit" class="btn btn-primary btn-enviar">Enviar</button>
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
        </div>
      </div>
    </section>

    <!--FOOTER-->
    <footer class="pie-pagina py-5">
      <div class="container">
        <div class="row">
        <div class="col-12 col-md-4 copyright">
          <p class="text-white mt-4">Copyright © 2021. Todos los derechos reservados</p>
          <p class="text-white mt-2">Diseño y Desarrollo por <a class="text-decoration-none" href="https://emmapagano.online/"> Emmanuel Pagano</a></p>           
          </div>
          <div class="col-12 col-md-4 col-redes">
            <h4>Redes</h4>
            <hr class="separador-titular separador-black mb-2">
            <ul class="footer-redes mt-4">
                <li><a href="https://www.facebook.com/MissMoniqueUA/" target="_blank" class="link-redes"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/djmissmonique" target="_blank" class="link-redes"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/djmissmonique/" target="_blank" class="link-redes"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UClIIy-aQBXRi1OHupBcrjJw" target="_blank" class="link-redes"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://soundcloud.com/alesia-arkusha?fbclid=IwAR3W2E_2iN0W0AeUAzZYUtweWBLe4hE4ntj1n76ZRvvIfy0fkm1fVhkKH8s" target="_blank" class="link-redes"><i class="fab fa-soundcloud"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <!-- LIGHTBOX JS-->
    <script src="lightbox2/dist/js/lightbox-plus-jquery.min.js"></script>
    <!--JS PERSONALIZADO-->
    <script type="text/javascript">

    // CUANDO EL DOCUMENTO ESTA CARGADO EN SU TOTALIDAD EJECUTO UNA FUNCION
    
        $(document).ready(function() {
            // DENTRO DE UNA VARIABLE JS, ALMACENO EL VALOR DE LA VARIABLE PHP
            var notificacion = "<?php echo ($notificacion != '') ? true : false; ?>"
            // ANALIZO SI NOTIFICACION ES TRUE, VOY A REALIZAR UN DESPLAZAMIENTO (SCROLL) HACIA EL FORMULARIO
            if (notificacion){
                // REDIRIGO HACIA LA SECCIÓN CONTACTO
              window.location.href = '#notificacion';
            }
        }	); 
    </script>

</body>

</html>