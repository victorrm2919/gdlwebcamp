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



var waypoint = new Waypoint({
  element: document.getElementById('animacionNumeros'),
  handler: function(direction) {
    if (direction == 'down') {
      console.log(this.triggerPoint);
      $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6}, 1500);
      $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15}, 1200);
      $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3}, 1500);
      $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9}, 1500);
    }
  },
  offset: 1000
})



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
