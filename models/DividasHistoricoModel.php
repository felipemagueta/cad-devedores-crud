<?php 
require_once("./database/conn.php");
require_once('./models/DevedoresModel.php');

class DividasHistoricoModel{ 

    private $atributos;

    public function __set($atributo, $valor)
    {
        $this->atributos[$atributo] = $valor;
        return $this;
    }

    public function __get(string $atributo)
    {
        return $this->atributos[$atributo];
    }

    private function _format(){
 
        try {

            $return = array();
            foreach($this->atributos as $key => $value){ 
                $return["".$key.""] = "'".$value."'"; 
            } 
    
            if(isset($this->atributos['id'])){
                //
            } else {
                $return['data_cadastro'] = "'".date('Y-m-d H:i:s')."'";
                $return['hash'] = "'".uniqid()."'";
            }   
     
            return $return; 

        } catch (\Throwable $th) {
            throw $th;
        }
        
    } 

    public function save()
    {

        $colunas = $this->_format(); 

        if (!isset($this->id)) {
            $query = "INSERT INTO dividas_historico (".
                implode(', ', array_keys($colunas)).
                ") VALUES (".
                implode(', ', array_values( $colunas)).");";
        } else {
            foreach ($colunas as $key => $value) {
                if ($key !== 'id') {
                    $definir[] = "{$key}={$value}";
                }
            }
            $query = "UPDATE dividas_historico SET ".implode(', ', $definir)." WHERE id='{$this->id}';";
        }   
        if ($conexao = Conexao::getInstance()) {
            $stmt = $conexao->prepare($query);
            if ($stmt->execute()) {
                return $stmt->rowCount();
            }
        } 
        return false;
    }

    public static function find($filter = array()){

        $conexao = Conexao::getInstance();

        if(count($filter) == 0){
            $stmt = $conexao->prepare("
                SELECT dividas_historico.* FROM dividas_historico 
                ;");
        } else {
            $sql = "SELECT * FROM dividas_historico WHERE ";  
            foreach($filter as $key => $filtro){
                if(is_numeric($filtro)){
                    $sql .= $key.'='.$filtro;
                } else {
                    $sql .= $key.'="'.$filtro.'"';
                } 
            } 
            $stmt = $conexao->prepare($sql);
        }
         
        $result  = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject()) {
                $result[] = $rs;
            }
        }
        if (count($result) > 0) {
            return $result;
        } 
        return false; 
    }

    public static function delete($id)
    {
        $conexao = Conexao::getInstance();
        if ($conexao->exec("DELETE FROM dividas_historico WHERE id='{$id}';")) {
            return true;
        }
        return false;
    }

}
?>