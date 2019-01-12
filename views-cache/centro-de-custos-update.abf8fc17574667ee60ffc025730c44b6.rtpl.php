<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Centros de Custos
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Centro de Custo</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/centro-de-custos/<?php echo htmlspecialchars( $centro_de_custo["id_centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="centro_de_custo">Nome da categoria</label>
              <input type="text" class="form-control" id="centro_de_custo" name="centro_de_custo" placeholder="Digite o centro de custo" value="<?php echo htmlspecialchars( $centro_de_custo["centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group col-md-2">
                <div class="box-header"><strong>Tipo de Centro de Custo</strong></div>
                  
                  <input type="radio" name="tipo_movimento" value="S" checked>
                  <label>Saída (-)</label>
                  <br>    
                  <input type="radio" name="tipo_movimento" value="E">
                  <label>Entrada (+)</label>
              </div>
          </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->