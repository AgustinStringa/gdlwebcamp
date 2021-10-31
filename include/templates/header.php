<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>GDLWEBCAMP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="favicon.ico">
    <!-- Place favicon.ico in the root directory -->


    <!--font awesome-->
    <script src="https://kit.fontawesome.com/1fdb1d3073.js" crossorigin="anonymous"></script>   

    <!--introduccion leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="css/normalize.css">

        <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com"> 

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/fontawesome.min.css"> 


    <?php 
    
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php","", $archivo);
        

        if($pagina == 'invitados' || $pagina == 'index'){
            echo '<link rel="stylesheet" href="css/colorbox.css">';
        } else if ($pagina == 'conferencia'){
            echo '<link rel="stylesheet" href="css/lightbox.css">';
        }

        //  echo $archivo . "<br>";
        //  echo $pagina;

    ?>
   
    
    <link rel="stylesheet" href="css/main.css">


    <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">

    <!-- Add your site or application content here -->

    <header class="site_header">
        <div class="hero">
            <div class="contenido_header contenedor">
                <nav class="redes_sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>

                <div class="informacion_evento">
                    <div class="clearfix">
                        <p class="fecha"><i class="fas fa-calendar-alt"></i>10-12 dic </p>
                        <p class="ciudad"> <i class="fas fa-map-marker-alt"></i>Guadalajara MX</p>
                    </div>

                    <h1 class="nombre_sitio">GDLWebCamp</h1>
                    <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
                </div>

            </div>
        </div>
        <!--hero-->


    </header>

    <div class="barra">
        <div class="contenedor clearfix ">
            <div class=" logo ">
                <a href="index.php"><img src="img/logo.svg " alt="logotipo "></a>
            </div>

            <div class="menu_movil">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="navegacion_principal ">
                <a href="conferencia.php">Conferencia</a>
                <a href="calendario.php ">Calendario</a>
                <a href="invitados.php ">Invitados</a>
                <a href="registro.php">Reservaciones</a>
            </nav>
        </div>
    </div>
    <!--BARRA-->