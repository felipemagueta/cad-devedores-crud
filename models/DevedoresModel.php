<?php 
require_once("./database/conn.php");
class DevedoresModel{ 

    private $atributos;

    public function __set($atributo, $valor)
    {
        $this->atributos[$atributo] = $valor;
        return $this;
    }

    public function __get(string $atributo)
    {
        return $this->atributos[$atributo] ?? null;
    }

    private function _format(){ 

        $return = array();
        foreach($this->atributos as $key => $value){ 
            $return["".$key.""] = "'".$value."'";
        }

        if(isset($this->atributos['id'])){
            $return['updated'] = "'".date('Y-m-d H:i:s')."'";
        } else {
            $return['data_cadastro'] = "'".date('Y-m-d')."'";
            $return['hash'] = "'".uniqid()."'";
        } 
        return $return;

    }

    public function save()
    { 
        $colunas = $this->_format(); 
 
        if(isset($colunas['id']) && $colunas['id'] != null){
            foreach ($colunas as $key => $value) {
                if ($key !== 'id') {
                    $definir[] = "{$key}={$value}";
                }
            }
            $query = "UPDATE devedores SET ".implode(', ', $definir)." WHERE id='{$this->id}';";
        } else {
            $query = "INSERT INTO devedores (".
                implode(', ', array_keys($colunas)).
                ") VALUES (".
                implode(', ', array_values( $colunas)).");";
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
            $stmt = $conexao->prepare("SELECT * FROM devedores;");
        } else {
            $sql = "SELECT * FROM devedores WHERE "; 
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

    public static function delete($hash)
    {
        $conexao = Conexao::getInstance(); 
        if ($conexao->exec("DELETE FROM devedores WHERE hash='{$hash}';")) {
            return true;
        }
        return false;
    }

    public static function getDevedorIdbyHash($devedor_hash){ 
        $conexao = Conexao::getInstance();
        $query = "SELECT * FROM devedores WHERE hash='{$devedor_hash}'"; 
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $rs = $stmt->fetchObject(); 
        return $rs->id;
    }

}
?>