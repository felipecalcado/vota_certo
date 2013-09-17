<?php
    
    require_once(MODEL . 'gerencia_candidato.php');
    
    if(@$_SESSION['logado'])
        $smarty->assign('LOGADO', true);
    
    $pagina = @$_GET['pag'];
    $busca = @$_GET['busca'];
    
    $paginacao = Paginacao($pagina,2,$busca);
    
    $smarty->assign('PAGINACAO', $paginacao);
    
    $smarty->assign('A_OBJ_CANDIDATOS',$aObjCandidatos);
    
    $smarty->display(VIEW . 'principal.tpl');
    
?>
