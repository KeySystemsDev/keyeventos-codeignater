<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $this->layout->getTitle(); ?></title>
	<meta name="description" content="<?php echo $this->layout->getDescripcion(); ?>">
	<meta name="keywords" content="<?php echo $this->layout->getKeywords(); ?>" />
  
  <!-- FRAMEWORK BOOSTRAP -->  
  <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/todc-bootstrap.min.css" rel="stylesheet" type="text/css" />  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/config-sesion.css">
	
  <!--*************auxiliares*****************-->

	<?php echo $this->layout->css; ?> 

	<?php echo $this->layout->js; ?> 

	<!--**********fin auxiliares*****************-->
</head>

<body>
	<div class="barra-ks">
	
	</div>

	<?php echo $content_for_layout; ?>
	
	<div class="pie">
		
	</div>
  <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>	
</body>
</html>