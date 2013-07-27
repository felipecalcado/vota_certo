<?php
    require_once ('caminhos.php');
    
    require_once ('teste.php');
   
    
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <?php $xajax->printJavascript(); ?>
        <title>Vota Certo</title>
    </head>
    <body>
        <div id="todo">
            <div id="login">
                <h3 id="cabeçalho">Vota Certo - Login</h3>
                    <input id="in" type="text" name="usuario" value="usuario" onblur="if(value=='') value = 'Usuario'"  onfocus="if(value=='Usuario') value = ''" size="20"><br><br>
                    <input id="in" type="text" name="senha" value="senha" onfocus="if(value=='Senha') value = ''; type='password'; color=black" size="20" autocomplete="off"><br>
                    <button id="botaoLogin" onclick="xajax_doAdd()">Logar</button>
                    <a id="cadastrese" href="controller/cadastroCallView.php">Cadastre-se</a>
            </div>
        </div>
        <form action="#" method="post" onsubmit="return false;">

            <input type="button" onclick="xajax_doAdd(10,600);" id="btnAdd" value="Click Me" />

            <input type="button" onclick="xajax_doReset();" id="btnReset" value="Reset" />

            <p id="answer"></p>

         </form>

 
    </body>

</html>