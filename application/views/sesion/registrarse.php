<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-8">      
      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-lock"></span> Registrarse</div>
            <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url()?>sesion/registrar_usuario" method="POST">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">
                            Correo</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="i_usuario" placeholder="Usuario" required autofocus>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label">
                            Contraseña</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="i_password" placeholder="Contraseña" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-3 control-label">
                            Repetir Contraseña</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="i_repetir_password" placeholder="Contraseña" required>
                          </div>
                        </div>
                        <div class="form-group last">
                          <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">Registrarme</button>
                          </div>
                        </div>
                 </form>
    	</div>
      </div>
    </div>
      </div>
      <div style="padding-top:10px;">
        <?php echo $error ?>
      </div>
    <?php echo form_close(); ?>               
  </div>
</div>