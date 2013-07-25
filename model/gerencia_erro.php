<?php

    class GerenciaErro{
        
        static function insere($pdo, $mensagem, $arquivo, $linha) {
            
            try {
                
                $op = $pdo->query('insert into erros(mensagem,arquivo,linha) values({$mensagem},{$arquivo},{$linha})');
                throw new PDOException;
            
            } catch (PDOException $pdoErro){
                
                echo $pdoErro;
                
            }
            
        }
        
    }

?>
