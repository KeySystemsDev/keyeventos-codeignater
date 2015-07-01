<script type="text/javascript">
  $(function() {
    $("#s_asistencia, #s_especialidad").select2();
    $('.mostrar').hide();
    
    $('#buscar').click(function () {     
      cedula = $('#i_cedula').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>registro/consultar_pagos',
        data: 'i_cedula=' + cedula, 
        dataType: "json",     
        success: function (data) {
          if(data == ''){
            $('.mostrar').slideDown();            
          }else{
            $('.mostrar').slideUp();
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
        var datos = $("#form").serialize();
        $.ajax({

          type: 'POST',
          url: '<?php echo base_url()?>registro/insertar_pagos',
          data: datos,         
          success: function (data) { 
            $('.mostrar').slideUp();          
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
    <li class="active">Pagos</li>
  </ol>  
</section>
<section class="content">  
  <div class="col-md-5 col-xs-offset-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Registro de Pagos</h3>
      </div>
        <form id="form" role="form">
          <div class="box-body">
            <div class="form-group">
              <label for="i_cedula">Cedula o Pasaporte:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="i_cedula" name="i_cedula" placeholder="Cedula o Pasaporte">
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
              <input class="form-control" col="20" rows="5" id="i_apellido" name="i_apellido" placeholder="Ingresar Nombre"></input>
            </div>
            <div class="form-group mostrar">
              <label for="i_edad">Edad:</label>
              <input type="text" class="form-control" id="i_edad" name="i_edad" placeholder="Ingresar su edad">
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
              <label for="s_ocupacion">Ocupación:</label>
              <select style="width:100%" id="s_ocupacion" name="s_ocupacion"> 
                <option value="0" selected>Seleccionar</option>           
                <option value="Profesional">Profesional</option>
                <option value="Estudiante">Estudiante</option>
              </select>
            </div>             
            <div class="form-group mostrar">
              <label for="s_sexo">Sexo:</label>
               <select style="width:100%" id="s_sexo" name="s_sexo"> 
                <option value="0" selected>Seleccionar</option>           
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              </select> 
            </div> 
            <div class="form-group mostrar">
              <label for="s_estado">Estado:</label>
               <select style="width:100%" id="s_estado" name="s_estado"> 
                <option value="0" selected>Seleccionar</option>           
                <option value="Soltero(a)">Soltero(a)</option>
                <option value="Casado(a)">Casado(a)</option>
                <option value="Divorciado(a)">Divorciado(a)</option>
                <option value="Viudo(a)">Viudo(a)</option>
              </select> 
            </div>  
            <div class="form-group mostrar">
              <label for="i_twitter">Twitter:</label>
              <input type="text" class="form-control" id="i_twitter" name="i_twitter" placeholder="Ingrese su cuenta de Twitter">
            </div>  
            <div class="form-group mostrar">
              <label for="i_universidad">Universidad:</label>
              <input type="text" class="form-control" id="i_universidad" name="i_universidad" placeholder="Ingrese su Nombre de la Universidad">
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