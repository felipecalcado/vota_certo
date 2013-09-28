<?php
    
    require_once(MODEL . 'gerencia_candidato.php');
    
    if(@$_SESSION['logado'])
        $smarty->assign('LOGADO', true);
    
    extract($_GET);

    echo print_r($_GET);
    
    if(@$selectCandidato)
        $busca = $selectCandidato;
        
    // TODO: TIRAR A BUSCA DA FUNÇÇÃO DE PAGINACAO
    $paginacao = Paginacao('Candidato',@$pag,QTD_ITEMS_PAGINACAO,@$busca);
        
    $smarty->assign('PAGINACAO', $paginacao);
    $smarty->assign('A_OBJ_CANDIDATOS',$aObjCandidatos);
    
    // Teste
    $smarty->assign('SELECT', MontaSelect('Candidato', array('width' => '150px'),array('onchange' => 'formBusca.submit()')));
    
    $fundo = IMAGENS . 'fundo.jpeg';
    
    $smarty->assign('FUNDO', $fundo);
    
    $smarty->display(VIEW . 'principal.tpl');
    
?>
