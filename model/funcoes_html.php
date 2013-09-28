<?php
/*
 * Monta paginação
 * 
 * Sting $classe        - Define a classe dos items mostrados
 * int $pagina          - Página corrente
 * int (const) $limite  - Limite de items mostrados por página
 * String $busca        - Filtro de busca
 */
function Paginacao($classe ,$pagina, $limite, $busca='') {
        
    global $aObjCandidatos;
    
    $limite = 3;
    
    if(!$pagina)
        $pagina = 1;
    
    $inicio = ($pagina * $limite) - $limite;
    
    if($busca)
        
        $aObjCandidatos = $classe::selectAll($inicio,$limite,$busca);
        
    else 
        
        $aObjCandidatos = $classe::selectAll($inicio,$limite);
    
    $qntResultado = $classe::countAll();
    
    $totalPaginas = ceil($qntResultado / $limite);
    
    $paginacao = '';
    
    for($i=1 ; $i <= $totalPaginas ; $i++) {
        
        $paginacao .= "<a href='?pag={$i}'>{$i}</a>";
        
    }
    
    return $paginacao;
    
}

/**
 * TODO
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


?>
