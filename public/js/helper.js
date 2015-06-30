// NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
// IT'S ALL JUST JUNK FOR OUR DOCS!
// ++++++++++++++++++++++++++++++++++++++++++

/*!
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Creative Commons Attribution 3.0 Unported License. For
 * details, see http://creativecommons.org/licenses/by/3.0/.
 */


!function ($) {

  $(function(){

    $('.tiptip').tipTip();

    validar = { 
      /* ----------------------------------------------------
      |
      |
      |             VALIDA QUE EL CAMPO SEA LÓGICO
      |
      |
      |----------------------------------------------------*/
      logico: function (valor, div) {
        this.valor = $('#' + valor).val();
        if(this.valor != '' && this.valor != 0){
          $('#' + div).css({'border-left':'1px solid #CCCCCC'});
          return this.valor;
        }else{
          $('#' + div).css({'border-left':'3px solid #FF8484'});
          return 0;
        }
      },
      /* ----------------------------------------------------
      |
      |
      |             VALIDA CHECKBOX
      |
      |
      |----------------------------------------------------*/
      checkbox: function (valor) {
        this.valor = $("#" + valor).is(":checked");
        if(this.valor == true){
          $("#" + valor).val(1);
          return 1;
        }else{
          $("#" + valor).val(0);
          return 0;
        }
      },      
      /* ----------------------------------------------------
      |
      |
      |             VALIDA UN STRING
      |
      |
      |----------------------------------------------------*/
      string: function (valor) {
        this.valor = $('#' + valor).val();
        if(this.valor.length >= 2){
          $('#' + valor).css({'border-left':'1px solid #CCCCCC'});
          return this.valor;
        }else{
          $('#' + valor).css({'border-left':'3px solid #FF8484'});
          return 0;
        }
      },       
      /* ----------------------------------------------------
      |
      |
      |             VALIDA EL CAMPO DE CEDULA
      |
      |
      |----------------------------------------------------*/
      cedula: function (valor) {
        this.valor = $('#' + valor).val();
        if((this.valor.length <= 8) && (this.valor.length >= 6)){
          $('#' + valor).css({'border-left':'1px solid #CCCCCC'});
          return this.valor;
        }else{
          $('#' + valor).css({'border-left':'3px solid #FF8484'});
          return 0;
        }
      }, 
      /* ----------------------------------------------------
      |
      |
      |             VALIDA EL CAMPO DE TELEFONO
      |
      |
      |----------------------------------------------------*/
      telefono: function (valor) {
        this.valor = $('#' + valor).val();
        if((this.valor.length == 11)){
          $('#' + valor).css({'border-left':'1px solid #CCCCCC'});
          return this.valor;
        }else{
          $('#' + valor).css({'border-left':'3px solid #FF8484'});
          return 0;
        }
      }, 
      /* ----------------------------------------------------
      |
      |
      |             VALIDA EL CAMPO CORREO
      |
      |
      |----------------------------------------------------*/
      correo: function (valor) {
        this.valor = $('#' + valor).val();
        arroba = 0;
        punto = 0;
        ind = 0;

        for(i=1;i<(this.valor.length-1);i++){
          if(this.valor[i] == '@'){
            arroba++;
            ind = i;
          }
        }
        for(i=ind;i<(this.valor.length-1);i++){
          if(this.valor[i] == '.')
            punto++;
        }

        if((arroba == 1) && (punto > 0)){
          $('#' + valor).css({'border-left':'1px solid #CCCCCC'});
          return this.valor;
        }else{
          $('#' + valor).css({'border-left':'3px solid #FF8484'});
          return 0;
        }
      },                
      /* ----------------------------------------------------
      | AUTOCOMPLETADO ASIGNADO A LOS ELEMENTOS;
      | LABEL
      | ID       
      | URL
      | BLOQUE EL INPUT SELECCIONADO
      |----------------------------------------------------*/      
      autocompletar_1: function(div, id_div, controlador){ 
        $('#' + div).autocomplete({
          delay: 0,
            source: controlador,
            minLength: 1,
            select: opcionSeleccionada,
        });

        function opcionSeleccionada(event, ui){
          nombre = ui.item.label;
          id = ui.item.id;
    
          $('#' + div).attr('disabled', true);          
          $('#' + div).val(nombre);
          $('#' + id_div).val(id);

          event.preventDefault();
        }
      },
      /* ----------------------------------------------------
      | AUTOCOMPLETADO ASIGNADO A LOS ELEMENTOS;
      | LABEL
      | ID       
      | URL
      | AUXILIAR
      | BLOQUE EL INPUT SELECCIONADO
      |----------------------------------------------------*/            
      autocompletar_2: function(div, id_div, aux, controlador){
        $('#' + div).autocomplete({
          delay: 0,
            source: controlador,
            minLength: 1,
            select: opcionSeleccionada,
        });

        function opcionSeleccionada(event, ui){
          nombre = ui.item.label;
          id = ui.item.id;
          auxiliar = (aux != '') ? ui.item.aux : '';
    
          $('#' + div).attr('disabled', true);          
          $('#' + div).val(nombre);
          $('#' + id_div).val(id);
          $('#' + aux).val(auxiliar);

          event.preventDefault();
        }
      },
      /* ----------------------------------------------------
      | AUTOCOMPLETADO ASIGNADO A LOS ELEMENTOS;
      | LABEL
      | ID       
      | URL
      |----------------------------------------------------*/             
      autocompletar_3: function(div, id_div, controlador){
        $('#' + div).autocomplete({
          delay: 0,
            source: controlador,
            minLength: 1,
            select: opcionSeleccionada,
        });

        function opcionSeleccionada(event, ui){
          nombre = ui.item.label;
          id = ui.item.id;
                      
          $('#' + div).val(nombre);
          $('#' + id_div).val(id);

          event.preventDefault();
        }
      },
    }; 

    obtener = { 
    /* ----------------------------------------------------
    |
    |
    |            OBTENER LA FECHA
    |
    |
    |----------------------------------------------------*/
      fecha: function(){
        obj = new Date();
        dia = obj.getDate();
        mes = (obj.getMonth() + 1);

        if(mes < 10)
          mes = '0' + (obj.getMonth() + 1);
        else
          mes = (obj.getMonth() + 1);        

        if(dia < 10)
          dia = '0' + obj.getDate();
        else
          dia = obj.getDate();        

        anno = obj.getFullYear();
        fecha = dia + '/' + mes + '/' + anno;
        return fecha;
      },
    /* ----------------------------------------------------
    |
    |
    |             OBTENER LA HORA
    |
    |
    |----------------------------------------------------*/    
      tiempo: function(){
        obj = new Date();
        hora = obj.getHours();
        minutos = obj.getMinutes();
        segundos = obj.getSeconds();
        if(hora < 10) { hora = '0' + obj.getHours(); } else { hora = obj.getHours(); }
        if(minutos < 10) { minutos = '0' + obj.getMinutes(); } else { minutos = obj.getMinutes(); }

        tiempo = hora + ':' + minutos;
        return tiempo;
      }
    };

    ajax = { 
    /* ----------------------------------------------------
    |
    |
    |            AJAX CON BOOTSTRAP TODC
    |
    |
    |----------------------------------------------------*/
      todc: function(div){
        $(div).html(
          '<div class="progress sm progress-striped active">'+
            '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">'+
              '<span class="sr-only">20% Complete</span>'+
            '</div>'+
          '</div>'
        );
      },
    };    
                  
    /* ----------------------------------------------------
    |
    |
    |             REINICIA EL INPUT
    |
    |
    |----------------------------------------------------*/
    $('.reiniciar').click(function() {
      $(this).parent().siblings("input[type=hidden]").val('');
      $(this).parent().siblings("input[type=text]").val('');
      $(this).parent().siblings("input[type=text]").attr('disabled', false); 
    });

    /* ----------------------------------------------------
    |
    |
    |             SOLO NUMEROS
    |
    |
    |----------------------------------------------------*/
    $('.bloqueo').keydown(function(event){
      if((event.keyCode >= 48 && event.keyCode <= 57) ||  (event.keyCode >= 96 && event.keyCode <= 105)
       || event.keyCode == 9 || event.keyCode == 190  || event.keyCode == 8 ){
          return true
      }else{
        return false
      }
    });

    /* ----------------------------------------------------
    |
    |
    |            SUBIR IMAGEN
    |
    |
    |----------------------------------------------------*/
    $('#i_file').change(function(e) {
      agregar_img(e);  
      
      function agregar_img(e){
        var file = e.target.files[0],
        imageType = /image.*/;

        if (!file.type.match(imageType))
          return;

        var reader = new FileReader();
            reader.onload = cargar_img;
            reader.readAsDataURL(file);
      }

      function cargar_img(e) {
        var result = e.target.result;
        $('#ajax_img').attr("src",result);
      }  
    });


    funcion = { 
    /* ----------------------------------------------------
    |
    |
    |            FUNCIONES PROPIAS
    |
    |
    |----------------------------------------------------*/
      reiniciar_formulario: function(div){
        $('#' + div).each (function(){
          this.reset();
        });
      },
    };    
       

        
    /* ----------------------------------------------------
    |
    |
    |            ELIMINA DUPLICADOS DE UN ARREGLO
    |
    |
    |----------------------------------------------------*/
    Array.prototype.unique = function(a){
      return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
    });
  })

}(window.jQuery)