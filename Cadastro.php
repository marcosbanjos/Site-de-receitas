<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas :: Cadastro</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
    <div class="fundoAzul">
        <div class="container">
            <?php require_once("./menu.php"); ?>
        </div>
    </div>
    <div class="visual">
        <button>C A D A S T R A R</button>
        <div class="container">
            <form action="cadastrobd.php" method="post" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="colPerfil">
                        <label for="foto" class="perfil">
                            <img 
                                src="./imagem/_perfil.png" 
                                alt="Imagem de Perfil" 
                                width="50"
                                id="imagem">
                        </label>
                        
                        <input type="file" name="foto" id="foto" onchange="preview();">
                    </div>

                    <div class="col">
                        <label for="titulo" >Título da receita</label>
                        <input 
                            type="text" 
                            name="titulo" 
                            id="titulo" 
                            placeholder="Título da receita">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="criador">Criador</label>
                        <input 
                            type="text" 
                            name="criador" 
                            id="criador"
                            placeholder="O nome do criador da receita">
                    </div>
                
                </div>
                
                <div class="row">
                    <div class="col">
                        <label for="ingredientes">Ingredientes</label>
                        <input 
                            type="big" 
                            name="ingredientes" 
                            id="ingredientes"
                            placeholder="Ingredientes que serão utilizados na receita">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="modoPreparo">Modo de Preparo</label>
                        <input 
                            type="big" 
                            name="modoPreparo" 
                            id="modoPreparo"
                            placeholder="Informe o modo de preparo">
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