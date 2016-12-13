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
								<li>
								<?php
								echo("<a href='cadastro_adm.php'>Cadastro de Administrador</a>");
								?>
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
					<form action='processar_materia.php' id='confirmationForm' method='post'>
					<h4 class='f'>Digite o nome da sua materia abaixo para ser publicada:</h4></br>
					<input type='text' name='nome' size='40%' /></br>
					<p></p>
					<h4 class='f'>Digite sua materia abaixo para ser publicada:</h4></br>
					<textarea name='mat' rows='10' cols='40' form='confirmationForm'></textarea></br>
					<input type='submit' class='btn btn-default'/>
            </form></br>
            </div>");
					echo ("<a href='conf.php'>Para alterar suas informações clique aqui</a>");
					$_SESSION['conf_email'] = $_SESSION['email'];
					$_SESSION['e'] = $_SESSION['email'];
					
					$seg_email = $_SESSION['conf_email'];
					$ter_email = $_SESSION['e'];
					
					$cons = $conexao -> query("select * from user where email= '$ter_email'");
				 if ($cons == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                $usua= mysqli_num_rows($cons);
                if($usua == 1){
					while ($row = mysqli_fetch_assoc($cons)) {
						$id = $row["id_user"];
						$_SESSION['id'] = $id;
					}
					}

                }
					
					$consu = $conexao -> query("select * from user where email= '$seg_email'");
				 if ($consu == false) {
                echo ("erro ao enviar comando para o banco de dados.");
                $erro = mysqli_error($conexao);
                echo($erro);
            }else{
                $usuarios = mysqli_num_rows($consu);
                if($usuarios == 1){
					while ($row = mysqli_fetch_assoc($consu)) {
						$tip_user = $row["tipo_user"];
						$_SESSION['tip'] = $tip_user;
					}
					}

                }

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
