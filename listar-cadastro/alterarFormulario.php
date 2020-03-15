<!DOCTYPE html>
<html>
  <?php 
    @include('../head.php');
  ?> 
<body>
  <?php 
  	@include('../header.php');
    
    if(isset($_POST['alterar-cadastro'])){
      $codigo = $_POST['codigo'];
      $nome = $_POST['nome'];
      $ultimaAtualizacao = $_POST['ultimaAtualizacao'];
    }
	?>  

	<div class="container-fluid wrapper-content mt-5">
		<form class="form-cadastro" action="alterar.php" method="post">
      <h2>Alterar Cadastro</h2>
      
			<div class="form-group">
				<label>Código</label>
				<input type="hidden" class="form-control" name="codigo-alterar" value="<?=$codigo?>" >
				<input type="text" class="form-control" value="<?=$codigo?>" disabled>
			</div>
			<div class="form-group">
				<label for="nome">Nome Completo: *</label>
				<input type="text" class="form-control" placeholder="Digite o nome" value="<?=$nome?>" name="nome-completo-alterar" id="nome">
				<div id="msgCampoObrigatorio" class="alert alert-danger text-center mt-2" role="alert">Campo obrigatório</div>
				<div id="msgNomeCompleto" class="alert alert-danger text-center mt-2" role="alert">Por favor informe o nome completo.</div>
			</div>
			
      <button type="submit" name="btn-alterar" class="btn btn-primary btn-lg btn-block btEnviar btn-cadastrar">Enviar</button>
      <a href="/Teste-MontarSite/listar-cadastro/" class="btn btn-info btn-lg btn-block">Voltar</a>
			<div class="text-right mt-3">Última Atualização: <span id="ultimaAtualizacao"><?=$ultimaAtualizacao = date("d/m/Y")?></span></div>
		</form>
	</div>
	 
	<?php 
		@include('../footer.php');
	?>  
	
</body>
</html>