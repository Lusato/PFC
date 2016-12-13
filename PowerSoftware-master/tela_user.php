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
							</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="logout.php">Sair</a>
						</li>
				</div>	
			</nav>
			
			<div class="jumbotron" id="texto">
			<h2>Perfil</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<div class="jumbotron">
				<h4>
					Matérias
				</h4>
				<?php 
					require_once("conexao.php");
					$resultadoPost = mysqli_query($conexao, "SELECT * FROM post ORDER BY id_post DESC LIMIT 3");
					while ($row = mysqli_fetch_array($resultadoPost, MYSQL_ASSOC)){
							$sqlUser = mysqli_query($conexao, 'SELECT * FROM user WHERE id_user = '.$row["id_user_fk"]);
							while ($rowUser = mysqli_fetch_array($sqlUser, MYSQL_ASSOC))
							{
								echo("<div class='panel panel-primary'>");
								echo ("<div class='panel-heading'><a href='verMateria.php?id_materia=".$row['id_post']."'>".$row['nome_post']." <div style='text-align: right;'>Por ".$rowUser['nome']."</div></div></a> <br>");
								echo("</div>");
							}
						}
					?>
			</div>
		</div>
		<div class="col-md-8">
			<div class="jumbotron">					
					</br>
					<?php
					session_start();
					
					require_once("conexao.php");
				if(!isset($_SESSION['email'])){
					echo("<p>Erro ao reconhecer o email.</p>");
				}
				$user_email = $_SESSION['email'];
				
				
				$comando = $conexao -> query("select * from user where email= '$user_email'");
				 if ($comando == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                $usuarios = mysqli_num_rows($comando);
                if($usuarios == 1){
					while ($row = mysqli_fetch_assoc($comando)) {
						$user_nome = $row["nome"];
						$_SESSION['nome'] = $user_nome;
					}
					echo ("<h2>Olá $user_nome </h2>\n<br> ");
					echo("<div class='fir'>
					<form action='processar_forum.php' id='confirmationForm' method='post'>
					<h4 class='f'>Digite sua pergunta abaixo para ser publicada:</h4></br>
					<textarea name='per' rows='10' cols='40' form='confirmationForm'></textarea></br>
					<input type='submit' class='btn btn-default'/>
            </form></br>
            </div>");
			
			echo("<hr>");
					require_once("conexao.php");
					$consultaPergunta = mysqli_query($conexao, "SELECT * FROM pergunta where id_user_fk = ".$_SESSION['id']);
					if (!$consultaPergunta) {
						$erro = mysqli_error($conexao);
						//header("location:erro.php?erro=$erro");
						echo("$erro");
					}
					else 
					{   
						echo("<div class='panel panel-primary'><h3 style='color:blue;'>Suas Perguntas</h3>");
						while ($row = mysqli_fetch_array($consultaPergunta, MYSQL_ASSOC)){
							$sqlUser = mysqli_query($conexao, 'SELECT * FROM user WHERE id_user = '.$_SESSION["id"]);
							while ($rowUser = mysqli_fetch_array($sqlUser, MYSQL_ASSOC))
							{
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
								$sqlRespostas = mysqli_query($conexao, 'SELECT count(distinct(id_resposta)), id_pergunta  FROM resposta, pergunta WHERE id_pergunta = id_pergunta_fk AND id_pergunta_fk = '.$row["id_pergunta"]);
								while ($rowResposta = mysqli_fetch_array($sqlRespostas, MYSQL_ASSOC))
								{
									echo("<div  class='panel-footer'><a href='respostas.php?id_pergunta=".$rowResposta['id_pergunta']."' style='blue'>Veja as ".$rowResposta['count(distinct(id_resposta))']." respostas</a></div>");
								}
							}
						}
					}
					echo ("</div><a href='conf.php' style='blue'>Para alterar suas informações clique aqui</a>");
					
					$_SESSION['conf_email'] = $_SESSION['email'];

                }
                
            }
        
 ?>
			</div>
		</div>
		<div class="col-md-2">
			<div class="jumbotron">
				<h4>
					Propaganda
					
				</h4>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec molestie neque quis augue vehicula, at aliquam ante.
				</p>
				<div class="post-content">
						<img src="img/17.jpg">
				</div>

		</div>
	</div>
</div>

  </body>
</html>
