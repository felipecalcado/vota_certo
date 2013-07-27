<?php
    
    require_once(MODEL . 'funcoes_banco.php');
    
    $smarty = new Smarty();
    
    $xajax = new xajax();
    
    $smarty->assign("xajax",$xajax);
    
    require_once(MODEL . 'gerencia_usuario.php'); 
    $smarty->display(VIEW . 'login.tpl');
    
?>
