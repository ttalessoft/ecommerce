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
                    <th style="width: 210px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($docs_pagar) && ( is_array($docs_pagar) || $docs_pagar instanceof Traversable ) && sizeof($docs_pagar) ) foreach( $docs_pagar as $key1 => $value1 ){ $counter1++; ?>

                  <tr>
                    <td><?php echo htmlspecialchars( $value1["id_doc_pagar"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo limitaString($value1["nome_razao_social"]); ?></td>
                    <td><?php echo htmlspecialchars( $value1["centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php if( $value1["status_doc"] == 'PAGO' ){ ?><span class="fa fa-thumbs-up" style="color: #09b83e;"> <?php echo htmlspecialchars( $value1["status_doc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><?php } ?><?php if( $value1["status_doc"] != 'PAGO' ){ ?><span class="fa fa-thumbs-down" style="color: #dd4b39;"> <?php echo htmlspecialchars( $value1["status_doc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span><?php } ?></td>
                    <td><?php echo formataDatedmY($value1["data_emissao"]); ?></td>
                    <td><?php echo formataDatedmY($value1["data_vencimento"]); ?></td>
                    <td>R$ <?php echo formataPreco($value1["vlr_doc"]); ?></td>
                    <td style="text-align: right;">
                      <?php if( $value1["status_doc"] != 'PAGO' ){ ?><a href="#" class="btn btn-success btn-xs"><i class="fa fa-money"></i> Baixar</a><?php } ?>

                      <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/admin/contas/<?php echo htmlspecialchars( $value1["id_doc_pagar"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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