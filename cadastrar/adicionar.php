<?php

@include('../config/conexaodb.php');
session_start();

if(isset($_POST['btn-cadastrar'])){

  $nome = mysqli_escape_string($conexao, $_POST['nome-completo']);
  $ultimaAtualizacao = date("Y/m/d");
  $hasSobrenome = strpos($nome,' ');

  if(cadastrarPessoa($conexao, $nome, $ultimaAtualizacao) && $nome != '' && $hasSobrenome >=0){
    
    $_SESSION['sucesso'] = "sucesso";
    header('Location: index.php');
  }
  else{
    $_SESSION['erro'] = "erro";
    header('Location: index.php');
  }
}


	