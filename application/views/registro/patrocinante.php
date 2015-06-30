<script type="text/javascript">
  $(function() {
    $("#s_asistencia, #s_especialidad").select2();
    $('.mostrar').hide();
    
    $('#buscar').click(function () {
      var btn = $(this);
      btn.button('loading');
      rif = $('#i_rif').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>registro/patrocinante_consultar',
        data: 'i_rif=' + rif, 
        dataType: "json",
        async: true,       
        success: function (data) {
          if(data == ''){
            $('.mostrar').slideDown();            
          }else{
            $('.mostrar').slideUp();
          };                 
          btn.button('reset');
        },        
      });
    });

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
          url: '<?php echo base_url()?>registro/patrocinante_agregar',
          data: datos,         
          success: function (data) {          
                  
          },
        });
      }
    });
  });
</script>
<section class="content-header">
  <ol class="breadcrumb">
    <li><i class="fa fa-cogs"></i> Registro</li>
    <li class="active">Patrocinante</li>
  </ol>  
</section>
<section class="content">  
  <div class="col-md-5 col-xs-offset-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Registro de Patrocinante</h3>
      </div>
      <form id="form" role="form">
        <div class="box-body">
          <div class="form-group">
            <label for="i_rif">Rif:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="i_rif" name="i_rif" placeholder="Ingresar Rif">
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
            <label for="i_direccion">Dirección:</label>
            <textarea class="form-control" col="20" rows="5" id="i_direccion" name="i_direccion" placeholder="Ingresar direccion del patrocinante"></textarea>
          </div>
          <div class="form-group mostrar">
            <label for="i_telefono">Teléfono:</label>
            <input type="text" class="form-control" id="i_telefono" name="i_telefono" placeholder="Ingresar numero telefonico">
          </div> 
          <div class="form-group mostrar">
            <label for="i_email">Email:</label>
            <input type="text" class="form-control" id="i_email" name="i_email" value="" placeholder="Ingresar Correo Electronico">
          </div>           
          <div class="form-group mostrar">
            <label for="i_habitacion">Habitaciones:</label>
            <input type="text" class="form-control" id="i_habitacion" name="i_habitacion" placeholder="Cantidad">
          </div>  
          <div class="form-group mostrar">
            <label for="i_inscripcion">Inscripciones:</label>
            <input type="text" class="form-control" id="i_inscripcion" name="i_inscripcion" placeholder="Cantidad">
          </div>                                         
          <div class="box-footer mostrar">
            <button type="button" id="b_guardar" class="btn btn-primary">Registrar</button>
          </div>
        </div>
      </form>
    </div> 
  </div>
</section>