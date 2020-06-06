$(function () {

  /* *********************** Librerias *********************** */
  //datatable
  let ultimaCol = $('#registros thead th').length - 1
    $('#registros').DataTable({
      "responsive": true,
      "autoWidth": false,
      "columnDefs": [
        { "width": "25%", "targets": 0 },
        { "width": "15%", "targets": ultimaCol }
      ],
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
      }
    });

  //Daterangepicker
  $('#fecha-evento').daterangepicker({
    singleDatePicker: true,
    autoApply: true,
    showDropdowns: true,
    drops: "auto",
    locale: {
      daysOfWeek: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
      monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
    }
  });

  $('.crear-registro-evento #fecha-evento').val('');

  //Timepicker
  $('#horaEvento').datetimepicker({
    format: 'LT'
  })

  //Select2
  $('.select').select2({
    placeholder: 'Selecciona una opcion',
    allowClear: true
  });

  /* iconpicker */
  $('#icono').iconpicker();
  $("div.iconpicker-popover").addClass('tab-pane show active');
  if($(".iconpicker-component i").attr('class') == '') {
    $(".iconpicker-component i").addClass('fas fa-address-book')
  }

  bsCustomFileInput.init();
  /* *********************** /Librerias *********************** */


  /* Pages
   */
  $('#ajustes').click(function () { 
    let id = $(this).attr('data-id');
    window.location.href = `editar-admin.php?id=${id}`
  })


  /* Administradores */
  
  $('.guardar-registro-admin').on('input', function(e) {
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

  /* Eventos */

  $('.crear-registro-evento').on('input', function(e) {
    if ($(e.target).val() == '') {
      $('#btn-crear-registro-evento').attr('disabled', true);
    }else {
      $('#btn-crear-registro-evento').attr('disabled', false);
    }
  })

});

function activarBoton(btnCrear = 1 , btnEnviar = 1) {
  btnCrear == 1 ?  $('#btn-crear-registro-admin').attr('disabled', true) : $('#btn-crear-registro-admin').attr('disabled', false);
  btnEnviar == 1 ? $('#btn-enviar-registro-admin').attr('disabled', true) : $('#btn-enviar-registro-admin').attr('disabled', false);
}