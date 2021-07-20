<div class="container">
    <h3>Dashboard</h3>

    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="<?=URLBASE?>index/index">
                <div class="row">
                    <div class="form-group col-sm-4"> 
                        <label>Data Inicial:</label>
                        <input type="date" class="form-control" name="data_inicio" value="<?=$data['filtros']['data_inicio']?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Data Final:</label>
                        <input type="date" class="form-control" name="data_final" value="<?=$data['filtros']['data_final']?>">
                    </div>
                    <div class="form-group col-sm-4">
                        <button type="submit" class="btn btn-warning" style="margin-top: 34px;">Recalcular</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">

            <div class="dash">
                <div class="dashicon"><span class="material-icons">account_circle</span></div>
                <div class="dashtitle">Devedores</div>
                <div class="dashnumber"><?= $data['devedores'] ?></div>
            </div>

            <div class="dash">
                <div class="dashicon"><span class="material-icons">monetization_on</span></div>
                <div class="dashtitle">Dívidas cadastradas</div>
                <div class="dashnumber"><?= $data['dividas'] ?></div>
            </div>

            <div class="dash">
                <div class="dashicon"><span class="material-icons">paid</span></div>
                <div class="dashtitle">Reais à receber</div>
                <div class="dashnumber"><?= $data['reais_receber'] ?></div>
            </div>

            <div class="dash">
                <div class="dashicon"><span class="material-icons">history</span></div>
                <div class="dashtitle">Última atualização (Histórico)</div>
                <div class="dashnumber"><?= $data['ultima_atualizacao'] ?></div>
            </div>

        </div>
    </div>

</div>