<?php

    session_start();

    // inclue todas as pastas que serao comuns a todas as outras.
    require_once('constantes.php');
    require_once(DIR_MODEL . 'gerencia_erro.php');
    require_once(SMARTY . 'Smarty.class.php');
    require_once(XAJAX_CORE . 'xajax.inc.php');
    require_once(DIR_PROPEL . 'Propel.php');
    
    // models
    require_once(DIR_MODEL . 'funcoes_banco.php');
    require_once(DIR_MODEL . 'funcoes_html.php');
    
    try {
        
        // ==========> TESTES <============
//        $_SESSION['teste'] = 'teste';
//        echo $_SESSION['teste'];
//        echo print_r($_SESSION);
//        die();
//        
        // inicia as variáveis globais que vao ser usadas em todas as paginas.
        global $smarty, $xajax;

        // Smarty
        $smarty = new Smarty();
        $smarty->addTemplateDir('view/include/');
        //$smarty->assign('DIR_ABSOLUTO',"{$_SERVER['DOCUMENT_ROOT']}");

        // Xajax
        $xajax = new xajax();
        $xajax->configure('javascript URI', 'xajax');

        $smarty->assign('XAJAX', $xajax);
        
        // Propel
        Propel::init(DIR_PROPEL_PROJETO . 'build/conf/vota_certo-conf.php'); 
        set_include_path(DIR_PROPEL_PROJETO . "build/classes" . PATH_SEPARATOR . get_include_path());
        
        $requisicao = @$_GET['pagina'];
        
        if ($requisicao == '') 

            require_once(CONTROLLER . 'principal.php');

        else {

            require_once(CONTROLLER . "{$requisicao}");
                
        }
        
    } catch (Exception $e) {
        
        GerenciaErro::trataErro($e);
        
    }
        
?>
