<?php

    require_once($_SERVER['DOCUMENT_ROOT'] . '/vota_certo/caminhos.php');
    require_once(SMARTY . 'Smarty.class.php');
    
    $smarty = new Smarty();
    
    $smarty->display(VIEW . 'principal.tpl');
    

?>
