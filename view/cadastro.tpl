<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/principal.css">
        <title>COG System Cadastro</title>
    </head>
    <body>
        <div id="cadastro">
            <h3 id="cabeçalho">Cadastro</h3>
            <form action="cadastro.php" method="post">
                <input id="inCadastro" type="text" name="usuario" value="Usuario" onfocus="if(value=='Usuario') value = ''" size="20"><br>
                <input id="inCadastro" type="rext" name="senha" value="Senha" onfocus="if(value=='Senha') value = ''; type='password'; color=black" size="20" autocomplete="off"><br>
                <input id="btCadastro" type="submit" value="Cadastrar"> <br />
            </form>
        </div>
        
    </body>
</html>
