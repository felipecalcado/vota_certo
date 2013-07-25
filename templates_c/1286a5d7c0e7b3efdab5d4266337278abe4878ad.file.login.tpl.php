<?php /* Smarty version Smarty-3.1.12, created on 2013-07-25 23:40:54
         compiled from "C:\xampp\htdocs\vota_certo\view\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:397851f192b5b97919-52012867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1286a5d7c0e7b3efdab5d4266337278abe4878ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vota_certo\\view\\login.tpl',
      1 => 1374787312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '397851f192b5b97919-52012867',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51f192b5bd7f90_47073270',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f192b5bd7f90_47073270')) {function content_51f192b5bd7f90_47073270($_smarty_tpl) {?><html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <title>Vota Certo</title>
    </head>
    <body>
        <div id="todo">
            <div id="login">
                <h3 id="cabeçalho">Vota Certo - Login</h3>
                <form action="controller/login.php" method="post">
                    <input id="in" type="text" name="usuario" value="Usuario" onblur="if(value=='') value = 'Usuario'"  onfocus="if(value=='Usuario') value = ''" size="20"><br><br>
                    <input id="in" type="text" name="senha" value="Senha" onfocus="if(value=='Senha') value = ''; type='password'; color=black" size="20" autocomplete="off"><br>
                    <input id="botaoLogin" type="submit" value="Login"> <br />
                    <a id="cadastrese" href="controller/cadastroCallView.php">Cadastre-se</a>
                </form>
            </div>
        </div>
    </body>

</html>
<?php }} ?>