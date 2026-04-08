<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simpa Iberoamericana</title>

    <meta name="title" content="Simpa Iberoamericana" />
    <meta name="description" content="" />
    <meta name="author" content="Aldo Iñiguez" />
    <meta name="revisit-after" content="15 days" />
    <meta name="robots" content="index follow" />

    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
    <link rel="manifest" href="site.webmanifest" />

    <!-- BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/carousel/carousel.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="/assets/css/fontawsome/css/all.css" />
    <!-- Animacion -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body id="home">

    <div class="velo" id="velo"></div>

    <header class="header-home">

        @include('layouts.wp-top-navigation')

        <div class="contenedor-slide" id="contenedor-slide" style="background-image: url('assets/slides/slide04.jpg');background-repeat: no-repeat;background-position: center;">
            <div class="contenido">
                <div class="isotipo trasicion opacity-0" id="isotipo">
                    <img src="assets/images/isotipo.png" alt="">
                </div>
                <h1 class="trasicion move-opacity-0" id="hunoslide">Somos la <span class="color-orange">evolución </span><br>en la historia del pan</h1>
                <p id="parrafoslide" class="trasicion move-opacity-0">Con más de 50 años de prestigio en el mercado</p>
                <p id="btnempresa" class="trasicion opacity-0"><a href="#empresa" class="link-buton">Nuestra Empresa</a></p>
            </div>


        </div>


    </header>
