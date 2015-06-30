<script type="text/javascript">
  $(function() {
    $('#b_guardar').click(function(event) { 
      a = validar.string('i_nombre_lab');
      b = validar.string('i_descripcion_lab');  
    
      if(a != 0 && b != 0){
        var datos = $("#form").serialize();
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()?>registro/laboratorio_agregar',
          data: datos,         
          success: function (data) {
            $('.mostrar').slideUp();          
            $('#ajax_mensaje').html('El registro ha sido exitoso. <a href="#"><button class="btn btn-success btn-sm">Ir</button></a>')   
          },
        });
      }
    });
  });
</script>
<section class="content-header">
  <ol class="breadcrumb">
    <li><i class="fa fa-cogs"></i> Registro</li>
    <li class="active">Laboratorio</li>
  </ol>  
</section>
<section class="content">  
  <div class="col-md-5 col-xs-offset-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Registro de Laboratorio</h3>
      </div>
      <form id="form" role="form">
        <div class="box-body">
          <div class="form-group mostrar">
            <label for="i_nombre_lab">Nombre de Laboratorio:</label>
            <input type="text" class="form-control" id="i_nombre_lab" name="i_nombre_lab" placeholder="Ingresar Nombre">
          </div>
          <div class="form-group mostrar">
            <label for="i_descripcion_lab">Descripción del Rubro:</label>
            <textarea class="form-control" col="20" rows="5" id="i_descripcion_lab" name="i_descripcion_lab" placeholder="Ingresar descripcion del Laboratorio"></textarea>
          </div>
          <div class="box-footer mostrar">
            <button type="button" id="b_guardar" class="btn btn-primary">Registrar</button>
          </div>
          <div class="box-footer" id="ajax_mensaje">
            Mensajes de notificación. 
          </div>
        </div>
      </form>
    </div> 
  </div>
</section>