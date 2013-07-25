<?php

    class GerenciaCandidato extends Banco {
        
        

    /**
     * Insere um registro
     * 
     * @param type $nome
     * @param type $partido
     * @param type $cargo
     * @param type $historico
     * @param type $cidade
     */
    public static function insereCanditato($nome, $partido, $cargo, $historico, $cidade) {
        
        try {
            $pdo = new PDO("mysql:host=localhost;dbname={$nomeBanco}", 'root','');
            
            $nome = $_POST['nome'];
            $partido = $_POST['partido'];
            $cargo = $_POST['cargo'];
            $historico = $_POST['historico'];
            $cidade = $_POST['cidade'];

            if(!$nome || !$historico){
                    echo ("<script>alert('Voce nao entrou com nome ou histórico.\nTente novamente.')</script>");
                    $smarty->display(VIEW . 'login.tpl');
            }

            //Testar try catch.
            $sql = $pdo->query("insert into candidatos values (".$nome.",".$partido.",".$cargo.",".$historico.",".$cidade.")");

            if(!$sql) {
                echo ("<script>alert('A informação não pôde ser inserida...')</script>");
                $smarty->display(VIEW . 'login.tpl');
            }
        } catch (PDOException $e) {
            echo $e;
        }
        
        
        
    }
    }
?>
