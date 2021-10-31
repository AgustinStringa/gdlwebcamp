
    <footer class="site_footer">
        <div class="contenedor clearfix">
            <div class="informacion_footer">
                <h3>sobre <span>gdlwebcamp</span></h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae earum sint expedita? Sed magnam deleniti, quisquam mollitia impedit facilis minima? Maiores, asperiores. Voluptatem modi voluptas molestias iure dolorum doloremque cupiditate?</p>
            </div>
            <div class="ultimos_tweets">
                <h3>ultimos <span>tweets</span></h3>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit vitae maiores natus animi temporibus laborum. </li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit vitae maiores natus animi temporibus laborum. </li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit vitae maiores natus animi temporibus laborum. </li>
                </ul>
            </div>
            <div class="menu_footer">
                <h3>redes <span>sociales</span></h3>
                <nav class="redes_sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
            </div>
        </div>

        <p class="copy">
            &copy Todos los derechos reservados GDLWEBCAMP 2021
        </p>

    </footer>
    <!-- footer pagina-->


    <script src=" js/vendor/modernizr-3.11.2.min.js "></script>
    <script src="js/plugins.js "></script>

    <!--introduccion leaflet-->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!--INTRODUCIENDO JQUERY PARA OPERAR-->
    <script src="js/jquery.js"></script>
    <!--INTRODUCIENDO LIBRERÍA PARA JQUERY ANIMACION DE NUMEROS -->
    <script src="js/jquery.animateNumber.min.js"></script>
    <!--INTRODUCIENDO LIBRERÍA PARA CUENTA REGRESIVA -->
    <script src="js/jquery.countdown.min.js"></script>
    <!--INTRODUCIENDO LIBRERÍA PARA EFECTOS EN LOS TEXTOS -->
    <script src="js/jquery.lettering.js"></script>


    <?php 
    
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina= str_replace(".php", "", $archivo);
    if($pagina =='invitados' || $pagina == 'index'){
        //INTRODUCIENDO COLORBOX-->
        echo '<script src="js/jquery.colorbox-min.js"></script>';
    } else if ($pagina == 'conferencia'){
         //INTRODUCIENDO LIGHTBOX-->
        echo '<script src="js/lightbox.js"></script>';
    }
    ?>





   
    <script src="js/jquery.colorbox-min.js"></script>
    <script src="js/lightbox.js"></script> 
    <!--estos ultimos 2 scripts podrían desactivarse para descargar menos recursos innecesarios-->
    
    <script src="js/main.js "></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js " async></script>
</body>

</html>