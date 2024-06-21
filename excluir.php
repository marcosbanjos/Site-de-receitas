<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas :: Excluir</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
    <div class="fundoAzul">
        <div class="container">
            <?php require_once("./menu.php"); ?>
        </div>
    </div>
    <?php
        require_once("./excluirbd_view.php");
    ?>
    <div class="visual">
        <button>E X C L U I R</button>
        <div class="container">
            <form action="excluirbd.php" method="post">

                <input type="hidden" name="id" value="<?=$id;?>">
                <input type="hidden" name="foto" id="foto" value="<?=$retorno['fotoReceita'];?>">
                
                <div class="row">
                    <div class="colPerfil">
                        <label for="foto" class="perfil">
                            <img 
                                src="./imagem/<?=$retorno['fotoReceita'];?>" 
                                alt="Imagem de Perfil" 
                                width="50">
                        </label>                     
                        
                        <!-- <input type="file" name="foto" id="foto"> -->
                    </div>
                    <div class="col">
                        <label for="Titulo">Titulo</label>
                        <input 
                            type="text" 
                            name="titulo" 
                            id="titulo" 
                            placeholder="Título da receita"
                            value="<?=$retorno['titulo'];?>"
                            disabled>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <label for="criador">Criador</label>
                        <input 
                            type="text" 
                            name="criador" 
                            id="criador"
                            placeholder="Criador da Receita"
                            value="<?=$retorno['criador'];?>"
                            disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="ingredientes">Ingredientes</label>
                        <input 
                            type="big" 
                            name="ingredientes" 
                            id="ingredientes"
                            placeholder="Informe seu usuário de acesso"
                            value="<?=$retorno['ingredientes'];?>"
                            disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="modoPreparo">Modo de Preparo</label>
                        <input 
                            type="big" 
                            name="modoPreparo" 
                            id="modoPreparo"
                            placeholder="Modo de preparo"
                            value="<?=$retorno['modoPreparo'];?>"
                            disabled>
                    </div>

                </div>
                
                <div class="row">
                    <input 
                        type="reset" 
                        value="VOLTAR"
                        onclick="javascript:history.go(-1)">
                        
                    <input 
                        style="background-color:red;border:1px solid red;"
                        type="submit" 
                        value="E X C L U I R">
                </div>
            </form>
        </div>
    </div>

</body>
</html>