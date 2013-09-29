<?php

class Candidato {
    
    private $id, $nome, $partido, $cargo, $cidade, $historico;
    
    public function Candidato($id, $nome, $partido, $cargo, $cidade, $historico) {
        
        $this->id = $id;
        $this->nome = $nome;
        $this->partido = $partido;
        $this->cargo = $cargo;
        $this->cidade = $cidade;
        $this->historico = $historico;
        
    }
    
    public function getId() {
        
        return $this->id;
        
    }
    
    public function getNome() {
        
        return $this->nome;
        
    }
    
    public function getPartido() {
        
        return $this->partido;
        
    }
    
    public function getCidade() {
        
        return $this->cidade;
        
    }
    
    public function getCargo() {
        
        return $this->cargo;
        
    }
    
    public function getHistorico() {
        
        return $this->historico;
        
    }

    public static function select($id) {
        
        try {
            
            global $pdo;

            if(!isset($id))
                throw new Exception('Id não foi passado');

            $sql = "select * from candidatos where id = $id";

            $candidato = $pdo->query($sql);
            
            return $candidato->fetch();
            
        }catch(Exception $e) {
            
            GerenciaErro::trataErro($e);
            
        }
        
    }
    
    public static function getCandidatoById($id) {
    
        try {
            
            $aCandidato = self::select($id);

            return new Candidato(
                $id,    
                $aCandidato['nome'],
                $aCandidato['partido'],
                $aCandidato['cargo'],
                $aCandidato['cidade'],
                $aCandidato['historico']
            );

        }catch(Exception $e) {

            GerenciaErro::trataErro($e);

        }
    
    }
    
    /**
    *  Busca todos os registros da tabela passada por param.
    * 
    * @param type $nomeTabela
    * @return type
    */
    public static function selectAll($inicio = null ,$limite = null ,$paramBusca = null) {

        global $pdo;
       
        $where = '';
        $limit = '';
        
        if( ($inicio || $inicio == 0) && $limite) 
            $limit = "limit {$inicio},{$limite}";

        if($paramBusca)
            $where = "where nome like '{$paramBusca}%'";

        $sql = "select * from candidatos {$where} {$limit}";
        
        $resultado = $pdo->query($sql);

        $aCandidato = $resultado->fetchAll();
        
        $aObjCandidato = Array();

        foreach($aCandidato as $candidato) {

            $aObjCandidato[] = self::getCandidatoById($candidato['id']);

        }
        
        return $aObjCandidato;

   }
   
   public static function countAll($paramBusca = '') {
       
       global $pdo;
       
       $where = '';
       
       if($paramBusca)
           $where = "where nome like '$paramBusca%'";
       
       $sql = "select count(*) from candidatos $where";
       
//       echo $sql;
       
       $resultado = $pdo->query($sql);
       
       $total = $resultado->fetch();
       
       return $total[0]; 
       
   } 
    
}

?>
