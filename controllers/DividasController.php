<?php 
require_once("./models/DividasModel.php");
require_once("./models/DevedoresModel.php");

class DividasController extends Application{

    public function index(){

        try { 

            $req = $this->params; 
            $devedorHash = $req['devedor'];

            $devedor = new DevedoresModel();
            $devedorDados = $devedor->find( array('hash' => $devedorHash) )[0]; 

            $dividas = new DividasModel();
            $result = $dividas->find( array('devedores_id' => $devedorDados->id) ); 
            
            $this->view($this->actionFile, array('devedor' => $devedorDados, 'dividas'=>$result));
 

        } catch (\Throwable $th) {
            throw $th;
        }        

    }

    public function cadastrar(){  

        $req = $this->params;
        $devedor = $req['devedor'];

        $this->view($this->actionFile, array('devedor'=>$devedor)); 

    }

    public function salvar(){ 

        if(empty($_POST)) $this->redirect('dividas/index');

        try {
            $req = $this->params; 
            $devedor = $req['devedor'];  

            $dividas = new DividasModel(); 
            $dividas->descricao_titulo = $req['descricao_titulo'];
            $dividas->valor = $req['valor'];
            $dividas->data_vencimento = $req['data_vencimento'];

            $devedor ? $dividas->devedores_id = DevedoresModel::getDevedorIdbyHash($devedor) : null;  
            $dividas->save();
            
            $this->redirect('dividas/index/devedor/'.$devedor);

        } catch (\Throwable $th) {
            throw $th;
        } 
    }  

}