<div class="container">
  <div class="card card-signin">
    <img class="img-circle profile-img" src="<?php echo base_url(); ?>public/img/avatar.png" alt="">
    <?php
      $sesion_atr = array(
                      'id' => 'd_sesion',
                      'class' => 'form-signin' 
                    );
      echo form_open('sesion/conectar', $sesion_atr);
    ?>      
      <input type="text" class="form-control" name="n_usuario" placeholder="Usuario" required autofocus>
      <input type="password" class="form-control" name="n_password" placeholder="Contraseña" required>
      <input type="password" class="form-control" name="n_repetir_password" placeholder="Repetir Contraseña" required>      
      <button class="btn btn-lg btn-default btn-block" type="submit">Registrarme</button>         
      <div style="padding-top:10px;">
	      <a href="<?php echo base_url()?>sesion">
	        <button type="button" class="btn btn-primary pull-right">Iniciar Sesión</button>
	      </a>
    	</div>
      <div style="padding-top:10px;">
        <?php echo $error ?>
      </div>
    <?php echo form_close(); ?>               
  </div>
</div>