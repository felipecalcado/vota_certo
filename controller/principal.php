<?php
    
    require_once(MODEL . 'gerencia_usuario.php');
    require_once(MODEL . 'gerencia_candidato.php');

    $aCandidatos = selectAll('candidatos');
    
    $smarty->assign('A_CANDIDATOS',$aCandidatos);
    
    $smarty->display(VIEW . 'principal.tpl');
    
    

?>
