<?php

//importa a conexão com o banco de dados
include("./database/conexao.php");

switch($_POST["acao"]){
    case "inserir":

        //se houver uma tarefa a ser inserida, faz a inserção no banco
        if (isset($_POST["tarefa"]) && $_POST["tarefa"] != "") {
            $tarefa = $_POST["tarefa"];
            $sqlInsert = " INSERT INTO tbl_tasks(descricao) VALUES ('$tarefa')";

            $resultado = mysqli_query($conexao, $sqlInsert);

            if($resultado){
                $mensagem = "Tarefa adicionada com sucesso!";
                $tipoMensagem = "sucesso";
            }else{
                $mensagem = "Erro ao adicionar tarefa!";
                $tipoMensagem = "erro";
            }
        }
        break;

    case "deletar":
        if(isset($_POST["tarefaId"])){
            //receber o id da tarefa
            $tarefaId = $_POST["tarefaId"];

            //montar o sql de deleção com o id da tarefa
            $sqlInsert = " DELETE FROM tbl_tasks WHERE id = $tarefaId ";
            
            //executar o sql
            $resultado = mysqli_query($conexao, $sqlInsert);
            
            if($resultado){
                $mensagem = "Tarefa excluída com sucesso!";
                $tipoMensagem = "sucesso";
            }else{
                $mensagem = "Erro ao excluir a tarefa!";
                $tipoMensagem = "erro";
            }
        }
        break;
    
    case "editar":
        if(isset($_POST["tarefa"]) && $_POST["tarefa"] != "" && isset($_POST["tarefaId"]) ){
            
            //pegar a tarefa e a tarefaId
            $tarefa = $_POST["tarefa"];
            $tarefaId = $_POST["tarefaId"];

            //declarar a query update
            $sqlUpdate = " UPDATE tbl_tasks SET descricao = '$tarefa' WHERE id = $tarefaId ";

            //Executar a query
            $resultado = mysqli_query($conexao, $sqlUpdate);

            //Verificação
            if($resultado){
                $mensagem = "Tarefa Editada com sucesso!";
                $tipoMensagem = "sucesso";
            }else{
                $mensagem = "Erro ao editar a tarefa!";
                $tipoMensagem = "erro";
                
            }

        }
        break;

    default:
        die("Ação Inválida");
        break;
}

//redirecionar para index - tela de listagem com a mensagem
header("location: index.php?mensagem=$mensagem&tipoMensagem=$tipoMensagem");
