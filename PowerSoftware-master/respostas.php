<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Power Software</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <link href="css/meucss.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </head>
  <body>

    <div class="container-fluid">
		<div class="row">
		<div class="col-md-12"  id="titulo">
		<h1>Power Software</h1>
		</div>
	</div>
	<div class="row">
	</div>
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="index.php">Power Software</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="index.php">Home</a>
						</li>
						
								<li>
									<a href="download.php">Download</a>
								</li>
								<li>
									<a href="materias.php">Matérias</a>
								</li>
								
								<li>
									<a href="forum.php">Fórum</a>
								</li>
								
								<li class="divider">
								</li>
								<li>
							<?php
							session_start();
				if(isset($_SESSION['email'])){
						echo("<p></p>");
					}else{
						echo("<a href='cadastro.php'>Cadastro</a>");
						}
						?>
								</li>
							</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<?php		
									
									if(isset($_SESSION['senha'])== TRUE){
										
										if($_SESSION['user_type']==1){
											echo("<a href='tela_user_adm.php'>User</a>");
										
										}else{
										echo("<a href='tela_user.php'>User</a>");
									}
									}else{
										echo("<a href='login.php'>Login</a>");
									}
									
									?>
								</li>
								<li>
								<?php
									if(isset($_SESSION['email']) == TRUE){
										echo("<a href='logout.php'>Sair</a>");
									}
								?>
						</li>
				</div>	
			</nav>
			
			<div class="jumbotron" id="texto">
				<h2>
					Perguntas
				</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<div class="jumbotron">
			</div>
		</div>
		<div class="col-md-8">
			
				<?php
				require_once("conexao.php");
					
					$consultaPergunta = mysqli_query($conexao, "SELECT * FROM pergunta WHERE id_pergunta = '".$_GET['id_pergunta']."'");
					if (!$consultaPergunta) {
						$erro = mysqli_error($conexao);
						//header("location:erro.php?erro=$erro");
						echo("$erro");
					}
					else 
					{   
						while ($row = mysqli_fetch_array($consultaPergunta, MYSQL_ASSOC)){
							$sqlUser = mysqli_query($conexao, 'SELECT * FROM user WHERE id_user = '.$row["id_user_fk"]);
							while ($rowUser = mysqli_fetch_array($sqlUser, MYSQL_ASSOC))
							{
								echo("<div class='panel panel-primary'>");
								$userType = "usuario";
									if($rowUser['tipo_user_fk'] == 1)
									{
										$userType = "Admin";
									}
									else if($rowUser['tipo_user_fk'] == 2)
									{
										$userType = "usuario";
									}
								echo ("<div class='panel-heading'><p>Pergunta de ".$rowUser["nome"]." <span class='tag tag-info'>".$userType."</span></p><p>".$row['conteudo_pergunta']."</p></div>");
								
							}
							$sqlRespostas = mysqli_query($conexao, 'SELECT id_resposta, conteudo_resposta, id_user_fk, tipo_user_fk, nome FROM resposta, user WHERE id_user_fk = id_user AND id_pergunta_fk = '.$row["id_pergunta"]);
							while ($rowResposta = mysqli_fetch_array($sqlRespostas, MYSQL_ASSOC))
							{
								$userType = "usuario";
								if($rowResposta['tipo_user_fk'] == 1)
								{
									$userType = "Admin";
								}
								else if($rowResposta['tipo_user_fk'] == 2)
								{
									$userType = "usuario";
								}
								echo("<div class='panel-body'>resposta de ".$rowResposta['nome']." <span class='tag tag-info'>".$userType."</span></div><div class='panel-footer'>".$rowResposta['conteudo_resposta']."</div>");
								
							}
							if(isset($_SESSION['id'])){
								echo("<div class='alert alert-info'>
								<form action='processar_resposta.php' id='enviarResposta' method='post'>
								<h4 class='f'>Digite sua resposta abaixo para ser publicada:</h4></br>
								<textarea name='res' rows='3' cols='40' form='enviarResposta'></textarea></br>
								<input type='hidden' name='user_id' value='".$_SESSION['id']."'>
								<input type='hidden' name='pergunta_id' value='".$row["id_pergunta"]."'>
								<input type='submit' class='btn btn-default'/>
								</form></br>
									</div>");
								echo("</div>");	
							}
		
						}
						
					}
				?>
				
		</div>
		<div class="col-md-2">
			<div class="jumbotron">

		</div>
	</div>
</div>

  </body>
</html>
