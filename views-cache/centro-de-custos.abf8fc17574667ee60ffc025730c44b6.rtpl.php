<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Centros de Custos
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/centro-de-custos">Centro de Custos</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/centro-de-custos/create" class="btn btn-success">Cadastrar Centro de Custos</a>
            </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Centro de Custos</th>
                    <th style="text-align: center;">Tipo de C.C.</th>
                    <th style="text-align: center;">Data Criação</th>
                    <th style="width: 140px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($centro_de_custos) && ( is_array($centro_de_custos) || $centro_de_custos instanceof Traversable ) && sizeof($centro_de_custos) ) foreach( $centro_de_custos as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo htmlspecialchars( $value1["id_centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td style="text-align: center;"><?php if( $value1["tipo_movimento"] == 'S' ){ ?><span class="fa fa-minus" style="color: red;"> Saída</span><?php } ?><?php if( $value1["tipo_movimento"] == 'E' ){ ?><span class="fa fa-plus" style="color: green;"> Entrada</span><?php } ?></td>
                    <td style="text-align: center;"><?php echo htmlspecialchars( $value1["data_cri"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td>
                      <a href="/admin/centro-de-custos/<?php echo htmlspecialchars( $value1["id_centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/admin/centro-de-custos/<?php echo htmlspecialchars( $value1["id_centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->