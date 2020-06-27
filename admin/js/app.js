 /* Navegacion */
 let pathPagina = window.location.pathname, indiceAdmin = pathPagina.indexOf('admin/');
 let pagina = pathPagina.substr((indiceAdmin + 6), pathPagina.length)

 $(`.sidebar .nav-item a[href="${pagina}"]`).toggleClass('active').parents('li.has-treeview').toggleClass('menu-open').children('a.nav-link').toggleClass('active')
 


$(function () {

  /* *********************** Librerias *********************** */
  //Chart JS
  //-------------
  //- LINE CHART -
  //--------------

  $.getJSON("servicios-registrados.php",function (data) {
      
    let datos = data.datos;

    let fechas = datos.map(function (e) {
      return e.fecha
    });

    let cantidades = datos.map(function (e) {
      return e.cantidad
    });

    let lineChart = new Chart($('#grafica-registros').get(0).getContext('2d'), {
      type: 'line',
      data: {
        labels: fechas,
        datasets: [{
          data: cantidades,
          label: 'Usuarios',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: 3,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          fill: false
        }]
      },
      options: {
        maintainAspectRatio: false,
        elements: {
          point: {
            pointStyle: 'circle'
          }
        },
        responsive: true,
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            ticks: {
              stepSize: 1
            },
            gridLines: {
              display: false,
            }
          }]
        }
      }
    })
    
  });
  

  //datatable
  let ultimaCol = $('#registros thead th').length
  let porcentaje, posicion;
  if ($('#registros').hasClass('registros_inv')) {
    porcentaje = '50%';
    posicion = 1;
  } else {
    porcentaje = `${100/(ultimaCol)}%`;
    posicion = '_all'
  }

  let table = $('#registros').DataTable({
    "responsive": true,
    "autoWidth": false,
    "columnDefs": [{
      "width": porcentaje,
      "targets": posicion
    }, ],
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    }
  });

  if ($('#registros').hasClass('registrados')) {
    table.column(2).order('desc').draw();
  }

  //Daterangepicker
  $('#fecha-evento').daterangepicker({
    singleDatePicker: true,
    autoApply: true,
    showDropdowns: true,
    drops: "auto",
    locale: {
      daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
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
  if ($(".iconpicker-component i").attr('class') == '') {
    $(".iconpicker-component i").addClass('fas fa-address-book')
  }

  bsCustomFileInput.init();
  /* *********************** /Librerias *********************** */


  /* Pages */
  

  /* Administradores */

  $('#ajustes').click(function () {
    let id = $(this).attr('data-id');
    window.location.href = `editar-admin.php?id=${id}`
  })


  $('.guardar-registro-admin').on('input', function (e) {
    if ($(e.target).attr('id') == 'password') {
      $('#enviar-registro').attr('disabled', true);
    }

    if ($('#password').val() == '' && $('#repetir-password').val() == '') {
      $('#password').removeClass('is-invalid').removeClass('is-valid');
      $('#repetir-password').removeClass('is-invalid').removeClass('is-valid');
      $('#password').parents('.form-group').removeClass('was-validate');
      $('#repetir-password').parents('.form-group').removeClass('was-validate');
      activarBoton(1, 0);
    }

  })

  $('#repetir-password').on('input', function () {
    let password_nuevo = $('#password').val();

    if ($(this).val() == password_nuevo) {
      $('#resultado-password').parents('.form-group').addClass('was-validate');
      $(this).addClass('is-valid').removeClass('is-invalid');
      $('input#password').parents('.form-group').addClass('was-validate');
      $('input#password').addClass('is-valid').removeClass('is-invalid');
      activarBoton(0, 0);
    } else {
      $('#resultado-password').parents('.form-group').addClass('was-validate');
      $(this).addClass('is-invalid').removeClass('is-valid');
      $('input#password').parents('.form-group').addClass('was-validate');
      $('input#password').addClass('is-invalid').removeClass('is-valid');
      activarBoton(1, 1);
    }
  })

  function activarBoton(btnCrear = 1, btnEnviar = 1) {
    btnCrear == 1 ? $('#btn-crear-registro-admin').attr('disabled', true) : $('#btn-crear-registro-admin').attr('disabled', false);
    btnEnviar == 1 ? $('#btn-enviar-registro-admin').attr('disabled', true) : $('#btn-enviar-registro-admin').attr('disabled', false);
  }



  /* Eventos */

  $('.crear-registro-evento').on('input', function (e) {
    if ($(e.target).val() == '') {
      $('#btn-crear-registro-evento').attr('disabled', true);
    } else {
      $('#btn-crear-registro-evento').attr('disabled', false);
    }
  })


  /* Categoria Evento */


  $('.crear-registro-categoria').on('input', function (e) {
    if ($(e.target).val() == '') {
      $('#btn-crear-registro-categoria').attr('disabled', true);
    } else {
      $('#btn-crear-registro-categoria').attr('disabled', false);
    }
  })

  /* Invitados */

  $('.crear-registro-invitado').on('input', function (e) {
    if ($(e.target).val() == '') {
      $('#btn-crear-registro-invitado').attr('disabled', true);
    } else {
      $('#btn-crear-registro-invitado').attr('disabled', false);
    }
  })

  /* Registrados */

  $('#nombre, #apellido, #email').blur(function (e) {
    let valor = $(this).val();
    let campo = $(this).attr('id');
    if (valor == '') {
      $(this).parents('.validacion').addClass('was-validate');
      $(this).addClass('is-invalid');
      $('#validacionInfo').fadeIn().text(`Es necesario ingresar el ${campo}`);
    } else if ($(this).val() != '') {
      $(this).removeClass('is-invalid');
      if (!$(this).parents('.validacion').children().children().children().hasClass('is-invalid')) {
        $(this).parents('.validacion').removeClass('was-validate');
        $(this).removeClass('is-invalid');
        $('#validacionInfo').fadeOut().text('');
      }
    }
  });

  /* Regalos */

  $('.crear-registro-regalo').on('input', function (e) {
    if ($(e.target).val() == '') {
      $('#btn-crear-registro-regalo').attr('disabled', true);
    } else {
      $('#btn-crear-registro-regalo').attr('disabled', false);
    }
  })


});
