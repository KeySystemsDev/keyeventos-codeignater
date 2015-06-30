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
    <li class="active">Patrocinantes</li>
  </ol>  
</section>
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Patrocinantes Registrados</h3>                                    
    </div>
    <div class="box-body table-responsive">
      <table id="tabla_registros" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Patrocinante</th>
            <th>Descripción</th>
            <th>Estatus</th>
            <th>
            	<span class="btn btn-sm btn-info"><i class="fa fa-edit"></span></i></span></i>
            	<span class="btn btn-sm btn-default"><i class="fa fa-check"></span></i>
            </th>
          </tr>
        </thead>
        <tbody>
				<?php
					if(isset($laboratorios) && !empty($laboratorios)){
				  	$i = 0;
				  	foreach ($laboratorios as $key) {
				  		$i++;	
				  		if ($key->habilitado_laboratorio == 1){
				  			$estatus = '<span class="btn btn-sm btn-success">Habilitado</i>';
				  			$boton   = '<span class="btn btn-sm btn-danger"><i class="fa fa-times"></span></i>';
				  		}else{
								$estatus = '<span class="btn btn-sm btn-danger">Deshabilitado</i>';
								$boton   = '<span class="btn btn-sm btn-success"><i class="fa fa-check"></span></i>';
				  		}
				  		echo 
				  		'<tr>
	              <td>'.$i.'</td>
	              <td>'.ucfirst(utf8_decode($key->nombre_laboratorio)).'</td>
	              <td>'.utf8_decode($key->descripcion_laboratorio).'</td>
	              <td>'.$estatus.'</td>
	              <td>
	              	<a href="'.base_url().'gestion/laboratorio-editar/'.$key->id_laboratorio.'"><span class="btn btn-sm btn-info"><i class="fa fa-edit"></span></i></span></a>
		            	<a href="'.base_url().'gestion/laboratorio-eliminar/'.$key->id_laboratorio.'">'.$boton.'</a>
	              </td>
	            </tr>';
						}
					}
				?>          	                          
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Patrocinante</th>
            <th>Descripción</th>
            <th>Estatus</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>				
</section>