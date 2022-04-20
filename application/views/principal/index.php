
<script type="text/javascript">

  function open_imprimir (url_controller, idsave){
      url = url_controller + idsave;
      //window.open(url, '_blank');
      window.open(url);  
  }


  function redireccionar( enlace, id_repositorio ){  

    msj_proceso = bootbox.alert({
        title: 'Redireccionando a repositorio',
        message: "<p id='carga_msj'> <i class='fa fa-spin fa-spinner'></i> Redireccionando ... </p>",
        closeButton: false
    });
      
    $.ajax({
        type:   'POST',
        url:    base_url +'principal/save_log_enlace_repositorio',
        data:   {id_repositorio:id_repositorio},
        dataType: 'json',

        success: function (result) {          
          msj_proceso.modal('hide'); 
        },
        error:function (result) {
            msj_proceso.modal('hide');
        },
        complete:function (){
            open_imprimir (enlace, '');
        }
    });   
      
  }
</script>

  
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
                      
      
      </div>
      <!-- /.box-body -->
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

<div class="col-md-6">

  <div class="box box-primary">

    <div class="box-header with-border">
    <h3 class="box-title">REPOSITORIOS DISPONIBLE</h3>
    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
    </div>

    <div class="box-body">
      <ul class="products-list product-list-in-box">

          <?php foreach ($menu_usuario as $key => $value) :?> 

            <li class="item">
            <div class="product-img">
            <img src="<?php echo base_url('assets/img/') . $value['imagen_repositorio'];  ?> " alt="Img">
            </div>
            <div class="product-info">
            <a href="javascript:redireccionar('<?php echo $value['enlace']; ?>',<?php echo $value['id_repositorio']; ?> )" class="product-title"> <?php echo $value['nombre_repositorio']; ?>
            <span class="label label-warning pull-right" style="line-height:3;">Visitar  WEB</span></a>
            <span class="product-description">
              <?php echo $value['descripcion']; ?>
            </span>
            </div>
            </li>
              
          <?php endforeach;   ?>
      </ul> 
    </div>


  </div>
</div>

