<?php

include "../infra/conexao.php";

$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];

$sql = "INSERT INTO livros (titulo, autor, ano) VALUES (?, ?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssi", $titulo, $autor, $ano);
$stmt->execute();

header("Location: ../index.php");

?> 

// Mudança feita no código de cadastro de livros para utilizar prepared statements, que ajudam a prevenir ataques de SQL Injection.  diferença é que agora o cadastro está mais seguro contra SQL Injection, porque os dados enviados pelo usuário são tratados de forma segura antes de serem inseridos no banco de dados.
