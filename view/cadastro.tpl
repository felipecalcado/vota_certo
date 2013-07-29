<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/vota_certo/css/cadastro.css">
        {$XAJAX->printJavascript()}
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
