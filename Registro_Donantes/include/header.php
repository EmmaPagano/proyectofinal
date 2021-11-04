<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- FUENTES DE TEXTO -->
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;700;800&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@100;400&display=swap"
      rel="stylesheet"
    />
    <!-- BOOTSTRAP -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- ICONOS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
      crossorigin="anonymous"
    />
    <!-- ESTILOS PERSONALIZADOS -->
    <link rel="stylesheet" href="css/style.css" />

    <title>Registro para donantes de sangre</title>
  </head>
  <body>
    <header class="main-header py-4" style="<?php 
    if ($title == 'faq'){
      echo ' background-image: linear-gradient(
        rgba(47, 23, 15, 0.65),
        rgba(47, 23, 15, 0.65)
      ),
      url(img/fondo-header2.jpg);';
    }else if($title == 'registro'){
      echo ' background-image: linear-gradient(
        rgba(47, 23, 15, 0.65),
        rgba(47, 23, 15, 0.65)
      ),
      url(img/fondo-header3.jpg);';
    }
    ?>" >

      <div class="header-title d-lg-block">
        <?php if($title == 'faq'): ?>
          <h1 class="text-center text-white">Preguntas Frecuentes</h1>
          <a href="registro.php" class="btn-cta">Registrate ahora</a>
        <?php else: ?>
          <h1 class="text-center text-white">Registro para donantes de sangre</h1>
          <a href="registro.php" class="btn-cta">Registrate ahora</a>
        <?php endif;?>
        
      </div>

      <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
          <a
            class="navbar-brand text-uppercase fw-bold d-lg-none"
            href="index.html"
            >Registro de Donantes</a
          >
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item px-lg-4">
                <a class="nav-link <?php if($title == 'home'){ echo 'active'; } ?> text-uppercase" href="index.php">Home</a>
              </li>
              <li class="nav-item px-lg-4">
                <a class="nav-link <?php if($title == 'faq'){ echo 'active'; } ?> text-uppercase" href="faqs.php"
                  >Preguntas frecuentes</a
                >
              </li>
              <li class="nav-item px-lg-4">
                <a class="nav-link <?php if($title == 'registro'){ echo 'active'; } ?> text-uppercase" href="registro.php"
                  >Registro de donantes</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- FIN HEADER -->