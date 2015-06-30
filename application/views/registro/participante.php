<script type="text/javascript">
  $(function() {
    $("#s_laboratorio, #s_asistencia, #s_especialidad").select2();
    $('.mostrar').hide();

    $('#buscar').click(function () {
      a = validar.cedula('i_cedula');
      if(a != 0){
        var btn = $(this);
        btn.button('loading');
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()?>registro/participante_consultar',
          data: 'i_cedula=' + a, 
          dataType: "json",
          async: true,       
          success: function (data) {
            if(data == ''){
              $('.mostrar').slideDown();            
            }else{
              $('.mostrar').slideUp();
              $('#i_cedula').val('');
            };                 
            btn.button('reset');
          },        
        });
      }
    });

    $('#b_guardar').click(function(event) { 
      a = validar.cedula('i_cedula');
      b = validar.string('i_nombre');
      c = validar.string('i_apellido');
      d = validar.correo('i_email');
      e = validar.logico('s_especialidad'); 
      f = validar.logico('s_laboratorio'); 
      g = validar.logico('s_asistencia');
      h = validar.checkbox('i_habitacion');  

      if(a != 0 && b != 0 && c != 0 && d != 0 && e != 0 
      && f != 0 && g != 0){
        var datos = $("#form").serialize();
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()?>registro/participante_agregar',
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
    <li><i class="fa fa-cogs"></i> Registro</li>
    <li class="active">Participante</li>
  </ol>  
</section>
<section class="content">  
  <div class="col-md-5 col-xs-offset-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Registro de Participante</h3>
      </div>
      <form id="form" role="form">
        <div class="box-body">
          <div class="form-group">
            <label for="i_cedula">Cédula:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="i_cedula" name="i_cedula" placeholder="Ingresar Cédula" maxlength="8">
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger" id="buscar" data-loading-text="Cargando..." >Buscar</button>
              </div>
            </div>
          </div>
          <div class="form-group mostrar">
            <label for="i_nombre">Nombre:</label>            
            <input type="text" class="form-control" id="i_nombre" name="i_nombre" placeholder="Ingresar Nombre">
          </div>
          <div class="form-group mostrar">
            <label for="i_apellido">Apellido:</label>
            <input type="text" class="form-control" id="i_apellido" name="i_apellido" value="" placeholder="Ingresar Apellido">
          </div>
          <div class="form-group mostrar">
            <label for="i_email">Email:</label>
            <input type="text" class="form-control" id="i_email" name="i_email" value="" placeholder="Ingresar Correo Electronico">
          </div> 
          <div class="form-group mostrar">
            <label for="s_especialidad">Especialidad:</label>
            <select style="width:100%" id="s_especialidad" name="s_especialidad"> 
              <option value="0" selected>Seleccionar</option>           
              <?php 
                if(isset($especialidades) && !empty($especialidades)){
                  foreach ($especialidades as $key) {
                    echo  
                    '<option value="'.$key->id_tipo.'"> '.utf8_decode(ucwords($key->nombre_tipo)).' </option>';
                  }
                }
              ?> 
            </select> 
          </div>
          <div class="form-group mostrar">
            <label for="s_laboratorio">Laboratorios:</label>
            <select style="width:100%" id="s_laboratorio" name="s_laboratorio">   
              <option value="0" selected>Seleccionar</option>           
              <?php
                if(isset($patrocinantes) && !empty($patrocinantes)){
                  foreach ($patrocinantes as $key) {
                    echo  
                    '<option value="'.$key->id_patrocinante.'"> '.utf8_decode(ucwords($key->nombre_patrocinante)).' </option>';
                  }
                }
              ?>
            </select> 
          </div>          
          <div class="form-group mostrar">
            <label for="s_asistencia">Tipo de Asistencia:</label>
            <select style="width:100%" id="s_asistencia" name="s_asistencia">  
              <option value="0" selected>Seleccionar</option>            
              <?php
                if(isset($asistencias) && !empty($asistencias)){
                  foreach ($asistencias as $key) {
                    echo  
                    '<option value="'.$key->id_tipo.'"> '.utf8_decode(ucwords($key->nombre_tipo)).' </option>';
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
            <button type="button" id="b_guardar" class="btn btn-primary">Registrar</button>
          </div>
        </div>
      </form>
    </div> 
  </div>
</section>