<?php
    // inclue todas as pastas que serao comuns a todas as outras.
    require_once('constantes.php');
    require_once(SMARTY . 'Smarty.class.php');
    require_once(XAJAX_CORE . 'xajax.inc.php');
    
    require_once(MODEL . 'funcoes_banco.php');
    
    try {
        
        // inicia as variáveis globais que vao ser usadas em todas as paginas.
        global $smarty, $xajax;

        // inicializa $smarty
        $smarty = new Smarty();

        // inicializa e configura $xajax.
        $xajax = new xajax();
        $xajax->configure('javascript URI', 'xajax');

        $smarty->assign('XAJAX', $xajax);

        $requisicao = @$_GET['pagina'];
        
        // chama a pagina que é chamada via $_get. Se é a primeira requisicao, loga.    
        if ($requisicao == '') 

            require_once(CONTROLLER . 'login.php');

        else 

            require_once(CONTROLLER . "{$requisicao}");
        
    } catch (Exception $e) {
        
        echo $e->getMessage();
        
    }
        
?>
