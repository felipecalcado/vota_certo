<?php
    
    require_once(MODEL . 'gerencia_usuario.php'); 
    
    $smarty->assign("xajax",$xajax);
    
    $smarty->display(VIEW . 'login.tpl');
    
?>
