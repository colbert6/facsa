<!-- Default box -->
  <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title"> <?php echo $title; ?> </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
      </div>
      <div class="box-body">

        <p><font style="vertical-align: inherit;">Seleccione las opciones para generar el reporte</p>

        <!--div class="row"-->
          <form>
            <div class="col-md-6">
            <div class="form-group">
              <label>Inicio</label>
              <input type="date" class="form-control" id="fecha_inicio_reporte" value="<?php echo date('Y-m-d');?>" >
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
              <label>Fin</label>
              <input type="date" class="form-control" id="fecha_fin_reporte" value="<?php echo date('Y-m-d');?>" >
            </div>
            </div>

            <div class="col-md-6">
              <label>Escuela</label>
              <select class="form-control" id="nombre_escuela" name="nombre_escuela">
                <option value="" >Todas</option>
                <?php foreach ($lista_nombre_escuelas as $escuela): ?>     
                <option value="<?= $escuela['nombre_escuela'] ?>" ><?= $escuela['nombre_escuela'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-6">
              <label>Categoria usuario</label>
              <select class="form-control" id="categoria_usuario" name="categoria_usuario">
                <option value="" >Todas</option>
                <?php foreach ($lista_categoria_usuario as $categoria): ?>     
                <option value="<?= $categoria['categoria_usuario'] ?>" ><?= $categoria['categoria_usuario'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </form>
        <!--/div-->        

      </div>
      <!-- /.box-body -->
    
    <div class="box-footer">
      <button type="submit" class="btn btn-success" onclick="open_nuevo_reporte('EXCEL')">Generar REPORTE EXCEL</button>

      <button type="submit" class="btn btn-default" onclick="open_nuevo_reporte('PDF')">Generar REPORTE PDF</button>
    </div>
  </div>
  <!-- /.box -->

<script type="text/javascript">
  function open_nuevo_reporte(formato_reporte) {

    parametros_get = "?formato_reporte="+formato_reporte;
    parametros_get += "&fecha_inicio_reporte="+$("#fecha_inicio_reporte").val();
    parametros_get += "&fecha_fin_reporte="+$("#fecha_fin_reporte").val();
    parametros_get += "&nombre_escuela="+$("#nombre_escuela").val();
    parametros_get += "&categoria_usuario="+$("#categoria_usuario").val();

    url_reporte = base_url +'reportes/generar_reporte_ingresantes/total/'+ parametros_get;
    window.open(url_reporte, "_blank");
  }
</script>
