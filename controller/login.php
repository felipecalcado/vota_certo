<?php
    
    require_once('../caminhos.php');
    require_once(SMARTY . 'libs/Smarty.class.php');
    require_once(MODEL . 'gerencia_usuario.php'); 
    require_once(MODEL . 'funcoes_banco.php');
    
    $smarty = new Smarty();
    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    if ( Usuario::login($usuario, $senha) ) { 
        
        $smarty->display(VIEW . 'principal.tpl');
        
    } else {
        
        $smarty->display(VIEW . 'erro.tpl');
        
    }

?>
