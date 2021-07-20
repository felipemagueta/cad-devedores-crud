<div class="container">
    <h3>Editar Devedor</h3>
    <form method="POST" action="<?=URLBASE?>devedores/salvar/devedor/<?=$data['devedor']->hash?>"> 
        <div class="form-group">
            <div class="row"> 
                <div class="col-sm-8">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" value="<?=$data['devedor']->nome?>" name="nome" id="nome" required="required" placeholder="Nome completo do devedor">
                </div>
                <div class="col-sm-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control telefone" value="<?=$data['devedor']->telefone?>" name="telefone" id="telefone" required="required" placeholder="Telefone do devedor">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="cpf_cnpj">CPF ou CNPJ</label>
                    <input type="cpf_cnpj" class="form-control cpfcnpj" value="<?=  $data['devedor']->cpf_cnpj ?>" name="cpf_cnpj" id="cpf_cnpj" required="required" placeholder="CPF ou CNPJ do devedor">
                </div>
                <div class="col-sm-6">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" value="<?=$data['devedor']->data_nascimento?>" name="data_nascimento" id="data_nascimento" required="required" placeholder="Data de nascimento do devedor">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" value="<?=$data['devedor']->cep?>" name="cep" id="cep" placeholder="CEP" required="required">
                </div>
                <div class="col-sm-5">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" value="<?=$data['devedor']->cidade?>" name="cidade" id="cidade" placeholder="Cidade" required="required">
                </div>
                <div class="col-sm-4">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" value="<?=$data['devedor']->estado?>" name="estado" id="estado" placeholder="Estado" required="required">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" value="<?=$data['devedor']->logradouro?>" name="logradouro" id="logradouro" placeholder="Rua, Av" required="required">
                </div>
                <div class="col-sm-4">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" value="<?=$data['devedor']->numero?>" name="numero" id="numero" placeholder="Nº" required="required">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Salvar</button>
    </form>
</div>