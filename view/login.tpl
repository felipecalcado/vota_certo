<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        {$xajax->printJavascript()}
        <title>Vota Certo</title>
    </head>
    <body>
        <div id="todo">
            <div id="login">
                <h3 id="cabeçalho">Vota Certo - Login</h3>
                
                    <input id="usuario" type="text" name="usuario" value="Usuario" onblur="if(value=='') value = 'Usuario'"  onfocus="if(value=='Usuario') value = ''" size="20"><br><br>
                    <input id="senha" type="text" name="senha" value="Senha" onfocus="if(value=='Senha') value = ''; type='password'; color=black" size="20" autocomplete="off"><br>
                    <button onclick="xajax_login(document.getElementById('usuario').value,document.getElementById('senha').value)">Login</button>
                    <a id="cadastrese" href="controller/cadastroCallView.php">Cadastre-se</a>
                
            </div>
        </div>
    </body>

</html>
