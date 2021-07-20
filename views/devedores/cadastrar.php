<div class="container">
    <h3>Cadastrar Devedor</h3>
    <form method="POST" action="salvar">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" name="nome" id="nome" required="required" placeholder="Nome completo do devedor">
                </div>
                <div class="col-sm-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control telefone" name="telefone" required="required" id="telefone" placeholder="Telefone do devedor">
                </div>
            </div>
        </div>
 
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="cpf_cnpj">CPF ou CNPJ</label>
                    <input type="cpf_cnpj" class="form-control cpfcnpj" name="cpf_cnpj" required="required" id="cpf_cnpj" placeholder="CPF ou CNPJ do devedor">
                </div>
                <div class="col-sm-6">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" name="data_nascimento" required="required" id="data_nascimento" placeholder="Data de nascimento do devedor">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control cep" name="cep" id="cep" required="required" placeholder="CEP" onblur="loadEndereco();">
                </div>
                <div class="col-sm-5">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" required="required" placeholder="Cidade">
                </div>
                <div class="col-sm-4">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control estado" name="estado" required="required" id="estado" placeholder="Estado">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" required="required" id="logradouro" placeholder="Rua, Av">
                </div>
                <div class="col-sm-4">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero" required="required" id="numero" placeholder="Nº">
                </div>
            </div>
        </div> 

        <button type="submit" class="btn btn-warning">Salvar</button>
    </form>
</div>