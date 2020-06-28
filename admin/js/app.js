let pathPagina=window.location.pathname,indiceAdmin=pathPagina.indexOf("admin/"),pagina=pathPagina.substr(indiceAdmin+6,pathPagina.length);$(`.sidebar .nav-item a[href="${pagina}"]`).toggleClass("active").parents("li.has-treeview").toggleClass("menu-open").children("a.nav-link").toggleClass("active"),$(function(){$.getJSON("servicios-registrados.php",function(a){let e=a.datos,i=e.map(function(a){return a.fecha}),r=e.map(function(a){return a.cantidad});new Chart($("#grafica-registros").get(0).getContext("2d"),{type:"line",data:{labels:i,datasets:[{data:r,label:"Usuarios",backgroundColor:"rgba(60,141,188,0.9)",borderColor:"rgba(60,141,188,0.8)",pointRadius:3,pointColor:"#3b8bba",pointStrokeColor:"rgba(60,141,188,1)",pointHighlightFill:"#fff",pointHighlightStroke:"rgba(60,141,188,1)",fill:!1}]},options:{maintainAspectRatio:!1,elements:{point:{pointStyle:"circle"}},responsive:!0,scales:{xAxes:[{gridLines:{display:!1}}],yAxes:[{ticks:{stepSize:1},gridLines:{display:!1}}]}}})});let a,e,i=$("#registros thead th").length;$("#registros").hasClass("registros_inv")?(a="50%",e=1):$("#registros").hasClass("registros_evt")?(a="15%",e="0"):(a=`${100/i}%`,e="_all");let r=$("#registros").DataTable({responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(a){return"Detalle de "+a.data()[0]}}),renderer:$.fn.dataTable.Responsive.renderer.tableAll({tableClass:"table"})}},autoWidth:!1,columnDefs:[{width:a,targets:e}],language:{info:"Mostrando _START_ a _END_ de _TOTAL_ registros",infoEmpty:"Mostrando 0 a 0 de 0 registros",infoFiltered:"(filtro de _MAX_ registros totales)",emptyTable:"No hay datos disponibles",lengthMenu:"Mostrar _MENU_ registros",loadingRecords:"Cargando...",processing:"Procesando...",search:"Buscar:",zeroRecords:"No se encontraron resultados",paginate:{first:"Inicio",last:"Último",next:"Siguiente",previous:"Anterior"},aria:{sortAscending:": activar para orden A-Z",sortDescending:": activar para orden Z-A"}}});function s(a=1,e=1){1==a?$("#btn-crear-registro-admin").attr("disabled",!0):$("#btn-crear-registro-admin").attr("disabled",!1),1==e?$("#btn-enviar-registro-admin").attr("disabled",!0):$("#btn-enviar-registro-admin").attr("disabled",!1)}$("#registros").hasClass("registrados")&&r.column(2).order("desc").draw(),$("#registros").click(function(){$(".modal-dialog").addClass("modal-xl text-center ajuste")}),$("#fecha-evento").daterangepicker({singleDatePicker:!0,autoApply:!0,showDropdowns:!0,drops:"auto",locale:{daysOfWeek:["Dom","Lun","Mar","Mie","Jue","Vie","Sab"],monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]}}),$(".crear-registro-evento #fecha-evento").val(""),$("#horaEvento").datetimepicker({format:"LT"}),$(".select").select2({placeholder:"Selecciona una opcion",allowClear:!0}),$("#icono").iconpicker(),$("div.iconpicker-popover").addClass("tab-pane show active"),""==$(".iconpicker-component i").attr("class")&&$(".iconpicker-component i").addClass("fas fa-address-book"),bsCustomFileInput.init(),$("#ajustes").click(function(){let a=$(this).attr("data-id");window.location.href=`editar-admin.php?id=${a}`}),$(".guardar-registro-admin").on("input",function(a){"password"==$(a.target).attr("id")&&$("#enviar-registro").attr("disabled",!0),""==$("#password").val()&&""==$("#repetir-password").val()&&($("#password").removeClass("is-invalid").removeClass("is-valid"),$("#repetir-password").removeClass("is-invalid").removeClass("is-valid"),$("#password").parents(".form-group").removeClass("was-validate"),$("#repetir-password").parents(".form-group").removeClass("was-validate"),s(1,0))}),$("#repetir-password").on("input",function(){let a=$("#password").val();$(this).val()==a?($("#resultado-password").parents(".form-group").addClass("was-validate"),$(this).addClass("is-valid").removeClass("is-invalid"),$("input#password").parents(".form-group").addClass("was-validate"),$("input#password").addClass("is-valid").removeClass("is-invalid"),s(0,0)):($("#resultado-password").parents(".form-group").addClass("was-validate"),$(this).addClass("is-invalid").removeClass("is-valid"),$("input#password").parents(".form-group").addClass("was-validate"),$("input#password").addClass("is-invalid").removeClass("is-valid"),s(1,1))}),$(".crear-registro-evento").on("input",function(a){""==$(a.target).val()?$("#btn-crear-registro-evento").attr("disabled",!0):$("#btn-crear-registro-evento").attr("disabled",!1)}),$(".crear-registro-categoria").on("input",function(a){""==$(a.target).val()?$("#btn-crear-registro-categoria").attr("disabled",!0):$("#btn-crear-registro-categoria").attr("disabled",!1)}),$(".crear-registro-invitado").on("input",function(a){""==$(a.target).val()?$("#btn-crear-registro-invitado").attr("disabled",!0):$("#btn-crear-registro-invitado").attr("disabled",!1)}),$("#nombre, #apellido, #email").blur(function(a){let e=$(this).val(),i=$(this).attr("id");""==e?($(this).parents(".validacion").addClass("was-validate"),$(this).addClass("is-invalid"),$("#validacionInfo").fadeIn().text(`Es necesario ingresar el ${i}`)):""!=$(this).val()&&($(this).removeClass("is-invalid"),$(this).parents(".validacion").children().children().children().hasClass("is-invalid")||($(this).parents(".validacion").removeClass("was-validate"),$(this).removeClass("is-invalid"),$("#validacionInfo").fadeOut().text("")))}),$(".crear-registro-regalo").on("input",function(a){""==$(a.target).val()?$("#btn-crear-registro-regalo").attr("disabled",!0):$("#btn-crear-registro-regalo").attr("disabled",!1)})});