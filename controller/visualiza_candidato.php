<?php
    
    require_once(DIR_MODEL . 'candidato_ajax.php');
    require_once(DIR_MODEL . 'candidato_classe.php');

    $idCandidato = $_GET['id'];
    
    // TODO: Refatorar para o Propel
    $objCandidato = Candidato::getCandidatoById($idCandidato);
    
    $smarty->assign('OBJ_CANDIDATO',$objCandidato);
    
    $smarty->display(VIEW . 'visualiza_candidato.tpl');
    
?>
