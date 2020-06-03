$(function () {
    $('#login-admin').on('submit', function (e) {
        e.preventDefault();
        let datos = $(this).serializeArray();
    
        //validacion de datos 
        if ($('#usuario').val() === '' || $('#password').val() === '') {
          Swal.fire({
            icon: 'error',
            title: 'Hubo un error',
            text: 'El usuario y password son obligatorios',
            onRender: () => {
              $('body').attr('style', 'height: 100vh !important')
            }
          })
        } else {

          $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: datos,
            dataType: "json",
            success: function (data) {
    
              if (data.respuesta === 'correcto') {
                Swal.fire({
                  icon: 'success',
                  title: 'Inicio Correcto',
                  text: `Bienvenido ${data.nombre}`,
                  showConfirmButton: false,
                  timer: 2000,
                  timerProgressBar: true,
                  onRender: () => {
                    $('body').attr('style', 'height: 100vh !important')
                  },
                  onClose: () => {
                    window.location.href = 'index.php';
                  }
                })
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Hubo un error',
                  text: 'Valida los datos de inicio de sesión',
                  timer: 2000,
                  onRender: () => {
                    $('body').attr('style', 'height: 100vh !important')
                  },
                  onClose: () => {
                    $('#crear-admin').trigger("reset");
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