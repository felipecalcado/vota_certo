<?php

function Paginacao($pagina, $limite, $busca='') {
        
    global $aObjCandidatos;
    
    // Paginacao
    $limite = 3;
    
    if(!$pagina)
        $pagina = 1;
    
    $inicio = ($pagina * $limite) - $limite;
    
    if($busca)
        
        $aObjCandidatos = Candidato::selectAll($inicio,$limite,$busca);
        
    else 
        
        $aObjCandidatos = Candidato::selectAll($inicio,$limite);
    
    $qntResultado = Candidato::countAll();
    
    $totalPaginas = ceil($qntResultado / $limite);
    
    $paginacao = '';
    
    for($i=1 ; $i <= $totalPaginas ; $i++) {
        
        $paginacao .= "<a href='?pag={$i}'>{$i}</a>";
        
    }
    
    return $paginacao;
    
}


?>
