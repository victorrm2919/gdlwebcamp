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
        sabado = document.getElementById('sábado'),
        domingo = document.getElementById('domingo');
      // Extras
  
      let camisas = document.getElementById('camisa-evento'),
        etiquetas = document.getElementById('etiquetas'),
        regalo = document.getElementById('regalo');
  
  
      if (botonRegistro) {
        botonRegistro.disabled = true;
      }
  
        //Calculo de montos en resumen
      if (calcular) {
        calcular.addEventListener('click', calcularMontos);
      }
  
      //Muestra dias dependiendo pase
    
      if (paseCompleto) {
        paseDia.addEventListener('input', mostrarDias);
        paseDosDias.addEventListener('input', mostrarDias);
        paseCompleto.addEventListener('input', mostrarDias);
      }
      
      let formulario_editar = document.getElementsByClassName('guardar-registro-usuario');
      if (formulario_editar) {
        if (paseDia.value > 0 || paseDosDias.value > 0 || paseCompleto.value > 0) {
          mostrarDias();
        }
      }
  
      //Validador de informacion en formulacion principal de cliente
      if (errorDiv) {
        nombre.addEventListener('blur', validarInfo);
        apellido.addEventListener('blur', validarInfo);
        email.addEventListener('blur', validarInfo);
        email.addEventListener('blur', validarMail);
      }
      
      //Boton limpiar en formulario editar
      let btnLimpiar = document.querySelector('.limpiar');
      if (btnLimpiar) {
        btnLimpiar.addEventListener('click', function () {
          let opcionesEventos = document.querySelector('#eventos'),
          checkbox = opcionesEventos.querySelectorAll('input[type="checkbox"]');
          for (let check of checkbox) {
            check.checked = 0;
          }
        })
      }
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
  
          if(botonRegistro){
            botonRegistro.disabled = false;
          }

          document.getElementById('total_pedido').value = totalPago;
          
          let cargos = document.getElementById('cargos');
          if(cargos){
            let cargoAnterior = document.getElementById('pago_anterior').value
            let cargo = totalPago - cargoAnterior
            cargos.innerHTML = `$${cargo.toFixed(2)}`
          }
        } 
      }
  
      function mostrarDias() {
        let boletoDia = parseInt(paseDia.value) || 0,
          boletoDosDias = parseInt(paseDosDias.value) || 0,
          boletoCompleto = parseInt(paseCompleto.value) || 0;
  
        let diasElegidos = [];
  
        if (boletoDia > 0) {
          diasElegidos.push('viernes');
        }
        if (boletoDosDias > 0) {
          diasElegidos.push('viernes', 'sábado');
        }
        if (boletoCompleto > 0) {
          diasElegidos.push('viernes', 'sábado', 'domingo');
        }
  
        if (boletoDia > 0 || boletoDosDias > 0 || boletoCompleto > 0) {
          document.querySelector('.msjSeleccion').style.display = 'none';
          for (const dia of diasElegidos) {
            document.getElementById(dia).style.display = 'block';
          }
        } else {
          document.querySelector('.msjSeleccion').style.display = 'block';
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