<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Centro de Custos
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/centro-de-custos">Centro de Custos</a></li>
    <li class="active"><a href="/admin/centro-de-custos/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Centro de Custo</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/centro-de-custos/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="centro_de_custo">Descrição do Centro de Custo</label>
              <input type="text" class="form-control" id="centro_de_custo" name="centro_de_custo" placeholder="Digite o Centro de Custo">
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
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->