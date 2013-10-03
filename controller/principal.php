<?php
    
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
    
    // busca candidatos
    $objQuery = CandidatoQuery::create();
    
    // de $inicio até $limite
    $objQuery->offset($inicio)
            ->limit($limite);
    
    // se houve requisicao de busca, filtra pelo nome
    if(@$busca)
        $objQuery->filterByNome($busca);
    
    // TODO: offset nao ta funcionando
    echo $objQuery->toString();
                
    // executa a query e recupera o resultado
    $aObjCandidatos = $objQuery->find();
    
    $smarty->assign('A_OBJ_CANDIDATOS',$aObjCandidatos);
    
    $smarty->assign('SELECT', MontaSelect('Candidato', array('width' => '150px'),array('onchange' => 'formBusca.submit()')));
    
    // style
    $fundo = IMAGENS . 'fundo.jpeg';
    $smarty->assign('FUNDO', $fundo);
    
    $smarty->display(VIEW . 'principal.tpl');
    
?>
