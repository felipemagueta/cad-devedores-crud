<div class="container">
    <h3>Histórico da dívida</h3>

    <div class="row">
        <div class="col-sm-5 col-md-5 col-xs-12">
            <h4>Detalhes da dívida</h4>
            <table class="table table-bordered  ">
                <thead>
                    <tr>
                        <th>Valor</th>
                        <td><?= $this->helper->moneyFormat($data['divida']->valor) ?></td>
                    </tr>
                    <tr>
                        <th>Data de Vencimento</th>
                        <td><?= $this->helper->dateFormatPt($data['divida']->data_vencimento) ?></td>
                    </tr>
                    <tr>
                        <th>Data de Cadastro</th>
                        <td><?= $this->helper->dateFormatPt($data['divida']->data_cadastro) ?></td>
                    </tr>
                    <tr>
                        <th>Descrição</th>
                        <td><?= $data['divida']->descricao_titulo ?></td>
                    </tr>
                </thead>
            </table>

            
        </div>

        <div class="col-sm-7 col-md-7 col-xs-12 historico">
            <h4>Histórico</h4>
            <?php if (!$data['historico']) { ?>
                <p class="empty">Nenhum histórico encontrado.</p>
            <?php } else { ?>
                <div class="historicobox">
                <table class="table table-bordered ">
                    <tbody>
                        <?php foreach ($data['historico'] as $historico) { ?>
                            <tr>
                                <td><?= $historico->descricao_historico ?></td>
                                <td><?= $this->helper->dateTimeFormatPt($historico->data_cadastro) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            <?php } ?>

            <form method="POST" action="<?= URLBASE ?>dividas-historico/salvar/divida/<?= $data['divida']->hash ?>">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="descricao_titulo">Adicionar Histórico:</label>
                            <textarea class="form-control" rows="4" name="descricao_historico" id="descricao_historico" placeholder="Descrição sobre o título"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Adicionar Histórico</button>
            </form>
        </div>

    </div>
</div>