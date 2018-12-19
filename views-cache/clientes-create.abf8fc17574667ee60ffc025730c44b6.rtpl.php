<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Clientes
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/clientes">Clientes</a></li>
    <li class="active"><a href="/admin/clientes/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Clientes</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/clientes/create" method="post">
          <div class="box-body">
            <div class="col-md-12">
              <label for="nome_razao_social">Nome/Razão Social*</label>
              <input type="text" class="form-control" id="nome_razao_social" name="nome_razao_social" placeholder="Digite o Nome ou Razão Social" required>
            </div>
            
            <div class="col-md-6">
                <label for="apelido_nome_fantasia">Apelido/Nome Fantasia</label>
                <input type="text" class="form-control" id="apelido_nome_fantasia" name="apelido_nome_fantasia" placeholder="Digite o Apelido ou Nome Fantasia">
            </div>

            <div class="col-md-6">
                <label for="contato">Contato</label>
                <input type="text" class="form-control" id="contato" name="contato" placeholder="Digite o nome da pessoa em caso de pessoa jurídica">
            </div>

            <div class="col-md-12">
              <label for="tipo">Tipo*</label>
              <br/>
              <input type="radio" name="tipo" value="f" checked>
              <label>Pessoa física</label>
              <input type="radio" name="tipo" value="j">
              <label>Pessoa jurídica</label>
            </div>

            <div class="form-group">
              <div class="col-md-6">
                  <label for="cpf_cnpj">CPF/CNPJ*</label>
                  <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="000.000.000-00" required>
              </div>
            </div>

            <br/>

            <div class="form-group">
              <div class="col-md-8">
                  <label for="logradouro">Endereço</label>
                  <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Endereço...">
              </div>
              <div class="col-md-4">
                  <label for="numero">Número</label>
                  <input type="text" class="form-control" id="numero" name="numero" placeholder="0000">
              </div>
              <div class="form-group">
                  <div class="col-md-8">
                      <label for="complemento">Complemento</label>
                      <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Qd 00 Lt 00 - Prox... ">
                  </div>
                  <div class="col-md-4">
                      <label for="cep">CEP</label>
                      <input type="text" class="form-control" id="cep" name="cep" placeholder="00.000-000">
                    </div>
              </div>
              
              <div class="col-md-4">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Seu bairro...">
              </div>

              <div class="col-md-4">
                  <label for="cidade">Cidade*</label>
                  <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Sua cidade..." required>
              </div>

              <div class="col-md-4">
                  <label for="uf">Uf*</label>
                  <select name="uf" id="uf" class="form-control" required>
                    <option value="">Selecione</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AM">AM</option>
                    <option value="AP">AP</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MG">MG</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="PR">PR</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SE">SE</option>
                    <option value="SP">SP</option>
                    <option value="TO">TO</option>
                 </select>
              </div>

            </div>
            
            <div class="form-group">
                <div class="col-md-12">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="seuEmail@provedorDeEmail.com">
                </div>
                <div class="col-md-6">
                    <label for="telefone_fixo">Telefone Fixo</label>
                    <input type="tel" class="form-control" id="telefone_fixo" name="telefone_fixo" placeholder="(00)0000-0000">
                </div>
                <div class="col-md-6">
                    <label for="telefone_celular">Telefone Celular*</label>
                    <input type="tel" class="form-control" id="telefone_celular" name="telefone_celular" placeholder="(00)00000-0000" required>
                </div>
            </div>

            <dic class="col-md-12">
              <label for="obs">Observações</label>
              <br/>
              <textarea class="box-body" rows="5" cols="50" id="obs" name="obs" placeholder="Digite aqui suas observações sobre o Fornecedor">  </textarea>
            </dic>
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