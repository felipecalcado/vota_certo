<?php

$xajax->register(XAJAX_FUNCTION, 'login');
$xajax->register(XAJAX_FUNCTION, 'insereUsu');

$xajax->processRequest();

function login($aForm) {
    
    global $pdo;
    
    extract($aForm);
    
    $objResponse = new xajaxResponse();

    $sql = $pdo->query("select * from usuarios where usuario = '{$usuario}' and senha = '{$senha}'");

    $aResultado = $sql->fetch();

    if( !empty($aResultado) ) {

        $objResponse->alert('Login efetuado com sucesso!!!.');
        $objResponse->redirect('index.php?pagina=principal.php');

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

        $pdo->query("insert into usuarios(usuario, senha) values ('{$usuario}','{$senha}')");
        
        $objResponse->alert('Usuário Cadastrado!!!');
        $objResponse->redirect('index.php?pagina=principal.php');

    } catch (PDOException $e) {

        $objResponse->alert('Erro no cadastro do usuário');
        
    }
    
    return $objResponse;
            

}
            
?>
