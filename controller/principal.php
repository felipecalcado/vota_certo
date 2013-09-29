<?php
    
    require_once(DIR_MODEL . 'candidato_classe.php');
    require_once(DIR_MODEL . 'candidato_ajax.php');
    
//    if(@$_SESSION['logado'])
//        $smarty->assign('LOGADO', true);

    // TODO: Substuir pela atribuição das variáveis
    extract($_GET);
    
    $arMontaPaginacao = MontaPaginacao(@$pag);
    
    $inicio = $arMontaPaginacao['inicio'];
    $limite = $arMontaPaginacao['limite'];
    $paginacao = $arMontaPaginacao['paginacao'];

    $smarty->assign('PAGINACAO', $paginacao);
    
    if(@$selectCandidato)
        $busca = $selectCandidato;
    
    $aObjCandidatos = Candidato::selectAll($inicio,$limite,@$busca);
    
    $smarty->assign('A_OBJ_CANDIDATOS',$aObjCandidatos);
    
    // Teste
    $smarty->assign('SELECT', MontaSelect('Candidato', array('width' => '150px'),array('onchange' => 'formBusca.submit()')));
    
    // style
    $fundo = IMAGENS . 'fundo.jpeg';
    
    $smarty->assign('FUNDO', $fundo);
    
    $smarty->display(VIEW . 'principal.tpl');
    
?>
