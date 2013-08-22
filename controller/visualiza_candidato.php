<?php
    
    require_once(MODEL . 'gerencia_candidato.php');

    $idCandidato = $_GET['id'];
    
    $candidato = selectCandidato($idCandidato);
    
    $smarty->assign('CANDIDATO',$candidato);
    
    $smarty->display(VIEW . 'visualiza_candidato.tpl');
    
?>
