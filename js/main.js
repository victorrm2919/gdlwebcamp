(function () {
  'use strict'

  document.addEventListener('DOMContentLoaded', function(){
    var map = L.map('mapa').setView([19.266607, -98.89678] /* Coordenadas */ , 16) /* Zoom */ ;

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([19.266607, -98.89678] /* Coordenadas */ ).addTo(map)
      .bindPopup('Conferencia 2020 <br> Boletos Disponibles')
      .openPopup();
    L.popup({maxWidth: 600});
  });
})();

(function () {
  'use strict'


  document.addEventListener('DOMContentLoaded', function () {

    //formulario de compra

    //Variables datos usuario
    let nombre = document.getElementById('nombre'),
      apellido = document.getElementById('apellido'),
      email = document.getElementById('email');

    //Variables pases
    let paseDia = document.getElementById('pase-dia'),
      paseDosDias = document.getElementById('pase-dosDias'),
      paseCompleto = document.getElementById('pase-completo');

    //Botones y divs
    let calcular = document.getElementById('calcular'),
      errorDiv = document.getElementById('error'),
      botonRegistro = document.getElementById('btnRegistro'),
      listaProductos = document.getElementById('lista-producto'),
      total = document.getElementById('suma-total');

    //Dias evento
    let viernes = document.getElementById('viernes'),
      sabado = document.getElementById('sabado'),
      domingo = document.getElementById('domingo');
    // Extras

    let camisas = document.getElementById('camisa-evento'),
      etiquetas = document.getElementById('etiquetas'),
      regalo = document.getElementById('regalo');


      botonRegistro.disabled = true;

      //Calculo de montos en resumen
        calcular.addEventListener('click', calcularMontos);

    //Muestra dias dependiendo pase
   
      paseDia.addEventListener('blur', mostrarDias);
      paseDosDias.addEventListener('blur', mostrarDias);
      paseCompleto.addEventListener('blur', mostrarDias);
    


    //Validador de informacion en formulacion principal de cliente
   
      nombre.addEventListener('blur', validarInfo);
      apellido.addEventListener('blur', validarInfo);
      email.addEventListener('blur', validarInfo);
      email.addEventListener('blur', validarMail);
    
    //===========================================================
    //funciones

    function calcularMontos(event) {
      event.preventDefault(); //evita que se ejecute sin realizar la accion requerida en el listener

      if (regalo.value === "") {
        alert('Selecciona tu regalo');
        regalo.focus();
      } else {
        let boletoDia = parseInt(paseDia.value) || 0,
          boletoDosDias = parseInt(paseDosDias.value) || 0,
          boletoCompleto = parseInt(paseCompleto.value) || 0,
          cantCamisas = parseInt(camisas.value) || 0,
          cantEtiquetas = parseInt(etiquetas.value) || 0;

        let totalPago = (boletoDia * 30) + (boletoDosDias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * 0.93) + (cantEtiquetas * 2);

        let listadoProductos = [];

        if (boletoDia >= 1) {
          listadoProductos.push('Pases por dia: ' + boletoDia);
        }
        if (boletoDosDias >= 1) {
          listadoProductos.push('Pases por 2 dias: ' + boletoDosDias);
        }
        if (boletoCompleto >= 1) {
          listadoProductos.push('Pases Completos: ' + boletoCompleto);
        }
        if (cantCamisas >= 1) {
          listadoProductos.push('Camisas de Evento: ' + cantCamisas);
        }
        if (cantEtiquetas >= 1) {
          listadoProductos.push('Etiquetas: ' + cantEtiquetas);
        }

        switch (regalo.value) {
          case '2':
            listadoProductos.push('REGALO: Etiquetas');
            break;
          case '1':
            listadoProductos.push('REGALO: Pulsera');
            break;
          case '3':
            listadoProductos.push('REGALO: Plumas');
            break;
        }

        listaProductos.style.display = 'block';
        listaProductos.innerHTML = '';

        for (const producto of listadoProductos) {
          listaProductos.innerHTML += `<li>${producto}</li>`;
        }

        total.innerHTML = `$${totalPago.toFixed(2)}`;

        botonRegistro.disabled = false;
        document.getElementById('total_pedido').value = totalPago;
      } 
    }

    function mostrarDias(event) {
      event.preventDefault();
      let boletoDia = parseInt(paseDia.value) || 0,
        boletoDosDias = parseInt(paseDosDias.value) || 0,
        boletoCompleto = parseInt(paseCompleto.value) || 0;

      let diasElegidos = [];

      if (boletoDia > 0) {
        diasElegidos.push('viernes');
      }
      if (boletoDosDias > 0) {
        diasElegidos.push('viernes', 'sabado');
      }
      if (boletoCompleto > 0) {
        diasElegidos.push('viernes', 'sabado', 'domingo');
      }

      if (boletoDia > 0 || boletoDosDias > 0 || boletoCompleto > 0) {
        for (const dia of diasElegidos) {
          document.getElementById(dia).style.display = 'block';
        }
      } else {
        viernes.style.display = 'none';
        sabado.style.display = 'none';
        domingo.style.display = 'none';
      }


    }

    function validarInfo(event) {
      event.preventDefault();
      if (this.value == '') {
        errorDiv.style.display = 'block';
        errorDiv.setAttribute('class', 'error');
        errorDiv.innerHTML = 'Estes campo es obligatorio';
        this.style.border = '1px solid red';
      } else {
        errorDiv.style.display = 'none';
        this.style.border = '1px solid #787878';
      }
    }

    function validarMail(event) {
      event.preventDefault();
      if (this.value.indexOf('@') > -1) { //busca el valor si no se encuetra es = -1
        errorDiv.style.display = 'none';
        this.style.border = '1px solid #787878';
      } else {
        errorDiv.style.display = 'block';
        errorDiv.setAttribute('class', 'error');
        errorDiv.innerHTML = 'Coloca un email valido';
        this.style.border = '1px solid red';
      }
    }


  }); // DOM Content Loaded
})();

