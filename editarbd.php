<?php
    // echo "<pre>";    
    //     print_r($_POST);
    //     print_r($_SERVER["REQUEST_METHOD"]);
    // echo "</pre>";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // pegando os dados vindo do formulário
        $id             = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

        $titulo         = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ingredientes   = filter_input(INPUT_POST, "ingredientes", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $preparo        = filter_input(INPUT_POST, "modoPreparo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $criador        = filter_input(INPUT_POST, "criador", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nomeFoto       = filter_input(INPUT_POST, "nomeFoto", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

        $pasta = "./imagem/";
        if(!empty($_FILES["foto"]["name"])){
            
            if($nomeFoto != "_perfil.png"){
                unlink($pasta.$nomeFoto);
            }

            $nomeOriginal = str_replace(" ","_",$_FILES["foto"]["name"]);

            $token = md5(uniqid(rand(), true));

            $nomeFoto = $token.$nomeOriginal;

            $fotoUpload = $pasta.$nomeFoto;

        }

        try {
            require_once("./_conexao/conexao.php");

                $comandoSQL = $conexao->prepare("

                    UPDATE cadastros SET 
                        titulo       = :titulo,
                        ingredientes = :ingredientes,
                        fotoReceita  = :nomeFoto,
                        modoPreparo  = :modoPreparo,
                        criador      = :criador
                    WHERE idReceitas = :id
                ");

                $comandoSQL->execute(array(
                    ":titulo"       => $titulo,
                    ":ingredientes" => $ingredientes,
                    ":nomeFoto"     => $nomeFoto,
                    ":modoPreparo"  => $preparo,
                    ":criador"      => $criador,
                    ":id"           => $id
                ));
            
                if($comandoSQL->rowCount() > 0){
                    //echo "Alterado com sucesso!";
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
            echo("Entre em contato com o suporte! SQL");
            
            echo "<pre>";

                echo $comandoSQL->debugDumpParams();

            echo "</pre>";
        }

    }else{
        echo("Entre em contato com o suporte!");
    }
    