<html>
    <head>
        
        {include file="header_padrao.tpl"}
        
        
    </headh>
    <body>
        
        <label id='teste' style="visibility: hidden">Bem vindo seu lindo</label>
        <br>
        <a href="?pagina=cadastro_candidato.php">Cadastre um candidato</a>
        <div>
            <table border="1">
                <tr>
                    <td>
                        Nome
                    </td>
                    <td>
                        Partido
                    </td>
                    <td>
                        Historico
                    </td>
                </tr>
                {foreach from=$A_CANDIDATOS item=objCandidato} 
                    <tr>
                        <td onclick="alert('teste')">
                            {$objCandidato['nome']}
                        </td>
                        <td style="text-align: center">
                             {$objCandidato['partido']}
                        </td>
                        <td>
                             {$objCandidato['historico']}
                        </td>
                    </tr>
                {/foreach}
            </table>
        </div>
    </body>
</html>
