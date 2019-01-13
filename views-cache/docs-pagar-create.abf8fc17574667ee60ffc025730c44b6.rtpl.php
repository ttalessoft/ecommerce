<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de contas a pagar/pagas
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/contas">Contas</a></li>
      <li class="active"><a href="/admin/contas/nova">Nova</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Novo Conta</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/contas/nova" method="post">
            <div class="box-body">
              <!-- Beneficiario -->
              <div class="col-md-12">
                <label for="id_fornecedor">Beneficiário*</label>
                <select class="js-example-basic-single" style="width: 100%;" id="id_fornecedor" name="id_fornecedor" required>
                    <option>Selecione...</option>
                  <?php $counter1=-1;  if( isset($fornecedores) && ( is_array($fornecedores) || $fornecedores instanceof Traversable ) && sizeof($fornecedores) ) foreach( $fornecedores as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["idfornecedor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome_razao_social"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["cpf_cnpj"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>

                </select>
              </div>
              <!-- Tipo Documento -->
              <div class="col-md-4">
                <label for="id_tipo_doc">Tipo Doc.*</label>
                <select class="js-example-basic-single" style="width: 100%;" id="id_tipo_doc" name="id_tipo_doc" required>
                  <option>Selecione...</option>
                  <?php $counter1=-1;  if( isset($tipos_doc) && ( is_array($tipos_doc) || $tipos_doc instanceof Traversable ) && sizeof($tipos_doc) ) foreach( $tipos_doc as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["id_tipo_doc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["tipo_doc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>

                </select>
              </div>
              <!-- Centro de custo -->
              <div class="col-md-4">
                <label for="id_centro_de_custo">Centro de Custo*</label>
                <select class="js-example-basic-single" style="width: 100%;" id="id_centro_de_custo" name="id_centro_de_custo" required>
                  <option>Selecione...</option>
                  <?php $counter1=-1;  if( isset($centro_de_custos) && ( is_array($centro_de_custos) || $centro_de_custos instanceof Traversable ) && sizeof($centro_de_custos) ) foreach( $centro_de_custos as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["id_centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["centro_de_custo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>

                </select>
              </div>
              <!-- Status Documento -->
              <div class="col-md-4">
                <label for="id_status_doc">Status Doc.</label>
                <select class="js-example-basic-single" style="width: 100%;" id="id_status_doc" name="id_status_doc">
                  <option>Selecione...</option>
                  <?php $counter1=-1;  if( isset($status_docs) && ( is_array($status_docs) || $status_docs instanceof Traversable ) && sizeof($status_docs) ) foreach( $status_docs as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["id_status_doc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["status_doc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>

                </select>
              </div>
              <!-- Número Documento -->
              <div class="col-md-8">
                <label for="num_doc">Número Doc.*</label>
                <input type="text" class="form-control" id="numero" name="num_doc" placeholder="000000000" required>
              </div>
              <!-- Série Documento -->
              <div class="col-md-4">
                <label for="sr_doc">Série Doc.</label>
                <input type="text" class="form-control" id="sr_doc" name="sr_doc" placeholder="000">
              </div>
              <!-- Data Emissão Documento -->
              <div class="col-md-4">
                  <label>Emissão Doc.</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker1" name="data_emissao" placeholder="Data de emissão do doc...">
                  </div>
              </div>
              <!-- Data Vencimento Documento -->
              <div class="col-md-4">
                  <label>Vencimento Doc.*</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker2" name="data_vencimento" placeholder="Data de pagamento do doc..." required>
                  </div>
              </div>
              <!-- Data Protesto Documento -->
              <div class="col-md-4">
                  <label>Protesto Doc.</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker3" name="data_protesta_em" placeholder="Data de protesto do doc...">
                  </div>
              </div>
              
                <div class="col-md-4">
                  <label for="vlr_doc">Valor doc.*</label>
                  <input type="text" class="form-control" id="moeda1" name="vlr_doc" placeholder="R$ 0,00" required>
                </div>

                <div class="col-md-4">
                    <label for="vlr_doc">Valor Pago.*</label>
                    <input type="text" class="form-control" id="moeda2" name="vlr_pago" placeholder="R$ 0,00" required>
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