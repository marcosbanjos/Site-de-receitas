<?php
    
    try {
        require_once("./_conexao/conexao.php");

        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

        $comandoSQL = $conexao->prepare("
        
            SELECT * FROM cadastros WHERE idReceitas = :id 

        ");

        $comandoSQL->execute(array(
            ":id" => $id
        ));

        $retorno = $comandoSQL->fetch();

    } catch (PDOException $erro) {
        echo("Entre em contato com o suporte!");
    }