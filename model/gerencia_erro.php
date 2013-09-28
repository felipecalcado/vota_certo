<?php

    class GerenciaErro{
        
        static function trataErro($objErro) {
            
            $objResponse = new xajaxResponse();
            
            // Erro funcional
            if($objErro->getCode() == 1) {
                // TODO: tratar o erro e responder ao usuario
                $objResponse->alert("{$objErro->getMessage()}");
            
            // Erro Tecnico
            } else {
                
                $objResponse->call('alert','Erro, desculpe');
                
                self::insere($objErro->getMessage(), $objErro->getFile(), $objErro->getLine());
                
            }
            
            return $objResponse;
            
        }
        
        static function insere($mensagem, $arquivo, $linha) {
            
            try {
                
                global $pdo;
                
                $pdo->query("insert into erro(mensagem,arquivo,linha) values('{$mensagem}','{$arquivo}','{$linha}')");
                
            } catch (PDOException $pdoErro){
                
                echo $pdoErro;
                
            }
            
        }
        
    }

?>
