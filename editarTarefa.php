<?php
    include("./database/conexao.php");
    
    //receber o id tarefa a ser editado
    $tarefaId = $_GET["tarefaId"];
    
    //select no banco de tarefa a ser editado
    $sqlSelect= " SELECT * FROM tbl_tasks WHERE id = $tarefaId ";

    //executar a consulta(mysqli_query)
    $resultado = mysqli_query($conexao, $sqlSelect);

    //extrair a linha da consulta  (mysqli_fetch_array)
    $tarefa = mysqli_fetch_array($resultado);

    if(!$tarefa){
        die("Impossível editar, tarefa não encontrada");
    }

    //colocar dentro do value do input a descrição de tarefa retornada do banco de dados

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa - Persistência De Dados</title>
    <link rel="stylesheet" type="text/css" href="./styles-global.css">
</head>
<body>

    <div class="content">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="./taskActions.php">
            <input type="hidden" name="acao" value="editar"/>
            <input type="hidden" name="tarefaId" value = "<?= $tarefa["id"] ?>"/>
            <div class="input-group">
                <label for="tarefa">Descrição da tarefa</label>
                <input type="text" name="tarefa" value="<?= $tarefa["descricao"] ?>" id="tarefa" placeholder="Digite a nova tarefa"/>
            </div>
            <button>Editar</button>
        </form>
    </div>
</body>
</html>