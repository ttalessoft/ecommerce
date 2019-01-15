<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de contas a pagar/pagas
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/contas">Contas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/contas/nova" class="btn btn-success">Nova conta</a>
            </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Beneficiário</th>
                    <th>Centro de Custo</th>
                    <th>Status Doc.</th>
                    <th>Data emissão</th>
                    <th>Data vencimento</th>
                    <th>Valor</th>
                    <th style="width: 140px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($docs_pagar) && ( is_array($docs_pagar) || $docs_pagar instanceof Traversable ) && sizeof($docs_pagar) ) foreach( $docs_pagar as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo htmlspecialchars( $value1["id_doc_pagar"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["id_fornecedor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["id_centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["id_status_doc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo formataDatedmY($value1["data_emissao"]); ?></td>
                    <td><?php echo formataDatedmY($value1["data_vencimento"]); ?></td>
                    <td><?php echo formataPreco($value1["vlr_doc"]); ?></td>
                    <td>
                      <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="#" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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