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
   public static function selectAll() {

       global $pdo;

       $sql = "select * from candidatos";
       
       $resultado = $pdo->query($sql);
       
       $aCandidato = $resultado->fetchAll();
       
       $aObjCandidato = Array();
       
       foreach($aCandidato as $candidato) {
           
           $aObjCandidato[] = self::getCandidatoById($candidato['id']);
       
       }
       
       return $aObjCandidato;

   }
    
}

$xajax->register(XAJAX_FUNCTION, 'insereCandidato');
$xajax->register(XAJAX_FUNCTION, 'teste');

/**
 * Insere um registro
 * 
 * @param type $nome
 * @param type $partido
 * @param type $cargo
 * @param type $historico
 * @param type $cidade
 */
function insereCandidato($form) {
    
    try {
        
        global $pdo;
        
        if(!is_object($pdo))
            throw new Exception ('$pdo não foi instanciado', 0);
        
        $objResp = new xajaxResponse();
        
        extract($form);

        $sql = "insert into candidatos(nome,partido,cargo,cidade,historico) values ('{$nome}','{$partido}','{$cargo}','{$cidade}','{$historico}')";
        
        $pdo->query($sql);
        
        $objResp->alert('Candidato inserido com sucesso');
        $objResp->script("window.location.reload();");
        
        return $objResp;

    } catch (Exception $e) {
        GerenciaErro::trataErro($e);
    }
}

function teste(){
    
    $objResp = new xajaxResponse();
    
    $objResp->alert('teste');
    
    return $objResp;
    
}

$xajax->processRequest();


?>
