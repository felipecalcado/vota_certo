<html>
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
