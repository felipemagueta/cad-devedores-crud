<div class="container">
    <h3>Devedores Cadastrados</h3>
    <?php if (!$data['devedores']) { ?>
        <p class="empty">Nenhum devedor encontrado.</p>
    <?php } else { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Endereço</th>
                    <th>Data de Cadastro</th>
                    <th>Última Atualização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['devedores'] as $devedor) { ?>
                    <tr>
                        <td><?= $devedor->nome ?></td>
                        <td><?= $this->helper->docFormat($devedor->cpf_cnpj) ?></td>
                        <td><?= $this->helper->dateFormatPt($devedor->data_nascimento) ?></td>
                        <td><?= $devedor->logradouro ?>, <?= $devedor->numero ?> <?= $devedor->cidade ?>-<?= $devedor->estado ?></td>
                        <td><?= $this->helper->dateFormatPt($devedor->data_cadastro) ?></td>
                        <td><?= $this->helper->dateTimeFormatPt($devedor->updated) ?></td>
                        <td class="acoes">
                            <a class="btn btn-info" href="<?=URLBASE?>devedores/editar/devedor/<?= $devedor->hash ?>">Editar Cadastro</a>
                            <a class="btn btn-info" href="<?=URLBASE?>dividas/index/devedor/<?= $devedor->hash ?>">Dívidas</a>
                            <a class="btn btn-info" href="<?=URLBASE?>devedores/excluir/devedor/<?= $devedor->hash ?>">Excluir Cadastro</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody> 
        </table>
    <?php } ?>

    <div class="menu-listagem">
        <a class="btn btn-warning" href="<?=URLBASE?>devedores/cadastrar">
            Cadastrar Novo Devedor
        </a>
    </div>
</div>