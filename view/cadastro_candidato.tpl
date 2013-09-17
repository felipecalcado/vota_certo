<html>
    <head>
        {include file="header_padrao.tpl"}
    </head>
    <body>
        <div style="margin: 0 auto; background-color: #333333;">
             <form id="formCadastro" onsubmit="return false;">
                    Nome <input id="nome" type="text" name="nome"><br>
                    Partido <input id="partido" type="text" name="partido" ><br>
                    Cargo <input id="cargo" type="text" name="cargo" ><br>
                    Cidade <input id="cidade" type="text" name="cidade" ><br>
                    Historico <input id="historico" type="text" name="historico" ><br>
                    <button onclick="xajax_insereCandidato(xajax.getFormValues('formCadastro'))">Cadastre</button>
             </form>
        </div>
        <button onclick="xajax_teste()">teste</button>
    </body>
        
</html>
