$(document).ready(function () {



    const borrar_registro = $('.borrar_registro');
    const submitUpdate = $('#actualizar-admin');
    const ojos = $('.mostrar-pass')

    //activar table administradores
    if (document.querySelector('#registros')) {

        $(function () {
            $("#registros")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    language: {
                        decimal: "",
                        emptyTable: 'No hay registros introducidos en esta tabla',
                        info: "Mostrando _START_ - _END_ de _TOTAL_ registros",
                        infoEmpty: '0 registros',
                        infoFiltered: "(filtrado de _MAX_ entradas totales)",
                        lengthMenu: "Mostrar _MENU_ entradas",
                        loadingRecords: "Cargando recursos...",
                        processing: "Procesando...",
                        zeroRecords: "No se encotraron registros",
                        search: 'Buscar',
                        paginate: {
                            'next': 'Siguiente',
                            'previous': 'Anterior'
                        }
                    },
                    autoWidth: false,
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo("#registros_wrapper .col-md-6:eq(0)");
        });
    }

    //listeners
    submitUpdate.on('submit', actualizarRegistroAdmin);
    borrar_registro.on('click', eliminarRegistro);
    ojos.on('click', alternarVisibilidad);

    function alternarVisibilidad(e) {
        //modificando atributo del elemento <input>
        const icono = e.target
        const padre = icono.parentElement

        const hijos = padre.childNodes
        Object.values(hijos).forEach(e => {

            if (e.type == 'password') {
                e.type = 'text'

            } else if (e.type == 'text') {
                e.type = 'password'
            }
        })

        //modificar clase para cambiar icono
        if (e.target.classList.contains('fa-eye')) {
            e.target.classList.remove('fa-eye')
            e.target.classList.add('fa-eye-slash')
        } else {
            e.target.classList.add('fa-eye')
            e.target.classList.remove('fa-eye-slash')
        }
    }

    function actualizarRegistroAdmin(e) {
        e.preventDefault();
        const datos = $(this).serializeArray();
        console.log(datos);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (datosRecibidos) {
                console.log(datosRecibidos);
                const usuario = datosRecibidos.usuario;
                const nombre = datosRecibidos.nombre;
                if (datosRecibidos.respuesta == 'exito') {
                    Swal.fire(
                        'Perfecto!',
                        `Se actualizó correctamente el registro correspondiente al administrador "${usuario}"`,
                        'success'
                    );
                    //reiniciar formulario
                    $('#actualizar-admin')[0].reset();

                    document.querySelector('#usuario').value = usuario;
                    document.querySelector('#nombre').value = nombre;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo salió mal'
                    });
                }
            }
        })
    }

    function eliminarRegistro(e) {

        if (e.target.classList.contains('borrar_registro')) {
            e.preventDefault();
            Swal.fire({
                title: 'Seguro deseas eliminar este registro?',
                text: "Esta acción no es removible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'cancelar',
                confirmButtonText: 'Si, eliminalo'
            }).then((result) => {
                if (result.isConfirmed) {
                    const self = e.target;
                    const id_deletable = self.getAttribute('data_id');
                    const tipo = self.getAttribute('data-tipo');

                    //formdata
                    const datosDelete = new FormData();
                    datosDelete.append('id-deletable', id_deletable);
                    //console.log(...datosDelete);

                    $.ajax({
                        type: 'POST',
                        data: datosDelete,
                        url: `modelo-${tipo}.php`,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        beforeSend: function (asd) {
                            console.log(asd);
                        },
                        success: function (datosEliminacion) {
                            console.log(datosEliminacion);
                            if (datosEliminacion.respuesta == 'exito') {
                                if (tipo == 'admin') {
                                    self.parentElement.parentElement.remove()
                                    //tambien se puede hacer 
                                    // $([data-id="datosEliminacion.id-eliminado"]).remove()
                                }
                                if (tipo == 'evento') {
                                    self.parentElement.parentElement.remove()
                                }
                                if (tipo == 'categorias') {
                                    self.parentElement.parentElement.remove()
                                }

                            } else {
                                Swal.fire(
                                    'Error',
                                    `No se ha podido eliminar el registro`,
                                    'error'
                                );
                            }

                        },
                        error: function (dataError) {
                            // console.log(dataError);
                        }
                    })

                    //importantes parametros processData: false y
                    //contentType: false;
                }
            })

        }
    }


    /***
     * =================EVENTOS=================
     */



    // agregando datatable para eventos:

    if (document.querySelector('#lista-eventos')) {

        $(function () {
            $("#lista-eventos")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    language: {
                        decimal: "",
                        emptyTable: 'No hay registros introducidos en esta tabla',
                        info: "Mostrando _START_ - _END_ de _TOTAL_ registros",
                        infoEmpty: '0 registros',
                        infoFiltered: "(filtrado de _MAX_ entradas totales)",
                        lengthMenu: "Mostrar _MENU_ entradas",
                        loadingRecords: "Cargando recursos...",
                        processing: "Procesando...",
                        zeroRecords: "No se encotraron registros",
                        search: 'Buscar',
                        paginate: {
                            'next': 'Siguiente',
                            'previous': 'Anterior'
                        }
                    },
                    autoWidth: false,
                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo("#lista-eventos_wrapper .col-md-6:eq(0)");
        });

        if (document.querySelector("#lista-eventos_wrapper")) {
            document.querySelector("#lista-eventos_wrapper").style = 'padding:2rem; margin-top: 2rem;';
        }

    }

    // reaccionando a la creacion de un nuevo evento
    $('#crear-evento').on('submit', crearEvento);

    const fecha = new Date()

    /**estableciendo limite de fecha */
    const hoy = `${fecha.getFullYear()}-${fecha.getMonth() + 1}-${fecha.getDate()}`;

    if (document.querySelector('#fecha-evento')) {
        $('#fecha-evento')[0].min = hoy;
        $('#fecha-evento')[0].max = "2021-12-31";
    }

    if (document.querySelector('#hora-evento')) {
        /**estableciendo limite de hora */
        $('#hora-evento')[0].min = "09:00"
        $('#hora-evento')[0].max = "19:00"
    }




    //inicializando selects
    if (document.querySelector('.select2bs4')) {
        //Initialize Select2 Elements
        $(".select2bs4").select2({
            theme: "bootstrap4",
        });
    }

    function crearEvento(e) {
        e.preventDefault();
        //array de objetos que contiene los datos del formulario
        const datos_evt = $('#crear-evento').serializeArray();
        //console.log(datos_evt);

        $.ajax({
            type: $(this).attr('method'),
            data: datos_evt,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (datosRecibidos) {
                //console.log(datosRecibidos);
                if (datosRecibidos.respuesta == 'exito') {
                    const nombre_evento = datosRecibidos.nombre_evento;
                    Swal.fire(
                        'Evento creado correctamente!',
                        `"${nombre_evento}" se creó exitosamente`,
                        'success'
                    )
                    $('#crear-evento')[0].reset();

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido crear el evento, intentalo nuevamente'
                    });
                }
            },
            beforeSend: function (data) {
                //console.log(data)
            },
            error: function (data) {
                console.log(data)
            }
        })

    }

    /**Reaccionando a la actualizacion de un evento */
    // Linea para probar el form sin validar
    //$('button[type="submit"]').attr('formnovalidate', 'true');

    if (document.querySelector('#editar-evento')) {
        document.querySelector('#editar-evento').addEventListener('submit', editarEvento);
        $('#fecha-evento')[0].min = ' ';
        $('#fecha-evento')[0].max = " ";

    }

    function editarEvento(e) {
        e.preventDefault();
        const datosActualizacion = $(this).serializeArray();
        console.log(datosActualizacion);

        $.ajax({
            type: $(this).attr('method'),
            data: datosActualizacion,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (datosRecibidos) {
                console.log(datosRecibidos);
                if (datosRecibidos.respuesta == 'exito') {

                    Swal.fire(
                        'Evento modificado',
                        `El evento de guardó exitosamente`,
                        'success'
                    )
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido modificar el evento, inténtalo nuevamente'
                    });
                }
            },
            beforeSend: function (data) {
                //console.log(data)
            },
            error: function (data) {
                console.log(data)
            }
        })

    }


    /***
    * =================EVENTOS=================
    */


    /***
    * =================CATEGORIAS=================
    */

    //CREANDO CATEGORIA

    //ADAPTANDO FONT-AWESOME ICON-PICKER
    if (document.querySelector('.icp-auto')) {
        $('.icp-auto').iconpicker(); //inicializando 

        const iconos = document.querySelectorAll('.iconpicker-item');
        for (icon of iconos) {
            icon.addEventListener('click', function (e) {
                e.preventDefault(); //prevenir uso del enlace y alteracion de la url
            })
        }

        const padre_icon = document.querySelector('.icp-auto').parentElement.parentElement;
        for (hijo of padre_icon.children) {
            hijo.classList.remove('fade'); //eliminando clase conflictiva fade
        }
    }

    //creando nueva categoria
    if (document.querySelector('#crear-categoria')) {
        document.querySelector('#crear-categoria').addEventListener('submit', crearCategoria);
    }

    function crearCategoria(e) {
        e.preventDefault();
        const dataUpdateCat = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: dataUpdateCat,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (datosRecibidos) {
                console.log(datosRecibidos);

                if (datosRecibidos.respuesta == 'exito') {
                    Swal.fire(
                        'Categoría creada correctamente',
                        `La categoria "${datosRecibidos.nombre}" se guardó exitosamente`,
                        'success'
                    )
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido crear la categoría, inténtalo nuevamente'
                    });
                }
            },
            beforeSend: function (data) {
                //console.log(data)
            },
            error: function (data) {
                console.log(data)
            }
        });
        //ajax
    }

    //editanto categoria desde formulario
    if (document.querySelector('#editar-categoria')) {

        document.querySelector('#editar-categoria').addEventListener('submit', editarCategoria);
        const inputs = document.querySelectorAll('form input');
        inputs.forEach(input => {
            input.style.color = '#007bff';
        })
    }

    function editarCategoria(e) {
        e.preventDefault();
        const dataEdicionCat = $(this).serializeArray();


        $.ajax({
            type: $(this).attr('method'),
            data: dataEdicionCat,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (datosRecibidos) {
                //console.log(datosRecibidos);
                if (datosRecibidos.respuesta == 'exito') {
                    Swal.fire(
                        'Categoría editada correctamente',
                        `La categoria "${datosRecibidos.nuevo_nombre}" se guardó correctamente`,
                        'success'
                    )
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido crear la categoría, inténtalo nuevamente'
                    });
                }
            },
            beforeSend: function (data) {
                //console.log(data)
            },
            error: function (data) {
                console.log(data)
            }
        });
        //ajax

    }


    //editando nombre de categoria desde pagina lsitas
    //const asd = document.querySelectorAll('.editar_registro_categoria');

    /*  asd.forEach(a => {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                const self = a;
                const tr_padre = self.parentElement.parentElement;
    
                for (elemento of tr_padre.children) {
                    if (elemento.classList.contains('dtr-control')) {
                        const hijo_obj = elemento;
                        const id_editable = this.getAttribute('id-cat');
    
                        hijo_obj.innerHTML = `<td>
                        <input type="text" placeholder="inserte el nuevo nombre">
                        </td>`;
                        hijo_obj.firstElementChild.focus();
    
                        hijo_obj.firstElementChild.addEventListener("keypress", function (e) {
                            if (e.key == "Enter") {
                                const nuevoNombre = this.value;
    
                                const datosEditCat = new FormData();
                                datosEditCat.append('editar-categoria', '1');
                                datosEditCat.append('nuevo-nombre', nuevoNombre);
                                datosEditCat.append('id-editable', id_editable);
    
                                $.ajax({
                                    type: 'POST',
                                    data: datosEditCat,
                                    url: 'modelo-categorias.php',
                                    dataType: 'json',
                                    processData: false,  // tell jQuery not to process the data
                                    contentType: false,   // tell jQuery not to set contentType,
                                    success: function (datosRecibidos) {
                                        console.log(datosRecibidos);
                                        if (datosRecibidos.respuesta == 'exito') {
                                            hijo_obj.textContent = `${nuevoNombre}`
                                            Swal.fire(
                                                'Categoría modificada',
                                                `Ahora la categoría se llama ${datosRecibidos.nuevo_nombre}`,
                                                'success'
                                            )
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'No se ha podido modificar el evento, inténtalo nuevamente'
                                            });
                                        }
                                    },
                                    beforeSend: function (data) {
                                        //console.log(data)
                                    },
                                    error: function (data) {
                                        //console.log(data)
                                    }
                                })
                            }
                        });
                    }
                }
            })
    
        });
    */


    // LA ELIMINACION SE REALIZA DESDE EL METODO ELIMINAR REGISTRO
    /***
    * =================CATEGORIAS=================
    */

    /***
    * =================INVITADOS=================
    */
    if (document.querySelector('#guardar-registro-archivo')) {

        document.querySelector('#guardar-registro-archivo').addEventListener('submit', guardarRegistroArchivo);

        function guardarRegistroArchivo(e) {
            e.preventDefault();

            var tipo;
            const datosNewGuest = new FormData(this);
            if (datosNewGuest.has('agregar-invitado')) {
                tipo = 'invitado';
            }

            console.log(...datosNewGuest);

            $.ajax({
                type: $(this).attr('method'),
                data: datosNewGuest,
                url: $(this).attr('action'),
                dataType: 'json',
                processData: false,
                contentType: false,
                async: true,
                cache: false,
                beforeSend: function (asd) {
                    //console.log(asd);
                },
                success: function (datosEliminacion) {
                    console.log(datosEliminacion);
                    if (datosEliminacion.respuesta == 'exito') {
                        if (tipo == 'invitado') {
                            Swal.fire(
                                'Perfecto',
                                `El invitado ${datosEliminacion.nombre_invitado} se creó correctamente`,
                                'success'
                            );

                            $('#guardar-registro-archivo')[0].reset();
                            //tambien se puede hacer 
                            // $([data-id="datosEliminacion.id-eliminado"]).remove()
                        }


                    } else {
                        Swal.fire(
                            'Error',
                            `No se ha podido agregar el registro`,
                            'error'
                        );
                    }

                },
                error: function (dataError) {
                    // console.log(dataError);
                }
            })

        }
    }


})