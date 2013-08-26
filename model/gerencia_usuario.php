<?php

$xajax->register(XAJAX_FUNCTION, 'login');
$xajax->register(XAJAX_FUNCTION, 'insereUsu');

$xajax->processRequest();

function login($aForm) {
    
    global $pdo;
    
    extract($aForm);
    
    $objResponse = new xajaxResponse();
    
//    $senha = sha1($senha);
//    $objResponse->alert("$senha"); return $objResponse;
//          
    
    $sql = $pdo->query("select * from usuarios where usuario = '{$usuario}' and senha = '{$senha}'");

    $usuario = $sql->fetch();
    
    if( !empty($usuario) ) {
        
        if ($usuario['admin']) {
            $objResponse->script("document.getElementById('teste').style.visibility = visible;");
        }

        $objResponse->alert('Login efetuado com sucesso!!!');
        $objResponse->redirect('?pagina=principal.php');

    } else {

        $objResponse->alert('Usuário não cadastrado.');
        $objResponse->script("document.getElementById('usuario').focus()");

    }

    return $objResponse;

}

function insereUsu($aForm) {
    
    global $pdo;
    
    $objResponse = new xajaxResponse();
    
    extract($aForm);
    
    try {       
        
//        $senha = sha1($senha);
        

        $pdo->query("insert into usuarios(usuario, senha) values ('{$usuario}','{$senha}')");
        
        $objResponse->alert('Usuário Cadastrado!!!');
        $objResponse->redirect('?pagina=principal.php');

    } catch (PDOException $e) {

        $objResponse->alert('Erro no cadastro do usuário');
        
    }
    
    return $objResponse;
            
}

function verificaAdmin() {
    
    return true;
    
}
            
?>
