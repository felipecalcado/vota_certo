<html>
    <head>
        
        {include file="header_padrao.tpl"}
        {literal}
            <script>
                var historico = '';
                function PopupCandidato(idCandidato){
                    
                    window.open('?pagina=visualiza_candidato.php&id='+idCandidato,'','width=600,height=500,top=90,left=380');
                    
                }
            </script>
        {/literal}
        
    </headh>
    <body>
        <label id='teste' style="visibility: hidden">Bem vindo seu lindo</label>
        <br>
        <a href="?pagina=cadastro_candidato.php">Cadastre um candidato</a>
        <div>
            <form onsubmit="return false;">
            <table class="tabela_candidatos" border="1">
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
                    
                    <tr id="data" onclick="PopupCandidato({$objCandidato['id']})">
                            <td>
                                {$objCandidato['nome']}
                            </td>
                            <td style="text-align: center">
                                 {$objCandidato['partido']}
                            </td>
                            <td>
                                {if $objCandidato['historico']|count_characters:true <= 300}
                                    {$objCandidato['historico']} 
                                {else}

                                    

                                {/if}
                            </td>
                    </tr>
                    
                {/foreach}
            </table>
            </form>
        </div>
    </body>
</html>
