<script type="text/javascript">
  $(function() {
    $("#s_laboratorio").select2();

    $('#b_guardar').click(function(event) { 
      a = validar.logico('i_rif');
      b = validar.string('i_nombre');
      c = validar.string('i_direccion');
      d = validar.telefono('i_telefono');
      e = validar.correo('i_email'); 
      f = validar.logico('i_habitacion', 'i_habitacion'); 
      g = validar.logico('i_inscripcion', 'i_inscripcion');  

      if(a != 0 && b != 0 && c != 0 && d != 0 && e != 0 
      && f != 0 && g != 0){
        var datos = $("#form").serialize();
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()?>gestion/patrocinante_actualizar',
          data: datos,         
          success: function (data) {          
            funcion.reiniciar_formulario('form');
            $('.mostrar').slideUp();      
          },
        });
      }
    });
  });
</script>
<section class="content-header">
  <ol class="breadcrumb">
    <li><i class="fa fa-cogs"></i> Gestion</li>
    <li class="active">Editar Patrocinante</li>
  </ol>  
</section>
<section class="content">  
  <div class="col-md-5 col-xs-offset-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Editar de Patrocinante</h3>
      </div>
      <form id="form" role="form">
        <?php 
          if(isset($patrocinante) && !empty($patrocinante)){
            foreach ($patrocinante as $key) {
              $id_patrocinante              = $key->id_patrocinante;
              $nombre_patrocinante          = $key->nombre_patrocinante;
              $rif_patrocinante             = $key->rif_patrocinante;
              $inscripciones_patrocinante   = $key->inscripciones_patrocinante;
              $habitaciones_patrocinante    = $key->habitaciones_patrocinante;
              $email_patrocinante           = $key->email_patrocinante;
              $direccion_patrocinante       = $key->direccion_patrocinante;
              $telefono_patrocinante        = $key->telefono_patrocinante;
            }
          }
        ?>         
        <div class="box-body">
          <div class="form-group">
              <input type="hidden" class="form-control" id="id_patrocinante" name="id_patrocinante" value="<?php echo $id_patrocinante; ?>">
            <label for="i_rif">Rif:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="i_rif" name="i_rif" value="<?php echo $rif_patrocinante; ?>" placeholder="Ingresar Rif">
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger" id="buscar" data-loading-text="Cargando..." >Buscar</button>
              </div>
            </div>
          </div>
          <div class="form-group mostrar">
            <label for="i_nombre">Nombre:</label>
            <input type="text" class="form-control" id="i_nombre" name="i_nombre" value="<?php echo $nombre_patrocinante; ?>" placeholder="Ingresar Nombre">
          </div>
          <div class="form-group mostrar">
            <label for="i_direccion">Dirección:</label>
            <textarea class="form-control" col="20" rows="5" id="i_direccion" name="i_direccion" placeholder="Ingresar direccion del patrocinante"><?php echo $direccion_patrocinante; ?></textarea>
          </div>
          <div class="form-group mostrar">
            <label for="i_telefono">Teléfono:</label>
            <input type="text" class="form-control" id="i_telefono" name="i_telefono" value="<?php echo $telefono_patrocinante; ?>" placeholder="Ingresar numero telefonico">
          </div> 
          <div class="form-group mostrar">
            <label for="i_email">Email:</label>
            <input type="text" class="form-control" id="i_email" name="i_email" value="<?php echo $email_patrocinante; ?>" placeholder="Ingresar Correo Electronico">
          </div>           
          <div class="form-group mostrar">
            <label for="i_habitacion">Habitaciones:</label>
            <input type="text" class="form-control" id="i_habitacion" name="i_habitacion" value="<?php echo $habitaciones_patrocinante; ?>" placeholder="Cantidad">
          </div>  
          <div class="form-group mostrar">
            <label for="i_inscripcion">Inscripciones:</label>
            <input type="text" class="form-control" id="i_inscripcion" name="i_inscripcion" value="<?php echo $inscripciones_patrocinante; ?>" placeholder="Cantidad">
          </div>                                         
          <div class="box-footer mostrar">
            <button type="button" id="b_guardar" class="btn btn-success">Actualizar</button>
          </div>
        </div>
      </form>
    </div> 
  </div>
</section>