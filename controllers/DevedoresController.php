<?php 
require_once("./models/DevedoresModel.php");

class DevedoresController extends Application{

    public function index(){

        try { 
            $devedor = new DevedoresModel(); 
            $result = $devedor->find();
            
            $this->view($this->actionFile, array('devedores' => $result));

        } catch (\Throwable $th) {
            throw $th;
        }        

    }

    public function cadastrar(){
        $this->view($this->actionFile);
    }

    public function salvar(){ 
  
        if(empty($_POST)) $this->redirect('devedores/index');
         
        try {
            $req = $this->params;

            $devedor = new DevedoresModel();
            $devedor->nome = $req['nome'];
            $devedor->telefone = $req['telefone'];
            $devedor->cpf_cnpj = $this->helper->docUnformat($req['cpf_cnpj']);
            $devedor->data_nascimento = $req['data_nascimento'];
            $devedor->cep = $req['cep'];
            $devedor->cidade = $req['cidade'];
            $devedor->estado = $req['estado'];
            $devedor->logradouro = $req['logradouro'];
            $devedor->numero = $req['numero']; 
            $devedor->hash = $req['devedor'] ?? false;
            $devedor->hash ? $devedor->id = $devedor->getDevedorIdbyHash($devedor->hash) : null;
            $devedor->save();

            $this->redirect('devedores/index');

        } catch (\Throwable $th) {
            throw $th;
        } 
    }

    public function editar(){  

        $req = $this->params; 

        $devedor = new DevedoresModel();
        $filtrar['hash'] = $req['devedor'];
        
        $result = $devedor->find($filtrar)[0];
        $this->view($this->actionFile, array('devedor' => $result));
        
    }

    public function excluir(){

        try {

            $req = $this->params; 
            $devedor = new DevedoresModel();

            $devedor->delete($req['devedor']);
            $this->redirect('devedores/index'); 
            

        } catch (\Throwable $th) {
            throw $th;
        }

    }
    

}