<?php

$xajax->register(XAJAX_FUNCTION, 'insereCandidato');
$xajax->register(XAJAX_FUNCTION, 'busca');

$xajax->processRequest();

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

        if (!is_object($pdo))
            throw new Exception('$pdo não foi instanciado', 0);

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

function busca($form) {

    $objResp = new xajaxResponse();

    extract($form);

    $objResp->redirect("?pagina=principal.php&busca=$busca");

    return $objResp;
    
}

?>
