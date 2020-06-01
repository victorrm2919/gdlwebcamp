$(function () {
  /* -------------------------------------------Eventos-------------------------------------------  */

  $('#crear-registro').on('submit', function (e) {
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
            title: `${data.tipo} creado`,
            text: `El ${data.tipo}  se creo correctamente`,
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            onClose: () => {
              $('#crear-registro')[0].reset();
              if (data.tipo == 'Administrador') {crearAdmin()}
              if (data.tipo == 'Evento') {crearEvento()}
            }
          });

        } else {
          Swal.fire({
            icon: 'error',
            title: 'Hubo un error',
            text: 'Valida los datos del formulario',
            timer: 1500,
            timerProgressBar: true,
            onClose: () => {
              if (data.tipo == 'Administrador') {
                crearAdmin();
              }
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
      url:  $(this).attr('action'),
      data: datos,
      dataType: "json",
      success: function (data) {
        console.log(data);
        if (data.respuesta === 'correcto') {
          Swal.fire({
            icon: 'success',
            title: `${data.tipo} actualizado`,
            text: `El ${data.tipo} se actualizo correctamente`,
            showConfirmButton: false,
            timer: 1500,
            onClose: () => {
              if (data.tipo == 'Administrador') {
                editarAdmin(data.nivel);
              }
              if (data.tipo == 'Evento') {
                window.location.href = 'lista-evento.php'
              }
            }
          })

        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error!!',
            text: 'Valida los datos del formulario',
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
                text: `El ${data.tipo} ha sido borrado correctamente`,
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

/* -------------------------------------------Funciones-------------------------------------------  */
function crearAdmin() {
  $('#password').removeClass('is-invalid').removeClass('is-valid');
  $('#repetir-password').removeClass('is-invalid').removeClass('is-valid');
  $('#password').parents('.form-group').removeClass('was-validate');
  $('#repetir-password').parents('.form-group').removeClass('was-validate');
}

function crearEvento() {
  $('#categoria-evento').empty();
  $('#invitado').empty();
}

function editarAdmin(nivel) {
  if (nivel == 1) {
    window.location.href = 'lista-admin.php'
  } else {
    window.location.href = 'admin-area.php'
  }
}