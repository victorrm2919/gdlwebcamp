$(function () {
    $('#crear-admin').on('submit', function (e) {
        e.preventDefault();
        let datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: datos,
            dataType: "json",
            success: function (data) {
                if (data.respuesta === 'correcto') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Administrador creado',
                        text: `El administrador se creo correctamente`
                    })
                    .then(resultado => {
                        if(resultado.value) {
                            $('#crear-admin')[0].reset();  //resetea campos de texto
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un error',
                        text: 'Valida los datos del administrador, hubo un error'
                    })
                    .then(resultado => {
                        if(resultado.value) {
                            $('#crear-admin').trigger("reset");   //reseta todo sin importar campos
                        }
                    });
                }
            }
        });
    });
    
    $('#login-admin').on('submit', function (e) {
      e.preventDefault();
      let datos = $(this).serializeArray();

      //validacion de datos 
      if ($('#usuario').val() === '' || $('#password').val() === '') {
        Swal.fire({
          icon: 'error',
          title: 'Hubo un error',
          text: 'El usuario y password son obligatorios'
        })
      } else {
        console.log(datos);
        $.ajax({
          type: $(this).attr('method'),
          url: $(this).attr('action'),
          data: datos,
          dataType: "json",
          success: function (data) {

            console.log(data);

            if (data.respuesta === 'correcto') {
              Swal.fire({
                  icon: 'success',
                  title: 'Inicio Correcto',
                  text: `Bienvenido ${data.nombre}`,
                  onRender: () =>{$('body').attr('style', 'height: 100vh !important')}
                })
                .then(resultado => {
                  //redireccionar a el dashboard
                  if (resultado.value) {
                    window.location.href = 'admin-area.php';
                  }
                });
            } else {
              Swal.fire({
                  icon: 'error',
                  title: 'Hubo un error',
                  text: 'Valida los datos de inicio de sesión',
                  timer: 3000,
                  onRender: () =>{$('body').attr('style', 'height: 100vh !important')}
                })
                .then(resultado => {
                  if (resultado.value) {
                    $('#crear-admin').trigger("reset"); //reseta todo sin importar campos
                  }
                });
            }
          }
        });
      }
    });
    $('#cerrar-sesion').click(function (e) { 
        window.location.href = 'login.php?cerrar_sesion=true';
    })
});