<?php

@include('../config/conexaodb.php');
session_start();

if(isset($_POST['btn-alterar'])){

  $nome = mysqli_escape_string($conexao, $_POST['nome-completo-alterar']);
  $codigo = $_POST['codigo-alterar'];
  $ultimaAtualizacao = date("Y/m/d");
  $hasSobrenome = strpos($nome,' ');

  if(alteraCadastro($conexao, $codigo, $nome, $ultimaAtualizacao) && $nome != '' && $hasSobrenome >=0){
    $_SESSION['sucessoAlterar'] = "sucessoAlterar";
    header('Location: index.php?sucesso');
  }
  else{
    $_SESSION['erroAlterar'] = "erroAlterar";
    header('Location: index.php?erro');
  }
}


	