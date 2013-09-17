<html>
    <head>
        {include file="header_padrao.tpl"}
        {literal}
            <script>
                
                function PopupCandidato(idCandidato) {
                    
                        aPopup[0] = window.open('?pagina=visualiza_candidato.php&id='+idCandidato,'PCandidato','location=no,width=600,height=400,top=90,left=380');
                         
                }
                
            </script>
        {/literal}
    </headh>
    <body>
        <form id="formBusca" onsubmit="return false;">
            <input id="busca" type="text" name="busca">
            <button id="btBusca" onclick="xajax_busca(xajax.getFormValues('formBusca'))">Buscar</button>
        </form>
        <br>
        <div>
            <table class="tabela_candidatos" style="table-layout: fixed; width: 50%;  margin: 0 auto">
                <tr>
                    <td style="width: 150px">
                        Nome
                    </td>
                    <td style="width: 60px">
                        Partido
                    </td>
                    <td>
                        Historico
                    </td>
                </tr>
                {foreach from=$A_OBJ_CANDIDATOS item=objCandidato} 
                    <tr id="data"  ondblclick="PopupCandidato({$objCandidato->getId()})">
                        <td>
                            {$objCandidato->getNome()}
                        </td>
                        <td>
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
            {$PAGINACAO}
        </div>
            <div>
                <a href="?pagina=cadastro_candidato.php">Cadastre um Candidato</a>
            </div>    
    </body>
</html>
