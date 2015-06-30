<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  <title><?php echo $this->layout->getTitle(); ?></title>
		<meta name="description" content="<?php echo $this->layout->getDescripcion(); ?>">
		<meta name="keywords" content="<?php echo $this->layout->getKeywords(); ?>" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>public/_img/favicon.ico" type="image/x-icon"/>

	 	<!-- ARCHIVOS JS -->
		<script src="<?php echo base_url(); ?>public/_js/jquery-1.10.2.min.js"></script>
		<script src="<?php echo base_url(); ?>public/_js/jquery.modernizr.custom.js"></script>		
		<script src="<?php echo base_url(); ?>public/_js/form.js"></script>
		<script src="<?php echo base_url(); ?>public/libs/_bootstrap/js/bootstrap.js"></script>		
		
		<!-- BOOTSTRAP -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/libs/_bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/libs/_bootstrap/css/todc-bootstrap.css">

		<!-- ESTILOS CSS -->
	  <link rel="shortcut icon" href="<?php echo base_url(); ?>public/_img/favicon.ico" type="image/x-icon"/>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/_css/config-master.css">
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/_css/config-temas/general.css">
	  <!--*************AUXILIARES*****************-->

		<?php echo $this->layout->css; ?> 

		<?php echo $this->layout->js; ?> 

		<!--**********FIN AUXILIARES*****************-->
	</head>
	<body>


		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

			
		  <!-- El logotipo y el icono que despliega el menú se agrupan
		       para mostrarlos mejor en los dispositivos móviles -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse"
		            data-target=".navbar-ex1-collapse">
		      <span class="sr-only">Desplegar navegación</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="#">
		    	<div class="logo">
						<img src="<?php echo base_url(); ?>public/_img/logo.png">
					</div>
		    </a>
		  </div>

			<?php 				
				/*----------------------------------------------------
				| 
				|          ACTIVA LA PISION ACTUAL
				|
				*----------------------------------------------------*/
				function url($seccion){
	        $url = $_SERVER['REQUEST_URI'];
	        $url = explode('/', $url);				
					echo $active = ($url[3] == $seccion || (empty($url[3]) && $seccion == 'inicio')) ? 'active' : '';
				}
			?>

		  <div class="collapse navbar-collapse navbar-ex1-collapse">
		    <ul class="nav navbar-nav">
		      <li class="<?php url ('inicio'); ?>"><a href="<?php echo base_url()?>">INICIO</a></li>
		      <li class="<?php url ('fiscal'); ?>"><a href="<?php echo base_url().'fiscal'?>">FISCO</a></li>
		      <li class="<?php url ('financiero'); ?>"><a href="<?php echo base_url().'financiero'?>">FINANZAS</a></li>
		      <li class="<?php url ('contacto'); ?>"><a href="<?php echo base_url().'contacto'?>">CONTACTO</a></li>
		      <li class="<?php url ('noticia'); ?>"><a href="<?php echo base_url().'noticia'?>">NOTICIAS</a></li>
		      <li><a href="<?php echo base_url().'sesion'?>">GESTOR</a></li>
		    </ul>

		    <div class="logo2">
					<img src="<?php echo base_url(); ?>public/_img/logo2.png">
				</div>
		  </div>
		</nav>



		<!-- ----------------  contenido ------------------- -->    
    <div class="container">
        <?php echo $content_for_layout; ?>
    </div>
     
	</body>
</html>

