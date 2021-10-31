(function() {
    'use strict';
    //use strict para que javascript se ejecute en 'modo estricto'


    var regalo = document.getElementById('regalo');


    document.addEventListener('DOMContentLoaded', function() {

        //comprobando que exista el elemento antes de hacer alguna accion

        if (document.getElementById('mapa')) {
            //introducir mapa del home
            var map = L.map('mapa').setView([-33.00546, -61.819232], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([-33.00546, -61.819232]).addTo(map)
                .bindPopup('GDL WEBCAMP.<br> Aquí estaremos!')
                .openPopup()
                .bindTooltip('Un tool tip')
                .openTooltip();

        }



        // Campos Datos usuario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        // Campos pases
        var pase_dia = document.getElementById('pase_dia');
        var pase_completo = document.getElementById('pase_completo');
        var pase_dos_dias = document.getElementById('pase_dos_dias');

        //botones y divs

        var calcular = document.getElementById('calcular');
        var error = document.getElementById('error');
        var btnRegistro = document.getElementById('btnRegistro');
        var listaProductos = document.getElementById('listaProductos');

        var sumaTotal = document.getElementById('suma-total');

        //extras
        var etiquetas = document.getElementById('etiquetas');
        var camisa_evento = document.getElementById('camisa_evento');

        //Deshabilitar boton de pagar para accionarle solo luego de haber apretado calcular
        btnRegistro.disabled = true;


        //agregando validacion para ejecutar las acciones de la pagina registro.html para que solo se ejecuten
        //si existe uno de los elementos que solo existe en este documento html
        //de esta forma, se evitan errores en otras paginas

        if (document.getElementById('calcular')) {


            calcular.addEventListener('click', calcularMontos);

            //asignando otro escuchador

            pase_dia.addEventListener("blur", mostrarCantidad);
            pase_completo.addEventListener("blur", mostrarCantidad);
            pase_dos_dias.addEventListener("blur", mostrarCantidad);

            //validando datos usuario
            nombre.addEventListener('blur', validarDatosUsuario);
            apellido.addEventListener('blur', validarDatosUsuario);
            email.addEventListener('blur', validarDatosUsuario);

            //validacion de @ en el input email
            email.addEventListener('blur', buscarArroba);


            //metodo para validar mail
            function buscarArroba() {
                //con indexOf se busca el valor por parámetro en la cadena a la cual se le aplica
                //se usa -1, ya que este es el valor que retorna la funcion cuando NO ENCUENTRA el valor
                if (this.value.indexOf('@') == -1) {
                    error.style.display = "block";
                    error.innerHTML = "debes introducir un email válido";
                    this.style.border = ".1rem solid rgb(204, 19, 19)";
                    error.style.border = ".1rem solid rgb(204, 19, 19)";
                } else {
                    error.style.display = "none";
                    this.style.border = ".15rem solid #ccc";
                }
            }

            //
            function validarDatosUsuario() {
                if (!this.value) {
                    // alert('debes insertar algo');
                    error.style.display = "block";
                    error.innerHTML = "este campo es obligatorio"
                    this.style.border = ".1rem solid rgb(204, 19, 19)"
                    error.style.border = ".1rem solid rgb(204, 19, 19)"
                } else {
                    error.style.display = "none";
                    this.style.border = ".15rem solid #ccc"

                }
            }


            function calcularMontos(event) {
                event.preventDefault();

                if (regalo.value) {
                    //declaracion de variables para operar
                    //var precioDia = parseInt(pase_dia.value, 10) || 0;
                    //var precioCompleto = parseInt(pase_completo.value, 10) || 0;
                    //var precioDosDias = parseInt(pase_dos_dias.value, 10) || 0;


                    //
                    //var precioEtiquetas = parseInt(etiquetas.value, 10) || 0;
                    //var precioCamisas = parseInt(camisa_evento.value, 10) || 0;

                    //var totalAPagar = (precioDia * 30) + (precioCompleto * 50) + (precioDosDias * 45) + (precioEtiquetas * 2) + ((precioCamisas * 10) * .93);

                    var precioDia = parseFloat(pase_dia.value * 30);
                    var precioCompleto = parseFloat(pase_completo.value * 50);
                    var precioDosDias = parseFloat(pase_dos_dias.value * 45);
                    var precioEtiquetas = parseFloat(etiquetas.value * 2);
                    var precioCamisas = (camisa_evento.value * 10) * 0.93;
                    precioCamisas = parseFloat(precioCamisas);

                    var totalAPagar = precioDia + precioCompleto + precioDosDias + precioEtiquetas + precioCamisas;


                    // console.log(regalo.value);
                    // console.log(`El valor de pase(s) por un día es: ${pase_dia.value}`);
                    // console.log(`El valor de pase(s) por completo es: ${pase_completo.value}`);
                    // console.log(`El valor de pase(s) por dos días es: ${pase_dos_dias.value}`);


                    //imprimir total total
                    console.log(`El total a pagar es ${totalAPagar}`);
                    // console.log(typeof(totalAPagar));

                    //imprimir precio extras
                    console.log(`El monto de etiqueta(s) es: ${precioEtiquetas}`);
                    console.log(`El monto de camisa(s) es: ${precioCamisas}`);


                    var listadoProductos = [];


                    // listadoProductos.push(`${pase_dia.value} Pase(s) por un día`);
                    // listadoProductos.push(`${pase_completo.value} Pase(s) completos`);
                    // listadoProductos.push(`${pase_dos_dias.value} Pase(s) por Dos días`);
                    // listadoProductos.push(`${etiquetas.value} Etiquetas`);
                    // listadoProductos.push(`${camisa_evento.value} Camisa(s)`);



                    //mediante estos if se comprueba que el valor en el input sea >= 1 para incluirle en el array
                    //de esta forma se evita agregar elementos como "0 pases por un día", ya que no son necesarios
                    if (pase_dia.value >= 1) {
                        listadoProductos.push(`${pase_dia.value} Pase(s) por un día`);
                    }
                    if (pase_completo.value >= 1) {
                        listadoProductos.push(`${pase_completo.value} Pase(s) completos`);
                    }
                    if (pase_dos_dias.value >= 1) {
                        listadoProductos.push(`${pase_dos_dias.value} Pase(s) por Dos días`);
                    }
                    if (etiquetas.value >= 1) {
                        listadoProductos.push(`${etiquetas.value} Etiquetas`);
                    }
                    if (camisa_evento.value >= 1) {
                        listadoProductos.push(`${camisa_evento.value} Camisa(s)`);

                    }
                    console.table(listadoProductos);

                    //listaProductos --> es la variable que contiene el elemento con el id="listaProductos", es un div
                    //listadoProductos --> es el array declarado para contener la informacion seleccionada por el usuario

                    //se inicializa en "" para que, en caso de que se modificque el valor de un input, este no se sobreescriba
                    //hay que pensarlo como que todo lo que está aquí dentro, se ejecuta cada vez que se hace click en calcular
                    //por tanto, cada vez que esto ocurra, se "reinicia" el contenido HTML de listaProductos



                    listaProductos.innerHTML = "";

                    console.log('asdas');
                    console.log(listadoProductos);

                    if (listadoProductos.length > 0) {
                        listaProductos.style.display = "block";
                        for (var i = 0; i < listadoProductos.length; i++) {
                            listaProductos.innerHTML += listadoProductos[i] + '<br/>';

                            //asignamos el valor de la suma total al div para que se visualice,
                            //redondeando a 2decimales flotantes para evitar errore
                            sumaTotal.style.display = "block";
                            sumaTotal.innerHTML = "$ " + totalAPagar.toFixed(2);
                        }
                    } else {
                        listaProductos.style.display = "none";
                        sumaTotal.style.display = "none";
                    }

                    //tecnologia experimental
                    //este if se agrego para evitar que se ponga el display de los divs de calculo en caso de que
                    //no haya ningun elemento seleccionado

                    //Habilitando boton de pagar
                    btnRegistro.disabled = false;
                    document.getElementById('total_pedido').value = totalAPagar;


                } else {
                    //en caso de que no se haya seleccionado regalo
                    alert('Debes elegir un regalo');
                    regalo.focus();
                }

            }


            function mostrarCantidad() {


                //esta funcion habilita o deshabilita la seleccion de check box dependiendo de los boletos seleccionados

                //aca se usan variables como las declaradas anteriormente, pero no es error ya que solo funcionan en el ambito de esta funcion

                //
                var cantidadDia = parseInt(pase_dia.value, 10) || 0;
                var cantidadCompleto = parseInt(pase_completo.value, 10) || 0;
                var cantidadDosDias = parseInt(pase_dos_dias.value, 10) || 0;
                //

                /***
                 * eliminando atributo name de los check
                 * para luego agregarles en caso de que este dentro de los dias elegidos
                 * de esta forma, no es posible que queden seleccinoados check de dias que no esten en los pases
                 * 
                 */
                var checkViernes = $('#viernes input[type="checkbox"]');
                var checkSabado = $('#sabado input[type="checkbox"]');
                var checkDomingo = $('#domingo input[type="checkbox"]');
                checkViernes.attr('name', '');
                checkSabado.attr('name', '');
                checkDomingo.attr('name', '');





                //en este array se van a guardar los dias dependiendo de las selecciones del usuario
                var diasElegidos = [];

                if (cantidadDia >= 1) {
                    diasElegidos.push('viernes');
                    /***reasignando atributo name para que se agregue al $_POST */
                    checkViernes.attr('name', 'registro[]');
                }
                if (cantidadCompleto >= 1) {
                    diasElegidos.push('viernes', 'sabado', 'domingo');
                    /***reasignando atributo name para que se agregue al $_POST */
                    checkViernes.attr('name', 'registro[]');
                    checkSabado.attr('name', 'registro[]');
                    checkDomingo.attr('name', 'registro[]');
                }
                if (cantidadDosDias >= 1) {
                    diasElegidos.push('viernes', 'sabado');
                    /***reasignando atributo name para que se agregue al $_POST */
                    checkViernes.attr('name', 'registro[]');
                    checkSabado.attr('name', 'registro[]');

                }

                console.table(diasElegidos);


                //con estas tres lineas, oculto los elementos antes de mostrarlos con el for siguiente
                //asi, cuando se deseleccione un dia y se salga del input number, no se seguira mostrando dicha info
                $('#viernes').hide();
                $('#sabado').hide();
                $('#domingo').hide();


                for (var i = 0; i < diasElegidos.length; i++) {
                    document.getElementById(diasElegidos[i]).style.display = "block";
                    console.log(diasElegidos[i]);
                }
            }


        }





    });
    //DOM CONTENT LOADED



})();
//UN EFI, PARA QUE SE EJECUTE SOLO UNA VEZ


$(function() {


    //animaciones para el texto h1
    $('.nombre_sitio').lettering();

    //AGG CLASE A MENU
    $('body.invitados .navegacion_principal a:contains("Invitados")').addClass('aPaginaActivo');
    $('body.conferencia .navegacion_principal a:contains("Conferencia")').addClass('aPaginaActivo');
    $('body.calendario .navegacion_principal a:contains("Calendario")').addClass('aPaginaActivo');


    //menu responsive dentro de una funcion para no ocupar tanto espacio
    menuResponsive();

    function menuResponsive() {
        //MENU RESPONSIVE
        $('.menu_movil').click(function() {

            $('.navegacion_principal').slideToggle();
            //slide toggle es un metodo que alterna entre slideDown y slideUp


        });

    }


    menuFixed();

    function menuFixed() {
        //menu fixed

        //variable que guarda la altura de la ventana
        var windowHeight = $(window).height();
        var barraHeight = $('.barra').innerHeight(); //si se le pasa true, devuelve un objeto con las propiedades de $('.barra')



        //escuchador a la ventana cuando se realice la accion scroll

        $(window).scroll(function() {
            //esta variable guarda el scroll realizado desde arriba
            var scroll = $(window).scrollTop();

            //esto se ejecuta si el scroll realizado es mayor al alto de la ventana
            if (scroll > windowHeight) {
                //en este caso se agrega la clase que mantiene fija la barra
                $('.barra').addClass('barraFija');
                //esta linea es para agregar un margin top igual al alto de la barra y "evitar el salto brusco"
                $('body').css('margin-top', barraHeight + "px");

            } else {
                //en este caso se elimina la clase
                $('.barra').removeClass('barraFija');
                //y se elimina el margin-top agregado anteriormente
                $('body').css('margin-top', '0');
            }
        });
    }

    tabsTalleres();

    function tabsTalleres() {
        //function para hacer funcionar los Tabs de talleres, conferencias y seminarios
        //estos div.ocultar son los que tienen la info que se alterna segun el enlace
        $('div.ocultar').hide();
        //aqui se muestra el primer elemento, para que haya algo presentado al llegar hacia esa parte
        $('.programa_evento .informacion_curso:first').show();
        //a su vez, se le agrega la clase enalceActivo al primer enlace, ya que se está mostrando el primer div
        $('.menu_programa a:first').addClass('enlaceActivo');


        // alert('la mia');
        $('.menu_programa a').on('click', function() {
            //guardamos en la var el valor del href del enlace seleccionado
            //este href apunta a un div, que es el que queremos mostrar
            var enlaceSeleccionado = $(this).attr('href');

            //eliminamos la clase enlaceActivo a todos los elementos
            $('.menu_programa a').removeClass('enlaceActivo');
            //agregamos dicha clase solo al elemento en el que se hizo click
            $(this).addClass('enlaceActivo');
            //por ultimo escondemos todos los div
            $('.programa_evento > div').hide();
            //y mostramos el que tiene id= al href al enlace que se hizo click
            $(enlaceSeleccionado).fadeIn(700);

            return false;
        })
    }


    //animaciones para los números del contador en index.html

    //animaciones para la cuenta regresiva del html
    iniciarContadorResumen();
    iniciarContadorTime();

    function iniciarContadorResumen() {
        $('.resumen_evento li:nth-child(1)>p').animateNumber({ number: 6 }, 2400);
        $('.resumen_evento li:nth-child(2)>p').animateNumber({ number: 15 }, 2400);
        $('.resumen_evento li:nth-child(3)>p').animateNumber({ number: 3 }, 2400);
        $('.resumen_evento li:nth-child(4)>p').animateNumber({ number: 9 }, 2400);


    }

    function iniciarContadorTime() {

        //de la forma que lo pensé la primera vez

        // $('.cuenta_regresiva ul #dias').countdown('2022-2-24 09:00:00', function(event) {
        //     $(this).text(event.strftime('%D'));
        // });
        // $('.cuenta_regresiva ul #horas').countdown('2022-2-24 09:00:00', function(event) {
        //     $(this).text(event.strftime('%H'));
        // });
        // $('.cuenta_regresiva ul #minutos').countdown('2022-2-24 09:00:00', function(event) {
        //     $(this).text(event.strftime('%M'));
        // });
        // $('.cuenta_regresiva ul #segundos').countdown('2022-2-24 09:00:00', function(event) {
        //     $(this).text(event.strftime('%S'));
        // });

        //==============================
        //como lo hace el instructor
        //se reduce el código y se cambia .text por .html


        $('.cuenta_regresiva').countdown('2022-2-24 00:00:00', function(event) {
            $('#dias').html(event.strftime('%D'));
            $('#horas').html(event.strftime('%H'));
            $('#minutos').html(event.strftime('%M'));
            $('#segundos').html(event.strftime('%S'));
        });

    }

    //COLORBOX
    $('.invitado-info').colorbox({ inline: true, width: "50%" });


});