<?php

        $xajax->register(XAJAX_FUNCTION, 'login');
        
        $xajax->processRequest();
    
        function login2(){
            
            $objResponse = new xajaxResponse();
            
            $objResponse->call('alert','ola');
            
            return $objResponse;
            
        }
        
       
    
        function login($usuario,$senha) {
                
            $objResponse = new xajaxResponse();
            
            try {
               
                $pdo = Banco::connect('vota_certo');
               
                
                $sql = $pdo->query("select * from usuarios where usuario = '{$usuario}' and senha = '{$senha}'");

                $aResultado = $sql->fetch();

                if( !empty($aResultado) ) {
                    
                    $objResponse->call('alert','Usuário valido.');
                    

                } else {
                    
                    $objResponse->call('alert','Usuário não cadastrado.');
                    

                }
                
                return $objResponse;

            } catch (PDOException $e) {
                
                echo $e;
                
            }
            
        }
        
        function insereUsu($usuario, $senha) {
            try {
                 
                $pdo = Banco::connect('vota_certo');
                
                $sql = $pdo->query("select * from usuarios where login = '{$usuario}' or senha = '{$senha}'");
                
                $aResultado = $sql->fetch();
                
                if( !empty($aResultado) ) {
                
                    $pdo->query("insert into usuarios(login, senha) values ('{$usuario}','{$senha}')");
                    throw new PDOException;
                    echo "<script>alert('Usuario cadastrado')</script>";
                    
                } else {
                    
                    return false;
                    
                }
                
            } catch (PDOException $e) {
                
                echo $e;
                
            }
            
        }
            
    
        
    
?>
