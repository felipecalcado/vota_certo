<?php /* Smarty version Smarty-3.1.12, created on 2013-07-29 03:23:33
         compiled from "C:\xampp\htdocs\vota_certo\view\cadastro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2226651f560f4286ac2-70835457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be82802c016d441f5a5ccb1d9c9f7207715904b2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vota_certo\\view\\cadastro.tpl',
      1 => 1375061008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2226651f560f4286ac2-70835457',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51f560f43196c6_31140156',
  'variables' => 
  array (
    'XAJAX' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f560f43196c6_31140156')) {function content_51f560f43196c6_31140156($_smarty_tpl) {?><html>
    <head>
        <link rel="stylesheet" type="text/css" href="/vota_certo/css/cadastro.css">
        <?php echo $_smarty_tpl->tpl_vars['XAJAX']->value->printJavascript();?>

        <title>COG System Cadastro</title>
    </head>
    <body>
        <div id="cadastro">
            <h3 id="cabeçalho">Cadastro</h3>
            <form id="formCadastro" onsubmit="return false;">
                <input id="inCadastro" type="text" name="usuario" value="Usuario" onfocus="if(value=='Usuario') value = ''" size="20"><br>
                <input id="inCadastro" type="rext" name="senha" value="Senha" onfocus="if(value=='Senha') value = ''; type='password'; color=black" size="20" autocomplete="off"><br>
                <button id="cadastrese" onclick="xajax_insereUsu(xajax.getFormValues('formCadastro'))">Cadastrar</button>
            </form>
        </div>
        
    </body>
</html>
<?php }} ?>