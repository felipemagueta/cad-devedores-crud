<?php 
require_once("./database/conn.php");
class DashboardModel{

    public static function devedores($filter = array()){

        $conexao = Conexao::getInstance();
 
        $sql = "SELECT * FROM devedores"; 
        $stmt = $conexao->prepare($sql);
         
        $result = array();
 
        if ($stmt->execute()) { 
            while ($rs = $stmt->fetchObject()) {
                $result[] = $rs;
            }
        }
        
        return $result;

    }

    public static function dividas($filter = array()){

        $conexao = Conexao::getInstance();

        if(count($filter) == 0){
            $stmt = $conexao->prepare("SELECT * FROM dividas;");
        } else {
            $sql = "SELECT * FROM dividas WHERE "; 
            
            if(isset($filter['data_inicio']) && $filter['data_inicio'] != ''){
                $sql.='dividas.data_vencimento >= "'.$filter['data_inicio'].'"';
            }

            if(isset($filter['data_final']) && $filter['data_final'] != ''){
                $sql.=' && dividas.data_vencimento <= "'.$filter['data_final'].'"';
            }  

            $stmt = $conexao->prepare($sql);
        }
         
        $result = array();
 
        if ($stmt->execute()) { 
            while ($rs = $stmt->fetchObject()) {
                $result[] = $rs;
            }
        }
        
        return $result;

    }

    public static function reaisReceber($filter = array()){

        $conexao = Conexao::getInstance();

        if(count($filter) == 0){
            $stmt = $conexao->prepare("SELECT sum(valor) as soma_dividas FROM dividas;");
        } else {
            $sql = "SELECT sum(valor) as soma_dividas FROM dividas WHERE "; 
            
            if(isset($filter['data_inicio']) && $filter['data_inicio'] != ''){
                $sql.='dividas.data_vencimento >= "'.$filter['data_inicio'].'"';
            }

            if(isset($filter['data_final']) && $filter['data_final'] != ''){
                $sql.=' && dividas.data_vencimento <= "'.$filter['data_final'].'"';
            } 
            
            $stmt = $conexao->prepare($sql);
        }
         
        $result = array();
 
        if ($stmt->execute()) { 
            while ($rs = $stmt->fetchObject()) {
                $result[] = $rs;
            }
        }
        
        return $result;

    }

    public static function ultimaAtualizacao($filter = array()){

        $conexao = Conexao::getInstance();
 
        $stmt = $conexao->prepare("SELECT data_cadastro as dividas_historico FROM dividas_historico ORDER BY data_cadastro DESC limit 1;");
        $result = array();
 
        if ($stmt->execute()) { 
            while ($rs = $stmt->fetchObject()) {
                $result[] = $rs;
            }
        }
        
        return $result;

    }
 
}
?>