<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $this->layout->getTitle(); ?></title>
    <meta name="description" content="<?php echo $this->layout->getDescripcion(); ?>">
    <meta name="keywords" content="<?php echo $this->layout->getKeywords(); ?>" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/favicon.ico" type="image/x-icon"/>


    <!-- FRAMEWORK BOOSTRAP -->  
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/bootstrap.min.css"                                rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/font-awesome.min.css"                             rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/ionicons.min.css"                                 rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/morris/morris.css"                                rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/jvectormap/jquery-jvectormap-1.2.2.css"           rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/fullcalendar/fullcalendar.css"                    rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/iCheck/all.css"                                   rel="stylesheet" type="text/css" />    
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/colorpicker/bootstrap-colorpicker.min.css"        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/daterangepicker/daterangepicker-bs3.css"          rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/AdminLTE.css"                                     rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/libs/bootstrap/css/datepicker/datepicker.css"                        rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/css/config-master.css"                                               rel="stylesheet" type="text/css" /> 
    <link href="<?php echo base_url(); ?>public/css/select2/select2.css"                                             rel="stylesheet" type="text/css" />     

    
    <!-- FRAMEWORK JQUERY -->
    <script src="<?php echo base_url(); ?>public/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.tooltip.js"></script>
    <script src="<?php echo base_url(); ?>public/js/helper.js"></script>

    <!--  AUXILIARES CODEIGNITER -->
    <?php echo $this->layout->css; ?> 
    <?php echo $this->layout->js; ?> 

    </head>
  <body class="skin-blue fixed">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
      <a href="<?php echo base_url()?>panel" class="logo">
        Key-Panel
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-left">
          <ul class="nav navbar-nav">
            <?php 
            
              $url = $_SERVER['REQUEST_URI'];
              $url = explode('/', $url);
              if (isset($url[4])){
                $opc = $url[3].'/'.$url[4];
                $url_2 = explode('-', $url[4]);
                if (isset($url[0])){
                  $opc = $url[3].'/'.$url_2[0];
                }
              }else {
                $opc = '';
              }

              if(isset($sub_menu)){
                $i = 'A';
                foreach ($sub_menu as $key) {                  
                  $activo = ($opc == $key->link_menu) ? 'activo' : '' ;
                  //echo base_url().$key->link_menu;
                  echo 
                  '<li class="messages-menu menu-superior">
                    <a href="'.base_url().$key->link_menu.'" class="tiptip '.$activo.'" title="'.utf8_decode($key->descripcion_menu).'">
                      '.$i.'
                      <!--<span class="label label-success">1</span>-->
                    </a>
                  </li>';
                  $i++;
                }

              }
            ?>            
          </ul>
        </div>

        <div class="navbar-right">
          <ul class="nav navbar-nav">
            
            <?php 
              if (isset($notificacion)){
                echo 
                '<li class="dropdown messages-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope"></i>
                    <span class="label label-success">'.$num['pagina'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">Verifica las ultimas '.$num['pagina'].' noticias!</li>
                    <li>
                      <ul class="menu">';
                        foreach ($notificacion as $key) {
                          echo  
                          '<li>
                            <a href="'.base_url().'gestor/noticias-editar/'.$key->id_noticia.'">
                              <div class="pull-left">
                                <img src="'.base_url().'public/libs/bootstrap/img/avatar3.png" class="img-circle" alt="User Image"/>
                              </div>
                              <h4>'
                                .ucfirst(substr($key->titulo_noticia, 0, 50)).
                                '<small><i class="fa fa-clock-o"></i> '.date('d/m/Y', strtotime(str_replace('-', '/', $key->fecha_noticia))).'</small>
                              </h4>
                              <p>'.ucfirst(substr($key->descripcion_noticia, 0, 50)).'</p>
                            </a>
                          </li>';
                        }
                      echo                                                           
                      '</ul>
                    </li>
                    <li class="footer"><a href="'.base_url().'gestor/noticias">Ver todas las Noticias</a></li>
                  </ul>
                </li>';
              }
            ?>
            <!--<li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url(); ?>public/libs/bootstrap/img/avatar3.png" class="img-circle" alt="User Image"/>
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url(); ?>public/libs/bootstrap/img/avatar3.png" class="img-circle" alt="User Image"/>
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="<?php echo base_url(); ?>public/libs/bootstrap/img/avatar3.png" class="img-circle" alt="User Image"/>
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>                                                            
                  </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>-->            
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <span><?php echo ucwords($this->session->userdata('usuario')); ?><i class="caret"></i></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header bg-light-blue">
                  <img src="<?php echo base_url(); ?>public/img/key-systems.jpg" class="img-circle" alt="User Image" />
                  <p>
                    <?php echo ucwords($this->session->userdata('usuario')); ?>
                    <small>
                      <?php
                        setlocale(LC_ALL,"es_ES");
                        echo strftime("%A %d de %B del %Y");
                      ?>
                    </small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url();?>sesion/desconectar" class="btn btn-default btn-flat">Salir</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
      <aside class="left-side sidebar-offcanvas">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>public/img/avatar.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Hello, <?php echo ucwords($this->session->userdata('usuario')); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> En Línea</a>
            </div>
          </div>
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->

          <ul class="sidebar-menu">            
            <?php 
              if(isset($menu)){
                $j = 1;
                foreach ($menu as $key) {                  
                  $_activo = ($url[3] == $key->link_menu) ? 'activo' : '' ;
                  echo 
                  '<li class="'.$_activo.'">
                    <a href="'.base_url().$key->link_menu.'">
                      <p class="menu-vertical">'.$j.'</p>
                      <span>'.ucwords(utf8_decode($key->descripcion_menu)).'</span>
                    </a>
                  </li>';
                  $j++;
                }
              }
            ?> 
          </ul>
        </section>
      </aside>
      <aside class="right-side">
      <?php echo $content_for_layout;  
       ?>
         
      </aside>
    </div><!-- ./wrapper --> 

    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/jquery-ui-1.10.3.min.js"                                     type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/bootstrap.min.js"                                            type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/raphael-min.js"                                              type="text/javascript"></script>
    <!--<script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/morris/morris.min.js"                            type="text/javascript"></script>-->
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/sparkline/jquery.sparkline.min.js"                   type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"           type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"       type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/fullcalendar/fullcalendar.min.js"                    type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/jqueryKnob/jquery.knob.js"                           type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/daterangepicker/daterangepicker.js"                  type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/iCheck/icheck.min.js"                                type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/plugins/datepicker/bootstrap-datepicker.js"                  type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/AdminLTE/app.js"                                             type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/libs/bootstrap/js/AdminLTE/dashboard.js"                                       type="text/javascript"></script>    
    <script src="<?php echo base_url(); ?>public/js/select2/select2.js"                                                         type="text/javascript"></script>
  </body>
</html>