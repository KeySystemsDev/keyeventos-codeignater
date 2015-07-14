<script type="text/javascript">
  $(function() {
    $("#s_metodo_pago, #s_especialidad, #s_banco, #s_evento").select2();
    $('.registro, .detalle-pago').hide();
    
    $('#buscar').click(function () {     
      cedula = $('#i_cedula').val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url()?>registro/consultar_pagos',
        data: 'i_cedula=' + cedula, 
        dataType: "json",     
        success: function (data) {
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
        evento = $('#s_evento').val();
        $('#id_evento').val(evento)
        var datos = $("#pagos").serialize();
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()?>registro/insertar_pagos',
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
    <li class="active">Pagos</li>
  </ol>  
</section>
<section class="content">  
  <div class="col-md-5 col-xs-offset-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Registro de Pagos</h3>
      </div>


      <form id="pagos" role="form">
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
          <div class="form-group registro">
            <label for="i_nombre">Nombre:</label>
            <input type="text" class="form-control" id="i_nombre" name="i_nombre" placeholder="Ingresar Nombre">
          </div>
          <div class="form-group registro">
            <label for="i_apellido">Apellido:</label>
            <input class="form-control" col="20" rows="5" id="i_apellido" name="i_apellido" placeholder="Ingresar Nombre"></input>
          </div>
          <div class="form-group registro">
            <label for="i_edad">Edad:</label>
            <input type="text" class="form-control" id="i_edad" name="i_edad" placeholder="Ingresar su edad">
          </div> 
          <div class="form-group registro">
            <label for="i_telefono">Teléfono:</label>
            <input type="text" class="form-control" id="i_telefono" name="i_telefono" placeholder="Ingresar numero telefonico">
          </div> 
          <div class="form-group registro">
            <label for="i_email">Email:</label>
            <input type="text" class="form-control" id="i_email" name="i_email" value="" placeholder="Ingresar Correo Electronico">
          </div>
          <div class="form-group registro">
            <label for="s_ocupacion">Ocupación:</label>
            <select style="width:100%" id="s_ocupacion" name="s_ocupacion"> 
              <option value="0" selected>Seleccionar</option>           
              <option value="Profesional">Profesional</option>
              <option value="Estudiante">Estudiante</option>
            </select>
          </div>             
          <div class="form-group registro">
            <label for="s_sexo">Sexo:</label>
             <select style="width:100%" id="s_sexo" name="s_sexo"> 
              <option value="0" selected>Seleccionar</option>           
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select> 
          </div> 
          <div class="form-group registro">
            <label for="s_estado">Estado:</label>
             <select style="width:100%" id="s_estado" name="s_estado"> 
              <option value="0" selected>Seleccionar</option>           
              <option value="Soltero(a)">Soltero(a)</option>
              <option value="Casado(a)">Casado(a)</option>
              <option value="Divorciado(a)">Divorciado(a)</option>
              <option value="Viudo(a)">Viudo(a)</option>
            </select> 
          </div>  
          <div class="form-group registro">
            <label for="i_twitter">Twitter:</label>
            <input type="text" class="form-control" id="i_twitter" name="i_twitter" placeholder="Ingrese su cuenta de Twitter">
          </div>  
          <div class="form-group registro">
            <label for="i_universidad">Universidad:</label>
            <input type="text" class="form-control" id="i_universidad" name="i_universidad" placeholder="Ingrese su Nombre de la Universidad">
          </div>                                         
          <div class="box-footer registro">
            <button type="button" id="b_guardar" class="btn btn-primary">Siguiente</button>
          </div>
          <div class="box-footer registro" id="ajax_mensaje">
            Mensajes de notificación. 
          </div>
        </div>
      </form>

      <script type="text/javascript">
        $(function() {
          $('#procesar').click(function(event) { 
           /* a = validar.logico('i_rif');
            b = validar.string('i_nombre');
            c = validar.string('i_direccion');
            d = validar.telefono('i_telefono');
            e = validar.correo('i_email');  
            f = validar.logico('i_habitacion', 'i_habitacion'); 
            g = validar.logico('i_inscripcion', 'i_inscripcion');  

            if(a != 0 && b != 0 && c != 0 && d != 0 && e != 0 
            && f != 0 && g != 0){*/
              var datos = $("#detalle").serialize();
              $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>registro/insertar_detalle_pagos',
                data: datos,         
                success: function (data) { 
                  $('.detalle-pago').slideDown();          
                  $('#ajax_detalle').html('El registro ha sido exitoso. <a href="#"><button class="btn btn-success btn-sm">Ir</button></a>')                     
                },
              });
            //}
          });
        });
      </script>
      <form id="detalle" role="form"  class="detalle-pago">
        <input type="hidden" id="id_evento" name="id_evento" value="2">
        <div class="box-body">
           <div class="form-group mostrar">
            <label for="s_evento">Nombre del Evento:</label>
            <select style="width:100%" id="s_evento" name="s_evento">  
              <option value="0" selected>Seleccionar</option>            
              <?php
                if(isset($evento) && !empty($evento)){
                  foreach ($evento as $key) {
                    echo  
                    '<option value="'.$key->id_evento.'"> '.utf8_decode(ucwords($key->nombre_evento)).' </option>';
                  }
                }
              ?>
            </select> 
          </div>
          <div class="form-group mostrar">
            <label for="s_metodo_pago">Metodo de Pago:</label>
            <select style="width:100%" id="s_metodo_pago" name="s_metodo_pago">  
              <option value="0" selected>Seleccionar</option>            
              <?php
                if(isset($metodo_pago) && !empty($metodo_pago)){
                  foreach ($metodo_pago as $key) {
                    echo  
                    '<option value="'.$key->id_tipo.'"> '.utf8_decode(ucwords($key->nombre_tipo)).' </option>';
                  }
                }
              ?>
            </select> 
          </div>
          <div class="form-group mostrar">
            <label for="s_banco">Banco:</label>
            <select style="width:100%" id="s_banco" name="s_banco">  
              <option value="0" selected>Seleccionar</option>            
              <?php
                if(isset($banco) && !empty($banco)){
                  foreach ($banco as $key) {
                    echo  
                    '<option value="'.$key->id_tipo.'"> '.utf8_decode(ucwords($key->nombre_tipo)).' </option>';
                  }
                }
              ?>
            </select> 
          </div>  
          <div class="form-group">
            <label for="i_universidad">Numero de Movimiento:</label>
            <input type="text" class="form-control" id="i_movimiento" name="i_movimiento" placeholder="Ingrese su Numero de Movimiento">
          </div>  
          <div class="form-group">
            <label for="i_universidad">Fecha de pago</label>
            <input type="text" class="form-control" id="i_fecha" name="i_fecha" placeholder="Ingrese la fecha de Pago">
          </div>                                         
          <div class="box-footer">
            <button type="button" id="procesar" class="btn btn-primary">Guardar</button>
          </div>
          <div class="box-footer" id="ajax_detalle">
            Mensajes de notificación. 
          </div>
        </div>
      </form>
    </div> 
  </div>
</section>