<script type="text/javascript">
  $(function() {
    $('#tabla_registros').dataTable({
        "bPaginate": false,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": true
    });
  });
</script>

<section class="content-header">
  <ol class="breadcrumb">
    <li><i class="fa fa-cogs"></i> Gestion</li>
    <li class="active">Participante</li>
  </ol>  
</section>
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Participantes Registrados</h3>                                    
    </div>
    <div class="box-body table-responsive">
      <table id="tabla_registros" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cédula</th>
            <th>E-mail</th>
            <th>Estatus</th>
            <th>
            	<span class="btn btn-sm btn-info"><i class="fa fa-edit"></span></i></span></i>
            	<span class="btn btn-sm btn-default"><i class="fa fa-check"></span></i>
            </th>
          </tr>
        </thead>
        <tbody>
  				<?php
  					if(isset($participantes) && !empty($participantes)){
  				  	$i = 0;
  				  	foreach ($participantes as $key) {
  				  		$i++;	
  				  		if ($key->habilitado_participante == 1){
  				  			$estatus = '<span class="btn btn-sm btn-success">Habilitado</i>';
  				  			$boton   = '<span class="btn btn-sm btn-danger"><i class="fa fa-times"></span></i>';
  				  		}else{
  								$estatus = '<span class="btn btn-sm btn-danger">Deshabilitado</i>';
  								$boton   = '<span class="btn btn-sm btn-success"><i class="fa fa-check"></span></i>';
  				  		}


  				  		echo 
  				  		'<tr>
  	              <td>'.$i.'</td>
  	              <td>'.ucfirst(utf8_decode($key->nombre_participante)).'</td>
  	              <td>'.ucfirst(utf8_decode($key->apellido_participante)).'</td>
  	              <td>'.$key->cedula_participante.'</td>	              
  	              <td>'.utf8_decode($key->email_participante).'</td>
  	              <td>'.$estatus.'</td>
  	              <td>
  	              	<a href="'.base_url().'gestion/participante-editar/'.$key->id_participante.'"><span class="btn btn-sm btn-info"><i class="fa fa-edit"></span></i></span></a>
  		            	<a href="'.base_url().'gestion/participante-eliminar/'.$key->id_participante.'">'.$boton.'</a>
  	              </td>
  	            </tr>';
  						}
  					}
  				?>          	                          
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cédula</th>
            <th>E-mail</th>
            <th>Estatus</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>				
</section>