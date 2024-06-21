<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas :: Editar</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
    <div class="fundoAzul">
        <div class="container">
            <?php require_once("./menu.php"); ?>
        </div>
    </div>
    <?php
        require_once("./editarbd_view.php");
    ?>
    <div class="visual">
        <button> E D I T A R </button>
        <div class="container">
            <form action="editarbd.php" method="post">

                <input type="hidden" name="id" value="<?=$id;?>">
                <input type="hidden" name="nomeFoto" id="nomeFoto" value="<?=$retorno['fotoReceita'];?>">
                
                <div class="row">
                    <div class="colPerfil">
                        <label for="foto" class="perfil">
                            <img 
                                src="./imagem/<?=$retorno['fotoReceita'];?>" 
                                alt="Imagem de Perfil" 
                                width="50"
                                id="imagem"
                                name="imagem">
                        </label>                     
                        
                        <input type="file" name="foto" id="foto" onchange="preview();">
                    </div>

                    <div class="col">
                        <label for="Titulo">Titulo</label>
                            <input 
                                type="text" 
                                name="titulo" 
                                id="titulo" 
                                placeholder="Título da receita"
                                value="<?=$retorno['titulo'];?>">
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
                                value="<?=$retorno['criador'];?>">
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
                                value="<?=$retorno['ingredientes'];?>">
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
                                value="<?=$retorno['modoPreparo'];?>">
                    </div>
                </div>
                <div class="row">
                    <input 
                        type="reset" 
                        value="VOLTAR"
                        onclick="javascript:history.go(-1)">
                    <input 
                        type="submit" 
                        value="S A L V A R">
                </div>
            </form>
        </div>
    </div>
    <script>
        
        // FOTO -------------------
        function preview(){
            let file_foto = document.querySelector('#foto').files[0];
            let img_imagem = document.querySelector('#imagem');

            
            // faz a leitura da imagem
            let visualizacao = new FileReader();
            
            if(file_foto){
                // esse comando dispara o evento load da 
                // imagem quando ela for lida completamente            
                visualizacao.readAsDataURL(file_foto);
            }else{                
                img_imagem.src = "";
            }

            // evento de load quando disparada carrega a imagem da variável visualizacao
            visualizacao.onloadend = function(){
                img_imagem.src = visualizacao.result;
            }
        }
        // FIM FOTO -------------------

    </script>
</body>
</html>