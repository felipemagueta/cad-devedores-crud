<?php 
require_once("./models/DashboardModel.php");

class IndexController extends Application{

    public function index(){

        try {

            $dashboard = new DashboardModel();

            $filtros = array();
            $req = $this->params;
            if(isset($req['data_inicio'])){
                $filtros['data_inicio'] = $req['data_inicio'];
            } else {
                $filtros['data_inicio'] = date('Y-m-01');
            }

            if(isset($req['data_final'])){
                $filtros['data_final'] = $req['data_final'];
            } else {
                $filtros['data_final'] = date('Y-m-d');
            }   
 
            $devedores = count($dashboard::devedores($filtros)) ?? 0; 
            $dividas = count($dashboard::dividas($filtros)) ?? 0;
            $reais_receber = $dashboard::reaisReceber($filtros)[0]->soma_dividas ?? 0;
            $ultima_atualizacao = $dashboard::ultimaAtualizacao($filtros)[0]->dividas_historico ?? 0;
 
            $viewData['devedores'] = $devedores;
            $viewData['dividas'] = $dividas;
            $viewData['reais_receber'] = $this->helper->moneyFormat($reais_receber);
            $viewData['ultima_atualizacao'] = $this->helper->dateTimeFormatPt($ultima_atualizacao) ?? '-';
            $viewData['filtros'] = $filtros;

            $this->view($this->actionFile, $viewData);  

        } catch (\Throwable $th) {
            throw $th;
        }

    }
 
}