<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        {include file="header_padrao.tpl"}
        <title>Vota Certo</title>
    </head>
    <body>
        <div id="todo">
            <div id="login">
                <label id="texto_25">Login</label>
                <form id="formLogin" onsubmit="return false;">
                    <input id="usuario" type="text" name="usuario" value="Usuario" onblur="if(value=='') value = 'Usuario'"  onfocus="if(value=='Usuario') value = ''" size="20"><br>
                    <input id="senha" type="text" name="senha" value="Senha" onfocus="if(value=='Senha') value = ''; type='password'; color=black" size="20" autocomplete="off"><br>
                    <button id="btLogin" onclick="xajax_login(xajax.getFormValues('formLogin'))">Login</button>
                    <a id="cadastrese" href="?pagina=cadastro.php">Cadastre-se</a>
                </form>
            </div>
        </div>
    </body>

</html>


