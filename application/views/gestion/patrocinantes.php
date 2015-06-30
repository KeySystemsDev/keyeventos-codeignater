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
            <th>Teléfono</th>
            <th>Rif</th>
            <th>E-mail</th>
            <th>Insc.</th>
            <th>Hab.</th>
            <th>Estatus</th>
            <th>
            	<span class="btn btn-sm btn-info"><i class="fa fa-edit"></span></i></span></i>
            	<span class="btn btn-sm btn-default"><i class="fa fa-check"></span></i>
            </th>
          </tr>
        </thead>
        <tbody>
				<?php
					if(isset($patrocinantes) && !empty($patrocinantes)){
				  	$i = 0;
				  	foreach ($patrocinantes as $key) {
				  		$i++;	
				  		if ($key->habilitado_patrocinante == 1){
				  			$estatus = '<span class="btn btn-sm btn-success">Habilitado</i>';
				  			$boton   = '<span class="btn btn-sm btn-danger"><i class="fa fa-times"></span></i>';
				  		}else{
								$estatus = '<span class="btn btn-sm btn-danger">Deshabilitado</i>';
								$boton   = '<span class="btn btn-sm btn-success"><i class="fa fa-check"></span></i>';
				  		}
				  		echo 
				  		'<tr>
	              <td>'.$i.'</td>
	              <td>'.ucfirst(utf8_decode($key->nombre_patrocinante)).'</td>
	              <td>'.$key->telefono_patrocinante.'</td>
	              <td>'.$key->rif_patrocinante.'</td>	              
	              <td>'.utf8_decode($key->email_patrocinante).'</td>
	              <td>'.$key->inscripciones_patrocinante.'</td>
	              <td>'.$key->habitaciones_patrocinante.'</td>
	              <td>'.$estatus.'</td>
	              <td>
	              	<a href="'.base_url().'gestion/patrocinante-editar/'.$key->id_patrocinante.'"><span class="btn btn-sm btn-info"><i class="fa fa-edit"></span></i></span></a>
		            	<a href="'.base_url().'gestion/patrocinante-eliminar/'.$key->id_patrocinante.'">'.$boton.'</a>
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
            <th>Teléfono</th>
            <th>Rif</th>
            <th>E-mail</th>
            <th>Insc.</th>
            <th>Hab.</th>
            <th>Estatus</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>				
</section>