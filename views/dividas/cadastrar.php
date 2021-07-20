<div class="container">
    <h3>Cadastrar Dívida</h3>
    <form method="POST" action="<?=URLBASE?>dividas/salvar/devedor/<?=$data['devedor']?>"> 
 
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control valor" name="valor" id="valor" placeholder="Valor do título">
                </div>
                <div class="col-sm-6">
                    <label for="data_vencimento">Data de Vencimento</label>
                    <input type="date" class="form-control" name="data_vencimento" id="data_vencimento" placeholder="Data de vencimento do título">
                </div>
            </div>
        </div> 

        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label for="descricao_titulo">Descrição</label>
                    <textarea class="form-control" rows="4" name="descricao_titulo" id="descricao_titulo" placeholder="Descrição sobre o título"></textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Salvar</button>
    </form>
</div>
 