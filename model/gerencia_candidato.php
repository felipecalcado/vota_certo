<?php

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

        //if (!$nome || !$historico) {
        //    echo ("<script>alert('Voce nao entrou com nome ou histórico.\nTente novamente.')</script>");
        //    $smarty->display(VIEW . 'login.tpl');
        //}

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

/**
 *  Busca todos os registros da tabela passada por param.
 * 
 * @param type $nomeTabela
 * @return type
 */
function selectAll($nomeTabela) {

    global $pdo;

    $sql = "select * from {$nomeTabela}";

    $resultado = $pdo->query($sql);

    return $resultado->fetchAll();
    
}

function selectCandidato($id) {
    
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

$xajax->processRequest();

?>
