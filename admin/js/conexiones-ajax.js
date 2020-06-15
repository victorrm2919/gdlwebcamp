$(function () {
 

  /* -------------------------------------------Eventos-------------------------------------------  */

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
        let registro, articulo, evento
        if (data.registro == 'Nuevo') {
         evento = 'creo';
          if (data.tipo == 'Categoria') {
            registro = 'creada';
            articulo = 'La';
          } else {
            registro = 'creado';
              articulo = 'El';
          }
        }

        if (data.registro == 'Actualizar') {
          evento = 'actualizo';
          if (data.tipo == 'Categoria') {
            registro = 'actualizada';
            articulo = 'La';
          } else {
            registro = 'actualizado';
            articulo = 'El';
          }
        }
        
        if (data.respuesta === 'correcto') {
          Swal.fire({
            icon: 'success',
            title: `${data.tipo} ${registro}`,
            text: `${articulo} ${data.tipo} se ${evento} correctamente`,
            showConfirmButton: false,
            timer: 1500,
            onClose: () => {
              
              //Limpieza al crear registros
              if (data.registro == 'Nuevo') {
                $('#guardar-registro')[0].reset();
                if (data.tipo == 'Administrador') {crearAdmin()}
                if (data.tipo == 'Evento') {crearEvento()}
                if (data.tipo == 'Usuario') {crearUsuario()}
              }

              //Acciones al editar registros
              if (data.registro == 'Actualizar'){
                if (data.tipo == 'Administrador') {
                  editarAdmin(data.nivel);
                }
                if (data.tipo == 'Evento') {
                  window.location.href = 'lista-evento.php'
                }
                if (data.tipo == 'Categoria') {
                  window.location.href = 'lista-categoria.php'
                }
                if (data.tipo == 'Usuario') {
                  window.location.href = 'lista-registrados.php'
                }
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
            onClose: () => {
              if (data.registro == 'Nuevo') {
                if (data.tipo == 'Administrador') {
                  crearAdmin();
                }
              }
            }
          })
        }
      }
    });
  });

  $('#registros tbody').on('click', 'a.borrar-registro', borrarRegistro);

  $('#guardar-registro-archivo').on('submit', function (e) {
    e.preventDefault();
    let datos = new FormData(this);

    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: datos,
      dataType: "json",
      contentType: false,
      processData: false,
      async: true,
      cache: false,
      success: function (data) {
        if (data.respuesta === 'correcto') {
          
          Swal.fire({
            icon: 'success',
            title: `${data.tipo} guardado`,
            text: `El ${data.tipo} se guardo correctamente`,
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            onClose: () => {
              if (data.registro == 'Nuevo') {
                $('#guardar-registro-archivo')[0].reset();
              }

              if (data.registro == 'Actualizar') {
                window.location.href = 'lista-invitados.php'
              }
            }
          });

        } else {
          Swal.fire({
            icon: 'error',
            title: 'Hubo un error',
            text: 'Valida los datos del formulario',
            timer: 1500,
            timerProgressBar: true
          });
        }
      }
    });
  });

  function borrarRegistro(e) {
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

              let borrar, articulo;
              if (data.tipo == 'Categoria') {
                borrar = 'eliminada';
                articulo = 'La';
              } else {
                borrar = 'eliminado';
                articulo = 'El';
              }

              $('[data-id="' + data.id + '"]').parents('tr').remove();

              Swal.fire({
                title: 'Eliminado!',
                text: `${articulo} ${data.tipo} ha sido ${borrar} correctamente`,
                icon: 'success',  
                showConfirmButton: false,
                timer: 1500
              })
            } else {
              Swal.fire({
                title: 'Hubo un error!',
                text: 'Hubo un error..',
                icon: 'error',
                showConfirmButton: false,
                timer: 1500
              })
            }
          }
        });
      }
    })
  }

});
/* -------------------------------------------Funciones-------------------------------------------  */
function crearAdmin() {
  $('#password').removeClass('is-invalid').removeClass('is-valid');
  $('#repetir-password').removeClass('is-invalid').removeClass('is-valid');
  $('#password').parents('.form-group').removeClass('was-validate');
  $('#repetir-password').parents('.form-group').removeClass('was-validate');
}

function crearEvento() {
  $('#categoria-evento').val(null).trigger('change');
  $('#invitado').val(null).trigger('change');
}

function editarAdmin(nivel) {
  if (nivel == 1) {
    window.location.href = 'lista-admin.php'
  } else {
    window.location.href = 'admin-area.php'
  }
}

function crearUsuario() {
  $('ul#lista-producto li').remove();
  $('#suma-total').text('');
  $('#total_pedido').removeAttr('value');
  $('.msjSeleccion').css('display', 'block');
  $('.contenido-dia').css('display', 'none');
  $('#regalo').val(null).trigger('change');
}