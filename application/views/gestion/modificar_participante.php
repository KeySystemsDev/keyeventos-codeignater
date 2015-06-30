<script type="text/javascript">
  $(function() {
    $("#s_patrocinante, #s_asistencia, #s_especialidad").select2();

    $('#b_guardar').click(function(event) { 
      a = validar.cedula('i_cedula');
      b = validar.string('i_nombre');
      c = validar.string('i_apellido');
      d = validar.correo('i_email');
      e = validar.logico('s_especialidad'); 
      f = validar.logico('s_patrocinante'); 
      g = validar.logico('s_asistencia');
      h = validar.checkbox('i_habitacion');  

      if(a != 0 && b != 0 && c != 0 && d != 0 && e != 0 
      && f != 0 && g != 0){
        var datos = $("#form").serialize();
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()?>gestion/participante_actualizar',
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
    <li class="active">Editar Participante</li>
  </ol>  
</section>
<section class="content">  
  <div class="col-md-5 col-xs-offset-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Editar Participante</h3>
      </div>
      <form id="form" role="form">
        <?php 
          if(isset($participante) && !empty($participante)){
            foreach ($participante as $key) {
              $id_participante        = $key->id_participante;
              $nombre_participante    = $key->nombre_participante;
              $apellido_participante  = $key->apellido_participante;
              $cedula_participante    = $key->cedula_participante;
              $patrocinante           = $key->nombre_patrocinante;
              $especialidad           = $key->especialidad;
              $asistencia             = $key->asistencia;
              $id_patrocinante        = $key->id_patrocinante;
              $id_tipo_especialidad   = $key->id_tipo_especialidad;
              $id_tipo_asistencia     = $key->id_tipo_asistencia;
              $email_participante     = $key->email_participante;
              $asistencia             = $key->asistencia;
              $especialidad           = $key->especialidad;
            }
          }
        ?>        
        <div class="box-body">
          <div class="form-group">
              <input type="hidden" class="form-control" id="id_participante" name="id_participante" value="<?php echo $id_participante; ?>">
            <label for="i_cedula">Cédula:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="i_cedula" name="i_cedula" value="<?php echo $cedula_participante; ?>" readonly>
            </div>
          </div>
          <div class="form-group mostrar">
            <label for="i_nombre">Nombre:</label>
            <input type="text" class="form-control" id="i_nombre" name="i_nombre" value="<?php echo $nombre_participante; ?>" placeholder="Ingresar Nombre">
          </div>
          <div class="form-group mostrar">
            <label for="i_apellido">Apellido:</label>
            <input type="text" class="form-control" id="i_apellido" name="i_apellido" value="<?php echo $apellido_participante; ?>" placeholder="Ingresar Apellido">
          </div>
          <div class="form-group mostrar">
            <label for="i_email">Email:</label>
            <input type="text" class="form-control" id="i_email" name="i_email" value="<?php echo $email_participante; ?>" placeholder="Ingresar Correo Electronico">
          </div> 
          <div class="form-group mostrar">
            <label for="s_especialidad">Especialidad:</label>
            <select style="width:100%" id="s_especialidad" name="s_especialidad">
              <option value="<?php echo $id_tipo_especialidad ?>" selected><?php echo utf8_decode(ucwords($especialidad)); ?></option>           
              <?php
                if(isset($especialidades) && !empty($especialidades)){
                  foreach ($especialidades as $key) {
                    if (!($id_tipo_especialidad == $key->id_tipo)) {
                      echo 
                      '<option value="'.$key->id_tipo.'"> '.utf8_decode(ucwords($key->nombre_tipo)).' </option>';
                    }
                  }
                }
              ?> 
            </select> 
          </div>
          <div class="form-group mostrar">
            <label for="s_laboratorio">Laboratorios:</label>
            <select style="width:100%" id="s_patrocinante" name="s_patrocinante">
              <option value="<?php echo $id_patrocinante ?>" selected><?php echo utf8_decode(ucwords($patrocinante)); ?></option>            
              <?php
                if(isset($patrocinantes) && !empty($patrocinantes)){
                  foreach ($patrocinantes as $key) {
                    if (!($id_patrocinante == $key->id_patrocinante)) {
                      echo 
                      '<option value="'.$key->id_patrocinante.'"> '.utf8_decode(ucwords($key->nombre_patrocinante)).' </option>';
                    }
                  }
                }
              ?>
            </select> 
          </div>          
          <div class="form-group mostrar">
            <label for="s_asistencia">Tipo de Asistencia:</label>
            <select style="width:100%" id="s_asistencia" name="s_asistencia"> 
              <option value="<?php echo $id_tipo_asistencia ?>" selected><?php echo utf8_decode(ucwords($asistencia)); ?></option>        
              <?php
                if(isset($asistencias) && !empty($asistencias)){
                  foreach ($asistencias as $key) {
                    if (!($id_tipo_asistencia == $key->id_tipo)) {
                      echo  
                      '<option value="'.$key->id_tipo.'"> '.utf8_decode(ucwords($key->nombre_tipo)).' </option>';
                    }
                  }
                }
              ?>
            </select> 
          </div> 
          <div class="checkbox mostrar">
            <label>
              Tengo Habitación: &nbsp; <input type="checkbox" id="i_habitacion" name="i_habitacion"/> 
            </label>
          </div>
          <div class="box-footer mostrar">
            <button type="button" id="b_guardar" class="btn btn-success">Actualizar</button>
          </div>
        </div>
      </form>
    </div> 
  </div>
</section>