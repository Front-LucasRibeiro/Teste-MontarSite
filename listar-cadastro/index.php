<!DOCTYPE html>
<html>
  <?php 
    @include('../head.php');
  ?> 
<body class="listagem">
  <?php 
		@include('../header.php');
		@include('../config/conexaodb.php');
		session_start();
	?>  
	
<div class="container mt-5 p-2 wrapper-listagem">
	<input type="text" id="pesquisar" placeholder="Digite um nome para pesquisar" class="form-control">
</div>	

<div class="container mt-5 wrapper-listagem">		
		<h2>Listagem</h2>

		<?php
			if(!empty($_SESSION['sucessoExcluir'])){
				echo '<div id="divInfoSucesso" class="alert alert-success  text-center mt-2" role="alert">Registro excluído com sucesso</div>';
				unset($_SESSION['sucessoExcluir']);
			}
			if(!empty($_SESSION['erroExcluir'])){
				echo '<div id="divInfoErro" class="alert alert-danger  text-center mt-2" role="alert">Erro interno ao tentar excluir registro</div>';
				unset($_SESSION['erroExcluir']);
			}
			if(!empty($_SESSION['sucessoAlterar'])){
				echo '<div id="divInfoSucesso" class="alert alert-success  text-center mt-2" role="alert">Registro alterado com sucesso</div>';
				unset($_SESSION['sucessoAlterar']);
			}
			if(!empty($_SESSION['erroAlterar'])){
				echo '<div id="divInfoErro" class="alert alert-danger  text-center mt-2" role="alert">Erro interno ao tentar alterar registro</div>';
				unset($_SESSION['erroAlterar']);
			}
		?>

	  <div class="table-responsive">         
			<table class="table table-striped mt-3" id="table-register">
		    <tbody id="tbody-register">
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th colspan="3">Última Atualização</th>
					</tr>
					 <?php
					  $pessoas = buscaPessoa($conexao);
						foreach ($pessoas as $pessoa) :
					 ?>
					<tr>
						<td><?= $pessoa['codigo']; ?></td>
						<td><?= $pessoa['nome']; ?></td>
						<td><?= date("d/m/Y", strtotime($pessoa['ultimaAtualizacao'])) ?></td>
						<td>
							<form action="alterarFormulario.php" method="post">
								<input type="hidden" name="codigo" value="<?=$pessoa['codigo']?>">
								<input type="hidden" name="nome" value="<?=$pessoa['nome']?>">
								<input type="hidden" name="ultimaAtualizacao" value="<?=date("d/m/Y", strtotime($pessoa['ultimaAtualizacao']))?>">
								<button class="btn btn-primary alterar-cadastro" name="alterar-cadastro">alterar</button>
							</form>
						</td>
						<td>
							<form action="remover.php" method="post">
								<input type="hidden" name="codigo" value="<?=$pessoa['codigo']?>">
								<button class="btn btn-danger btn-remover">remover</button>
							</form>
						</td>
					</tr>
					<?php
						endforeach
					?>
		    </tbody>
		  </table>
		</div>  
	</div>
  
  <?php 
    @include('../footer.php')
	?>  
	
</body>
</html>