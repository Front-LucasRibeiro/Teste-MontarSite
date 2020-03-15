<!DOCTYPE html>
<html>
  <?php 
    @include('../head.php')
  ?> 
<body>
  <?php 
		@include('../header.php');
		@include('../config/conexaodb.php');
		session_start();
	?>  
	

	<div class="container-fluid wrapper-content mt-5">
		<form class="form-cadastro" action="adicionar.php" method="post">
			<h2>Formulário de Cadastro</h2>
			<div class="form-group">
				<label>Código</label>
				<input type="text" class="form-control" value="<?=buscaLastCode($conexao)?>" disabled>
			</div>
			<div class="form-group">
				<label for="nome">Nome Completo: *</label>
				<input type="text" class="form-control" placeholder="Digite o nome" name="nome-completo" id="nome">
				<div id="msgCampoObrigatorio" class="alert alert-danger text-center mt-2" role="alert">Campo obrigatório</div>
				<div id="msgNomeCompleto" class="alert alert-danger text-center mt-2" role="alert">Por favor informe o nome completo.</div>
			</div>
			
			<button type="submit" name="btn-cadastrar" class="btn btn-primary btn-lg btn-block btn-cadastrar">Enviar</button>
			<div class="text-right mt-3">Última Atualização: <span id="ultimaAtualizacao"><?=buscaUltimaAtualizacao($conexao)?></span></div>
		</form>

		<?php
			if(!empty($_SESSION['sucesso'])){
				echo '<div id="divInfoSucesso" class="alert alert-success  text-center mt-2" role="alert">Cadastrado realizado com sucesso</div>';
				unset($_SESSION['sucesso']);
			}
			if(!empty($_SESSION['erro'])){
				echo '<div id="divInfoErro" class="alert alert-danger  text-center mt-2" role="alert">Erro interno ao efetuar o cadastro</div>';
				unset($_SESSION['erro']);
			}
		?>
	</div>
	
	<?php 
		@include('../footer.php');
  ?>  
	
</body>
</html>