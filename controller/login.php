<?php
    
    $_SESSION['logado'] = false;    

    require_once(DIR_MODEL . 'gerencia_usuario.php'); 
    
    $smarty->display(VIEW . 'login.tpl');
    
?>
