<?php

class Usuario {

    private $nome, $usuario, $senha, $cidade;
    
    private $logado = false;
    
    private $aConfiguracao;
    
    private $aPermissao;

    public static function select($id) {

        try {

            global $pdo;

            if (empty($id))
                throw new Exception('Id não foi passado');
            
            $tabela = strtolower(get_class());
            
            $sql = "select * from $tabela where id = $id";

            $resultado = $pdo->query($sql);

            return $resultado->fetch();
            
        } catch (Exception $e) {

            GerenciaErro::trataErro($e);
            
        }
    }

    public static function getUsuarioById($id) {

        try {

            $aUsuario = self::select($id);

            return new Usuario(
                    $id,
                    $aUsuario['nome'],
                    $aUsuario['username'],
                    $aUsuario['senha'],
                    $aUsuario['id_cidade']
            );
            
        } catch (Exception $e) {

            GerenciaErro::trataErro($e);
            
        }
    }

}

?>
