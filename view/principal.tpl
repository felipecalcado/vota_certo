<html>
    <head>
        
        {include file="header_padrao.tpl"}
        {literal}
            <script>
                var historico = '';
                function PopupCandidato(idCandidato){
                    
                    window.open('?pagina=visualiza_candidato.php&id='+idCandidato,'','width=600,height=400,top=90,left=380');
                    
                }
            </script>
        {/literal}
        
    </headh>
    <body>
        <label id='teste' style="visibility: hidden">Bem vindo seu lindo</label>
        <br>
        <div>
            <form onsubmit="return false;">
                <table class="tabela_objCandidatos" border="0" style="margin: 0 auto">
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
                {foreach from=$A_OBJ_CANDIDATOS item=objCandidato} 
                    
                    <tr id="data"  onclick="PopupCandidato({$objCandidato->getId()})">
                            <td>
                                {$objCandidato->getNome()}
                            </td>
                            <td style="text-align: center">
                                 {$objCandidato->getPartido()}
                            </td>
                            <td>
                                {if $objCandidato->getHistorico()|count_characters:true <= 300}
                                    {$objCandidato->getHistorico()} 
                                {else}

                                    

                                {/if}
                            </td>
                    </tr>
                    
                {/foreach}
            </table>
            </form>
        </div>
            <div>
                <a href="?pagina=cadastro_candidato.php">Cadastre um Candidato</a>
            </div>    
    </body>
</html>
