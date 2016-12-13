<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Power Software</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
					
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Buscar">
						</div> 
						<button type="submit" class="btn btn-default">
							Pesquisar
						</button>
					</form>
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
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec molestie neque quis augue vehicula, at aliquam ante.
				</p>
					<div class="post-content">
						<img src="img/redes.jpg">
					</div>
				<p>
					<a class="btn" href="materias.php">Mais detalhes »</a>
				</p>
			</div>
		</div>
		<div class="col-md-8">
			<div class="jumbotron">
				<h2>
					
					</br>
					<?php
					$conexao = mysqli_connect("localhost", "root", "", "prfc");	
					
					session_start();
							
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
					echo ("<a href='conf.php'>Para alterar suas informações clique aqui</a>");
					$_SESSION['conf_email'] = $_SESSION['email'];

                }
                
            }
        
 ?>
				</h2>				
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
				<p>
					<a class="btn" href="materias.php">Mais detalhes »</a>
				</p>
		</div>
	</div>
</div>

  </body>
</html>
