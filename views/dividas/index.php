<div class="container">
    <h3>Dívidas Cadastradas</h3>

    <?php if (!$data['dividas']) { ?>
        <p class="empty">Nenhuma dívida encontrada para este cliente.</p>
    <?php } else { ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome do Devedor</th>
                    <td><?=$data['devedor']->nome?></td>
                    <th>CPF/CNPJ:</th>
                    <td><?=$this->helper->docFormat($data['devedor']->cpf_cnpj)?></td>
                </tr>
                <tr>
                    <th>Data de Nascimento</th>
                    <td><?=$this->helper->dateFormatPt($data['devedor']->data_nascimento)?></td>
                    <th>Telefone</th>
                    <td><?=$data['devedor']->telefone?></td>
                </tr>
                <tr>
                    <th>Endereço</th>
                    <td colspan="3">
                        <?=$data['devedor']->logradouro?>, <?=$data['devedor']->numero?>
                        <br><?=$data['devedor']->cidade?>-<?=$data['devedor']->estado?>
                        <br><?=$data['devedor']->cep?>
                    </td>
                </tr>
            </thead>
        </table>

        <table class="table table-bordered">
            <thead>
                <tr> 
                    <th>Descrição do Título</th>
                    <th>Valor</th>
                    <th>Data de Vencimento</th>
                    <th>Data de Cadastro</th> 
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['dividas'] as $divida) { ?>
                    <tr> 
                        <td><?= $divida->descricao_titulo ?></td>
                        <td><?= $this->helper->moneyFormat($divida->valor) ?></td>
                        <td><?= $this->helper->dateFormatPt($divida->data_vencimento) ?></td>
                        <td><?= $this->helper->dateFormatPt($divida->data_cadastro) ?></td> 

                        <td class="acoes">
                            <a class="btn btn-info" href="<?=URLBASE?>dividas-historico/index/divida/<?= $divida->hash ?>">Histórico</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
 
    <div class="menu-listagem">
        <a class="btn btn-warning" href="<?=URLBASE?>dividas/cadastrar/devedor/<?= $data['devedor']->hash ?>">Cadastrar Nova Dívida</a>
    </div>
</div>