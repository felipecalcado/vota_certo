<?php
    
    require_once(MODEL . 'gerencia_candidato.php');

    $idCandidato = $_GET['id'];
    
    $objCandidato = Candidato::getCandidatoById($idCandidato);
    
    $smarty->assign('OBJ_CANDIDATO',$objCandidato);
    
    $smarty->display(VIEW . 'visualiza_candidato.tpl');
    
?>
