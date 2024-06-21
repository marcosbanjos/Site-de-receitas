<?php
    // echo "<pre>";    
    //     print_r($_POST);
    //     print_r($_SERVER["REQUEST_METHOD"]);
    // echo "</pre>";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // pegando os dados vindo do formulário
        $id       = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);

        try {
            require_once("./_conexao/conexao.php");

            $comandoSQL = $conexao->prepare("

                DELETE FROM cadastros WHERE idReceitas = :id
            ");

            $comandoSQL->execute(array(
                ":id"       => $id
            ));

            if($comandoSQL->rowCount() > 0){
                //echo "Excluído com sucesso!";
                header("location:./visualizacao.php");
                exit();
            }
            else{
                echo "Erro na exclusão.";
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