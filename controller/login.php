<?php
    
    $_SESSION['logado'] = false;    

    require_once(MODEL . 'gerencia_usuario.php'); 
    
    $smarty->display(VIEW . 'login.tpl');
    
?>
