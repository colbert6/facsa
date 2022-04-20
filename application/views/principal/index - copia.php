
  
 <!-- Default box -->
  <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title"> Bienvenido <?php echo $this->session->userdata('username') ?> </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
      </div>
      <div class="box-body" >
        <div class="row">


         <?php foreach ($menu_usuario as $key => $value) :?> 
          
          <div class="col-md-4" >
            <div class="info-box bg-green" style="cursor: pointer;">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><?php echo $value['nombre_repositorio']; ?></span>
            <span class="info-box-number">5,200</span>
            <div class="progress">
            <div class="progress-bar" style="width: 50%"></div>
            </div>
            <span class="progress-description">
            <?php echo $value['enlace']; ?>
            </span>
            </div>

            </div>
          </div>



          
         <?php endforeach;   ?> 

        </div>       
      
      </div>
      <!-- /.box-body -->
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

