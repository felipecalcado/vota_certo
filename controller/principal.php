<?php
    
    require_once(MODEL . 'gerencia_usuario.php');
    require_once(MODEL . 'gerencia_candidato.php');

    $aObjCandidatos = Candidato::selectAll();
    
    $smarty->assign('A_OBJ_CANDIDATOS',$aObjCandidatos);
    
    $smarty->display(VIEW . 'principal.tpl');
    
    

?>
