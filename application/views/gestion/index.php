<section class="content-header">
  <ol class="breadcrumb">
    <li><i class="fa fa-cogs"></i> Gestión</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <?php 
      if(isset($sub_menu)){
        $k = 'A';
        foreach ($sub_menu as $key) {
          echo 
          '<div class="col-lg-3 col-xs-6">
            <div class="small-box bg-light-blue">
              <div class="inner">
                <h3 class="seccion">
                  '.$k.'
                </h3>
                <p>
                  '.utf8_encode(ucwords($key->descripcion_menu)).'
                </p>
              </div>
              <div class="icon">
                <i class="ion-android-friends"></i>
              </div>
              <a  href="'.base_url().$key->link_menu.'" class="small-box-footer">
                Ingresar
              </a>
            </div>
          </div>';
          $k ++;
        }
      }
    ?>          
  </div>
</section>