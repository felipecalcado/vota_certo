<?php

    class Usuario {
        
        public static function login($usuario, $senha) {
            
            try {
               
                $pdo = Banco::connect('vota_certo');
                throw new PDOException;
                
                $sql = $pdo->query("select * from usuarios where login = '{$usuario}' and senha = '{$senha}'");

                $aResultado = $sql->fetch();

                if( !empty($aResultado) ) {

                    return true;

                } else {

                    return false;

                }

            } catch (PDOException $e) {
                
                echo $e;
                
            }
            
        }
        
        public static function insereUsu($usuario, $senha) {
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
            
    }
        
    
?>
