<?php
    
    require_once(MODEL . 'gerencia_usuario.php');

    $smarty->assign('XAJAX',$xajax);
    $smarty->display(VIEW . 'cadastro.tpl');
    
?>
