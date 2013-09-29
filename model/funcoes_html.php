<?php

/**
 * Monta select genérico
 * 
 * @param String $classe
 * @param Array $aStyle
 * @param Array $aEvent
 * @return string
 */
function MontaSelect($classe, $aStyle, $aEvent) {
    
    $html = '';
    
    $htmlStyle = 'style=';
    
    $htmlEvent = '';
    
    // TODO: USAR FOR PARA VARRER OS ARRAYS DE STYLE E EVENT PRA TORNAR A FUNÇÃO MAIS FLEXIVEL NA CHAMADA
    if(!empty($aStyle['width']))
        $htmlStyle .="'width={$aStyle['width']}";
        
    if(!empty($aEvent['onchange']))
        $htmlEvent .="'onchange={$aEvent['onchange']}";
        
    $html .= "<select name=select$classe $htmlStyle $htmlEvent>";
    
    $aObj = $classe::selectAll();
    
    foreach($aObj as $obj)
        $html .= "<option>{$obj->getNome()}</option>";
        
    $html .= '</select>';
    
    return $html;
    
}

function MontaPaginacao($pag, $busca = null) {
    
    $aRetorno = Array();
    
    $limite = QTD_ITEMS_PAGINACAO;
    
    $aRetorno['limite'] = $limite;
    
    if(!@$pag)
        $pag = 1;
    
    $inicio = ($pag * $limite) - $limite;
    
    $aRetorno['inicio'] = $inicio;
    
    $qntResultado = Candidato::countAll(@$busca);
    
    $totalPaginas = ceil($qntResultado / $limite);
    
    $paginacao = '';
    
    for($i=1 ; $i <= $totalPaginas ; $i++) {
        
        $paginacao .= "<a href='?pag={$i}'>{$i}</a>";
        
    }
    
    $aRetorno['paginacao'] = $paginacao;
    
    return $aRetorno;
    
}


?>
