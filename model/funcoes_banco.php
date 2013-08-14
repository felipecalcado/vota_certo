<?php

    global $pdo;
    
    $pdo = Banco::connect('vota_certo');

    //Classe que contém as funções básicas do banco de dados.
    class Banco {
        
        static function connect($nomeBase, $usu = 'root', $pass = ''){
            try {
                
               return new PDO("mysql:host=localhost;dbname={$nomeBase}","{$usu}","{$pass}");
               
            } catch (PDOException $pdoErro) {
                
                echo $pdoErro;
                
            }
        }
        
    }
    
?>
