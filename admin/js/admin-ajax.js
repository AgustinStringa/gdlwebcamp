"use strict"
$(document).ready(function () {
    //listeners
    const listeners = () => {
        //escuchando el envio del formulario de creacion
        $('#crear-admin').on('submit', crearAdmin);
        //escuchando envío de formulario de logueo
        $('#login-admin').on('submit', loguearAdmin);
        $('#repeat-password').on('keyup', checkPass);
        $('#repeat-password').on('focus', checkPass);
        $('#repeat-password').on('blur', checkPass);
    }

    listeners();

    function crearAdmin(e) {
        e.preventDefault();
        const datos = $(this).serializeArray();

        const contra = datos[2].value
        const r_contra = datos[3].value

        //comprobar que coincidan 
        if (contra === r_contra) {

            //ajax para crear registro
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function (datosRecibidos) {
                    console.log(datosRecibidos);
                    const usuario = datosRecibidos.usuario;
                    if (datosRecibidos.respuesta == 'exito') {
                        Swal.fire(
                            'Perfecto!',
                            `Se registró correctamente el nuevo administrador "${usuario}"`,
                            'success'
                        );
                        //reiniciar formulario
                        $('#crear-admin')[0].reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Algo salió mal'
                        });
                    }
                }
            });
        } else {
            Swal.fire(
                'Los passwords no coinciden',
                `Intenta de nuevo`,
                'error'
            )
        }

    }

    function loguearAdmin(e) {
        e.preventDefault();
        const datosLogin = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datosLogin,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (dataLogin) {

                if (dataLogin.respuesta == 'exito') {
                    const usuarioLogueado = dataLogin.usuario;
                    Swal.fire(
                        'Logueado correctamente!',
                        `Bienvenido, ${usuarioLogueado}`,
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed || result.isDismissed) {
                            window.location.href = 'admin-area.php';
                        }
                    });
                } else if (dataLogin.respuesta == 'inconsistente') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'La constraseña introducida no es correcta'
                    });
                } else if (dataLogin.respuesta == 'inexistente') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Usuario inexistente'
                    });
                }
            }
        });
    }

    //comprobar que los passwords sean iguales
    function checkPass(e) {
        const texto = e.target.value
        const contra = document.querySelector('#password').value
        const span = document.querySelector('#resultado-password')



        if (texto.length > 0 && contra.length > 0) {
            console.log(texto.length)
            console.log(contra.length)
            if (texto === contra) {
                span.textContent = 'Las contraseñas coinciden '
                span.classList.remove('alert-danger')
                span.classList.add('help-block', 'alert-success')
                span.innerHTML += `<i class="fas fa-check"></i>`
            } else {
                span.textContent = 'Las contraseñas NO coinciden '
                span.classList.remove('alert-success')
                span.classList.add('help-block', 'alert-danger')
                span.innerHTML += `<i class="fas fa-times"></i>`
            }
        } else {
            span.classList.remove('alert-danger');
            span.classList.remove('alert-success');
            span.innerHTML = ' '
            span.textContent = ' '
        }



    }

});