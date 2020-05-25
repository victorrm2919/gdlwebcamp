$(function () {
  $("#registros").DataTable({
    "responsive": true,
    "autoWidth": false,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    }
  });

  $('#ajustes').click(function () { 
    let id = $(this).attr('data-id');
    window.location.href = `editar-admin.php?id=${id}`
  })

  $('#crear-registro').attr('disabled', true);
  
  $('#guardar-registro').on('input', function(e) {
    if ($(e.target).attr('id') == 'password') {
      $('#enviar-registro').attr('disabled', true);
    }

    if ($('#password').val() == '' && $('#repetir-password').val() == '') {
      $('#password').removeClass('is-invalid').removeClass('is-valid');
      $('#repetir-password').removeClass('is-invalid').removeClass('is-valid');
      $('#password').parents('.form-group').removeClass('was-validate');
      $('#repetir-password').parents('.form-group').removeClass('was-validate');
      activarBoton(1,0);
    }
    
  })

  $('#repetir-password').on('input', function() {
    let password_nuevo = $('#password').val();

      if ($(this).val() == password_nuevo) {
        $('#resultado-password').parents('.form-group').addClass('was-validate');
        $(this).addClass('is-valid').removeClass('is-invalid');
        $('input#password').parents('.form-group').addClass('was-validate');
        $('input#password').addClass('is-valid').removeClass('is-invalid');
        activarBoton(0,0);
      } else {
        $('#resultado-password').parents('.form-group').addClass('was-validate');
        $(this).addClass('is-invalid').removeClass('is-valid');
        $('input#password').parents('.form-group').addClass('was-validate');
        $('input#password').addClass('is-invalid').removeClass('is-valid');
        activarBoton(1,1);
      }
  })


});

function activarBoton(btnCrear = 1 , btnEnviar = 1) {
  btnCrear == 1 ?  $('#crear-registro').attr('disabled', true) : $('#crear-registro').attr('disabled', false);
  btnEnviar == 1 ? $('#enviar-registro').attr('disabled', true) : $('#enviar-registro').attr('disabled', false);
}