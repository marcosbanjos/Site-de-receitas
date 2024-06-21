<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $pasta = "./imagem/";
        if(!empty($_FILES["foto"]["name"])){
            
            
            $nomeOriginal = str_replace(" ","_",$_FILES["foto"]["name"]);

            $token = md5(uniqid(rand(), true));

            $foto = $token.$nomeOriginal;

            $fotoUpload = $pasta.$foto;
        }
        else{
            $foto = "_perfil.png";
        }
        
        // pegando os dados vindo do formulário
        $titulo         = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ingredientes   = filter_input(INPUT_POST, "ingredientes", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $preparo        = filter_input(INPUT_POST, "modoPreparo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $criador        = filter_input(INPUT_POST, "criador", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        try {
            require_once("./_conexao/conexao.php");

            $comandoSQL = $conexao->prepare("

                INSERT INTO cadastros (
                    titulo,
                    ingredientes,
                    fotoReceita,
                    modoPreparo,
                    criador)
                VALUES (
                    :titulo,
                    :ingredientes,
                    :foto,
                    :modoPreparo,
                    :criador
                )            
            ");

            $comandoSQL->execute(array(
                ":titulo" => $titulo,
                ":ingredientes" => $ingredientes,
                ":foto"     => $foto,
                ":modoPreparo" => $preparo,
                ":criador" => $criador
            ));

            if($comandoSQL->rowCount() > 0){
                //echo "Inserido com sucesso!";
                if(!empty($_FILES["foto"]["name"])){
                    move_uploaded_file($_FILES["foto"]["tmp_name"],$fotoUpload);
                }

                header("location:./visualizacao.php");
                exit();
            }
            else{
                echo "Erro na gravação.";
            }

        } catch (PDOException $erro) {
            echo("Entre em contato com o suporte");
        }

    }else{
        echo("Entre em contato com o suporte!");
    }