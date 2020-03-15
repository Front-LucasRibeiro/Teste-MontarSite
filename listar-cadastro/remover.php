<?php

@include('../config/conexaodb.php');
session_start();

if(isset($_POST['codigo'])){

  $codigo = mysqli_escape_string($conexao, $_POST['codigo']);

  if( removeProduto($conexao, $codigo )){
    $_SESSION['sucessoExcluir'] = "sucessoExcluir";
    header('Location: index.php?sucesso');
  }
  else{
    $_SESSION['erroExcluir'] = "erroExcluir";
    header('Location: index.php?erro');
  }
}
?>