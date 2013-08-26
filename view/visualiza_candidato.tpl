<html>
    <head>
        {include file="header_padrao.tpl"}
    </head>
    <body>
        <div id="tabela" style="width: 600px">
            <table border="0">
                <tr>
                    <td align="center" style="height: 40px; width: 60px">
                        IMAGEM
                    </td>
                </tr>
                <tr>
                    <td title="Nome" style="padding-left: 5px; width:300px">
                        <label title="Nome">{$OBJ_CANDIDATO->getNome()}</label>
                    </td>
                    <td title="Cargo" style="padding-left: 5px; width: 200px">
                        <label title="Cargo">{$OBJ_CANDIDATO->getCargo()}</label>
                    </td>
                    <td title="Partido" align="center" style="width: 80px">
                        <label title="Partido">{$OBJ_CANDIDATO->getPartido()}</label>
                    </td>
                    <td title="Cidade" align="center" style="width: 60px">
                        <label title="Cidade">{$OBJ_CANDIDATO->getCidade()}</label>
                    </td>
                </tr>
                <tr>
                    <td title="Data" style="padding-left: 5px;">
                        <label title="Data">Data</label>
                    </td>
                </tr>
                <tr>
                    <td title="Historico" colspan="4" style="padding-left: 5px;">
                        <label title="Historico">{$OBJ_CANDIDATO->getHistorico()}</label>
                    </td>
                </tr>
            
            </table>
        </div>
    </body>
</html>
