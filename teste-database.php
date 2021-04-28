<?php
//delete from "nomeTabela" where id <> 0 - Apagar toda a tabela
// ctrl + enter  - Executa a linha de código no database;
// or die(mysqli_error($conexao)) - "matar o processo" e mostrar o erro - tratamento de erro

//Conectando ao Banco De Dados

//Criando Variáveis com as informações do Banco De Dados
const HOST = "localhost";
const USER = "root";
const PASSWORD = "Multi@11";
const DATABASE = "dbTaskList";

//Realiza a conexão com o banco de dados
$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_connect_error());

//Criando Query(Consulta) - Declarando a consulta a ser executada
$query = " SELECT * FROM tbl_tasks ";

//Executando a consulta utilizando a conexão criada e recebemos o resultado
$resultado = mysqli_query($conexao, $query) or die(mysqli_error($conexao)); 

//Tratamento de erro na consulta
if ($resultado == false){
    echo mysqli_error($conexao);
    die();
}

// O Resultado retornado será um objeto

//Trazendo a primeira linha da tabela
// $linha1 = mysqli_fetch_array($resultado);

// //Trazendo a segunda linha da tabela
// $linha2 = mysqli_fetch_array($resultado);

// //Trazendo a terceira linha da tabela
// $linha3 = mysqli_fetch_array($resultado);

// //Recuperando um dado através do nome da coluna
// echo "A Tarefa da linha 1 é: " . $linha1["descricao"];

// echo "<br /><br />";

// echo "A Tarefa da linha 2 é: " . $linha2["descricao"];

// echo "<br /><br />";

// echo "A Tarefa da linha 3 é: " . $linha3["descricao"];

//Usando um laço para listar os resultados

$minhaTarefa = "Nova Tarefa";

$sqlInsert = " INSERT INTO  tbl_tasks (descricao) VALUES('$minhaTarefa')";

$resultadoInsert = mysqli_query($conexao, $sqlInsert);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta chasrte="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhando com BD</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>DESCRIÇÃO</th>
        </tr>
        <?php
            while($linha = mysqli_fetch_array($resultado)){
        ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["descricao"] ?></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>

</html>

<?php
    //Encerrando a conexão com o banco de dados
    mysqli_close($conexao);        
?>
