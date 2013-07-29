<?php

    require_once("{$_SERVER['DOCUMENT_ROOT']}/vota_certo/caminhos.php");
    require_once(SMARTY . 'Smarty.class.php');
    require_once(XAJAX_CORE . 'xajax.inc.php');
    require_once(MODEL . 'funcoes_banco.php');

    $smarty = new Smarty();
    
    $xajax = new xajax();
    
    $smarty->assign('XAJAX',$xajax);
    
    require_once(MODEL . 'gerencia_usuario.php');
    $smarty->display(VIEW . 'cadastro.tpl');
    
?>
