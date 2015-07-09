<script type="text/javascript">
  $(function() {
    $("#s_asistencia, #s_especialidad").select2();
    $('.registro, .detalle-pago').hide();
    
    $('#buscar').click(function () {     
      cedula = $('#i_cedula').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>registro/consultar_pagos',
        data: 'i_cedula=' + cedula, 
        dataType: "json",     
        success: function (data) {
          alert(data);
          if(data == ''){
            $('.registro').slideDown();
            $('.detalle-pago').slideUp();            
          }else{
            $('.registro').slideUp();
            $('.detalle-pago').slideDown();
          };                 
        },        
      });
    });

    $('#b_guardar').click(function(event) { 
     /* a = validar.logico('i_rif');
      b = validar.string('i_nombre');
      c = validar.string('i_direccion');
      d = validar.telefono('i_telefono');
      e = validar.correo('i_email');  
      f = validar.logico('i_habitacion', 'i_habitacion'); 
      g = validar.logico('i_inscripcion', 'i_inscripcion');  

      if(a != 0 && b != 0 && c != 0 && d != 0 && e != 0 
      && f != 0 && g != 0){*/
        var datos = $("#evento").serialize();
        alert(datos);
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()?>registro/registro_evento',
          data: datos,         
          success: function (data) { 
            $('.registro').slideUp(); 
            $('.detalle-pago').slideDown();          
            $('#ajax_mensaje').html('El registro ha sido exitoso. <a href="#"><button class="btn btn-success btn-sm">Ir</button></a>')                     
          },
        });
      //}
    });
  });
</script>
<section class="content-header">
  <ol class="breadcrumb">
    <li><i class="fa fa-cogs"></i> Registro</li>
    <li class="active">Eventos</li>
  </ol>  
</section>
<section class="content">  
  <div class="col-md-5 col-xs-offset-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Registro de Eventos</h3>
      </div>


      <form id="evento" role="form">
        <div class="box-body">
          <div class="form-group">
            <label for="i_nombre">Nombre del Evento:</label>
            <input type="text" class="form-control" id="i_evento" name="i_evento" placeholder="Ingresar Nombre del Evento">
          </div>
          <div class="form-group">
            <label for="i_apellido">Descripcion del Evento:</label>
            <input class="form-control" col="20" rows="5" id="i_descripcion" name="i_descripcion" placeholder="Ingresar la descripcion del Evento"></input>
          </div>
          <div class="form-group">
            <button type="button" id="b_guardar" class="btn btn-primary">Guardar</button>
          </div>
          <div class="box-footer registro" id="ajax_mensaje">
            Mensajes de notificación. 
          </div>
        </div>
      </form>

      
    </div> 
  </div>
</section>