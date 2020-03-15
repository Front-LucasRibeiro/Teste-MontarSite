<?php 

$conexao = mysqli_connect("localhost",'root','','montarsite');

function buscaLastCode($conexao) {
	$query = "select codigo from pessoas ORDER BY codigo DESC LIMIT 1";
  $resultado = mysqli_query($conexao, $query);
  while($reg= mysqli_fetch_row($resultado)){
    return $reg[0] + 1;
  }
}

function buscaUltimaAtualizacao($conexao) {
	$query = "select ultimaAtualizacao from pessoas ORDER BY ultimaAtualizacao DESC LIMIT 1";
  $resultado = mysqli_query($conexao, $query);
  while($reg= mysqli_fetch_row($resultado)){
    return date("d/m/Y", strtotime($reg[0]));
  }
}

function buscaPessoa($conexao) {
  $pessoas = array();
	$query = "select * from pessoas";
	$resultado = mysqli_query($conexao, $query);
	while($pessoa = mysqli_fetch_assoc($resultado)){
    array_push($pessoas, $pessoa);
  }
  return $pessoas;
}

function cadastrarPessoa($conexao, $nome, $ultimaAtualizacao){
	$query = "insert into pessoas (nome, ultimaAtualizacao) values('{$nome}', '{$ultimaAtualizacao}')";
	return mysqli_query($conexao, $query);
}

function alteraCadastro($conexao, $codigo, $nome, $ultimaAtualizacao){
	$query = "update pessoas set nome= '$nome', ultimaAtualizacao= '$ultimaAtualizacao' where codigo= $codigo";
	return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $codigo ){
	$query = "delete from pessoas where codigo= {$codigo} ";
	return mysqli_query($conexao,$query);
}