$(function () {
  'use strict'

  //lettering
$('.nombre-sitio').lettering();

  //menu de hamburgesa

  $('.menu-mobile').click(function() {
      $('.navegacion-principal').slideToggle();
  })

  $('.navegacion-principal').removeAttr('style')
  

//pagina actual

$('.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
$('.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
$('.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
$('.registro .navegacion-principal a:contains("Reservaciones")').addClass('activo');

  //Menu fijo 
  let windowsHeight = $(window).height();  //mide la altura de la pantalla
  let barraHeight = $('.barra').innerHeight();  //mide la altura de un elemento html

  $(window).scroll(function () {     //detecta el scroll
    let scroll = $(window).scrollTop();    //define el scroll

    if (scroll > windowsHeight) {
      $('.barra').addClass('fixed');
      $('body').css({'margin-top': barraHeight+'px'});
    } else {
      $('.barra').removeClass('fixed');
      $('body').css({'margin-top':'0px'});
    }
  });

  //tab de conferencias

  $('.programa-evento .info-curso:first').show();
  $('.navegacion-evento a:first').addClass('activo');

  $('.navegacion-evento a').on('click', function () {
    let enlace = $(this).attr('href');
    $('.ocultar').hide();
    $(enlace).fadeIn(1000);
    $('.navegacion-evento a').removeClass('activo');
    $(this).addClass('activo');
    return false;
  });


  //animacion numeros 

  $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6}, 1500);
  $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15}, 1200);
  $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3}, 1500);
  $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9}, 1500);


  //conteo regresivo

  $('.cuenta-regresiva').countdown('2020/12/10 09:00:00', function(event) {
    $('#dias').html(event.strftime('%D'));
    $('#horas').html(event.strftime('%H'));
    $('#minutos').html(event.strftime('%M'));
    $('#segundos').html(event.strftime('%S'));
  });

  


  //Colorbox

  $('.invitado-info').colorbox({inline:true, width:'50%'});
  $('.newlestter-info').colorbox({inline:true, width:'50%'});

})
