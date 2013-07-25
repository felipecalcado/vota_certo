<?php

    require_once('caminhos.php');
    require_once(SMARTY . 'libs/Smarty.class.php');
    
    $smarty = new Smarty();
    
    $smarty->display(VIEW . 'login.tpl');
    

?>
