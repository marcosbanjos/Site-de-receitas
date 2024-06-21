<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Receitas :: visualização</title>
</head>
<body>
    <div class="fundoAzul">
        <div class="container">
            <?php require_once("./menu.php"); ?>
        </div>
    </div>

    <div class="visual">
        <button>V I S U A L I Z A Ç Ã O</button>
            <div class="container">
                <table border="1">
                    <thead>
                        <tr>
                            <th width="50">FOTO</th>
                            <th width="100">TITULO</th>
                            <th width="100">CRIADOR</th>
                            <th width="200">INGREDIENTES</th>
                            <th width="200">PREPARO</th>
                            <th width="50">EXCLUIR</th>
                            <th width="50">EDITAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // conectando com o arquivo de visualização dos dados
                            require_once("./visualizacaobd.php");
                            if($totalRegistros > 0){
                                foreach($dados as $linha){
                        ?>
                        <tr>
                            <td align="center">
                                <img 
                                    src="./imagem/<?=$linha['fotoReceita'];?>" 
                                    alt="Imagem de Perfil" 
                                    width="50">
                            </td>
                            <td align="center">
                                <?=$linha["titulo"];?>
                            </td>
                            <td>
                                <?=$linha["criador"];?>
                            </td>
                            <td>
                                <?=$linha["ingredientes"];?>
                            </td>
                            <td>
                                <?=$linha["modoPreparo"];?>
                            </td>
                            <td align="center">
                                <a href="./excluir.php?id=<?=$linha["idReceitas"];?>">
                                    <img src="./img/excluir.png" alt="Apagar registro">
                                </a>
                            </td>
                            <td align="center">
                                <a href="./editar.php?id=<?=$linha["idReceitas"];?>">
                                    <img src="./img/editar.png" alt="Editar registro">
                                </a>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                            else{
                                echo "Tabela vazia";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>