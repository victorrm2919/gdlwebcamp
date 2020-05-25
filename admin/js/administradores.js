$(function () {
  $('#crear-admin').on('submit', function (e) {
    e.preventDefault();
    let datos = $(this).serializeArray();

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
            title: 'Administrador creado',
            text: `El administrador se creo correctamente`,
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            onClose: () => {
              $('#crear-admin')[0].reset();
              $('#password').removeClass('is-invalid').removeClass('is-valid');
              $('#repetir-password').removeClass('is-invalid').removeClass('is-valid');
              $('#password').parents('.form-group').removeClass('was-validate');
              $('#repetir-password').parents('.form-group').removeClass('was-validate');
            }
          });

        } else {
          Swal.fire({
            icon: 'error',
            title: 'Hubo un error',
            text: 'Valida los datos del administrador',
            timer: 1500,
            timerProgressBar: true,
            onClose: () => {
              $('#crear-admin')[0].reset();
              $('#password').removeClass('is-invalid').removeClass('is-valid');
              $('#repetir-password').removeClass('is-invalid').removeClass('is-valid');
              $('#password').parents('.form-group').removeClass('was-validate');
              $('#repetir-password').parents('.form-group').removeClass('was-validate');
            }
          });
        }
      }
    });
  });

  $('#guardar-registro').on('submit', function (e) {
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
            title: 'Administrador actualizado',
            text: 'El Administrador se actualizo correctamente',
            showConfirmButton: false,
            timer: 1500,
            onClose: () => {
              if(data.nivel == 1) {
                window.location.href = 'lista-admin.php'
              }else {
                window.location.href = 'admin-area.php'

              }
            }
          })

        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error!!',
            text: 'Valida los datos del Administrador',
            showConfirmButton: false,
            timer: 1500,
          })
        }
      }
    });
  });

  $('.borrar-registro').click(function (e) {
    e.preventDefault();

    Swal.fire({
      title: '¿Estás Seguro?',
      text: "Este proceso no se podra revertir",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Borrar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {

        let id = $(this).attr('data-id');
        let tipo = $(this).attr('data-tipo');

        $.ajax({
          type: 'post',
          url: 'modelo-' + tipo + '.php',
          data: {
            'id': id,
            'registro': 'eliminar'
          },
          dataType: 'json',
          success: function (data) {

            if (data.respuesta == 'correcto') {
              $('[data-id="' + data.id + '"]').parents('tr').remove();
  
              Swal.fire({
                title: 'Borrado!',
                text: 'El administrador ha sido borrado correctamente',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
              })
            } else {
              Swal.fire({
                title: 'Hubo un error!',
                text: 'Hubo un error..',
                icon: 'error',
                showConfirmButton: false,
                timer: 1500,
              })
            }
          }
        });
      }
    })
  });

});