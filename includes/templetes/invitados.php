

    <?php 
    try {
       require_once 'includes/funciones/bd_conexion.php';  /* archivo requerido, crea conexion */ 
       $sql = "SELECT * FROM invitados ";  /* query */
       $resultado = $conn->query($sql);  /* consulta a base de datos */
    } catch (Exception $e) {
        echo $e->getMessage();  /* mensaje de error */
    }

    ?>
       
    <section class="invitados contenedor seccion">
      <h2>Nuestros Invitados</h2>

      <ul class="lista-invitados">

        <?php while ($invitados = $resultado->fetch_assoc()) {/* imprime resultados) el resultado de fetch_assoc se guarda en eventos como array*/  ?>

        <li>  <!-- bucle para crear los li -->
          <div class="invitado">
              <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id'];?>">
                <img src="img/<?php echo $invitados['url_imagen']?>" alt="imagen invitado">
                <p><?php echo $invitados['nombre_invitado'] . ' ' . $invitados['apellido_invitado']?></p>
              </a>
          </div>
        </li>

        <div style="display:none;">
            <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id'];?>">
                <h2><?php echo $invitados['nombre_invitado'] . ' ' . $invitados['apellido_invitado']?></h2>
                <img src="img/<?php echo $invitados['url_imagen']?>" alt="imagen invitado">
                <p><?php echo $invitados['descripcion'];?></p>
            </div>
        </div>

        <?php }?>
        <!-- while etch_assoc -->

      </ul>
    </section>

    <?php $conn->close();?>  <!-- cierra conexion -->

