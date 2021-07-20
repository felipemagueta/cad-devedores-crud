<?php 
require_once("./models/DividasModel.php");
require_once("./models/DevedoresModel.php");
require_once("./models/DividasHistoricoModel.php");

class DividasHistoricoController extends Application{

    public function index(){

        try { 

            $req = $this->params;  
            $dividaHash = $req['divida']; 

            $dividas = new DividasModel();
            $dividaResult = $dividas->find( array('hash' => $dividaHash) )[0];

            $historico = new DividasHistoricoModel();
            $historicoResult = $historico->find( array('dividas_id' => $dividaResult->id) ); 
 
            $this->view($this->actionFile, array('divida' => $dividaResult, 'historico'=>$historicoResult)); 

        } catch (\Throwable $th) {
            throw $th;
        }        

    }
 
    public function cadastrar(){  

        $req = $this->params;
        $divida = $req['divida'];

        $this->view($this->actionFile, array('divida'=>$divida)); 

    }

    public function salvar(){ 

        if(empty($_POST)) $this->redirect('dividas/index');

        try {
            $req = $this->params; 
            $divida = $req['divida']; 

            $historico = new DividasHistoricoModel(); 
            $historico->descricao_historico = $req['descricao_historico'];
            $historico->dividas_id = $req['divida'];
            $divida ? $historico->dividas_id = DividasModel::getDividaIdbyHash($divida) : null;   
            $historico->save();
             
            $this->redirect('dividas-historico/index/divida/'.$divida);

        } catch (\Throwable $th) {
            throw $th;
        } 
    }  

}