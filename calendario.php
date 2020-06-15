<?php include_once 'includes/templetes/header.php'; ?>  <!-- //incluye archivos -->

<main>
    <section class="seccion contenedor">
      <h2>Calendario de Eventos</h2>


    <?php 
    try {
       require_once 'includes/funciones/bd_conexion.php';  /* archivo requerido, crea conexion */ 
       $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
       $sql .= "FROM eventos ";
       $sql .= "INNER JOIN categoria_evento ";
       $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
       $sql .= "INNER JOIN invitados ";
       $sql .= "ON eventos.id_inv = invitados.invitado_id ";
       $sql .= "ORDER By evento_id";
       $resultado = $conn->query($sql);  /* consulta a base de datos */
    } catch (Exception $e) {
        $error = $e->getMessage();  /* mensaje de error */
    }
    ?>

    <div class="calendario">
        <?php 
            $calendario = array();

            while ($eventos = $resultado->fetch_assoc()) /* imprime resultados) el resultado de fetch_assoc se guarda en eventos como array*/ { 
                $fecha = $eventos['fecha_evento'];  /* Var para agrupar */
                $evento = array(  /* crea arreglo personalizado */
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono'  => $eventos['icono'],
                    'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
                );

                $calendario[$fecha][] = $evento;  /* se crea un segundo nivel para poder agrupar se indexa la fecha en el primer nivel */
             }?> <!-- while etch_assoc -->

             <!-- imprime todos los eventos -->

             <?php foreach ($calendario as $dia => $lista_eventos) { ?>
                    <h3 class="titulo-dia">
                        <i class="fa fa-calendar"></i>
                        <?php 

                        //formateo de fecha Windows
                        setlocale(LC_TIME, 'spanish');  //WINDOWS
                        setlocale(LC_TIME, 'es-ES.UTF-8');  //UNIX
                        
                        echo strftime('%A, %d de %B del %Y', strtotime($dia));?>   <!-- Formateo de fecha -->
                    </h3>

       
                    <div class="contenido-evento">
                    <?php foreach ($lista_eventos as $evento_a) {?>
                        <div class="dia">
                                <p class="titulo-evento">
                                <?php echo $evento_a['titulo'];?>
                                </p>

                                <p class="hora">
                                <i class= 'fa fa-clock-o'></i>
                                <?php echo $evento_a['fecha'] . " " . $evento_a['hora'];?>
                                </p>

                                <p>
                                <i class="<?php echo $evento_a['icono'];?>"></i>
                                <?php echo $evento_a['categoria'];?>
                                </p>


                                <p>
                                <i class= "fa fa-user"></i>
                                <?php echo $evento_a['invitado'];?>
                                </p>
                        </div> <!-- cierre dia -->

                    <?php }?>  <!-- fin foreach eventos -->
                    </div>
                <?php } ?> <!-- fin foreach dias -->    
    </div>  <!-- cierre calendario -->

    <?php $conn->close();?>  <!-- cierra conexion -->

    </section>
</main>


<?php include_once 'includes/templetes/footer.php'; ?>
