<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro</title>

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
				if(isset($_SESSION['nome'])== TRUE){
						echo("<p></p>");
					}else{
						echo("<a href='cadastro.php'>Cadastro</a>");
						}
						?>
								</li>
							</ul>
						
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Busca">
						</div> 
						<button type="submit" class="btn btn-default">
							Pesquisar
						</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<?php
							
				if(isset($_SESSION['nome'])== TRUE){
						echo("<a href='tela_user.php'>User</a>");
					}else{
						echo("<a href='login.php'>Login</a>");
						}
						?>
						</li>
				</div>	
			</nav>
			
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<form action="processar_rec_senha.php" method="post">       
                <div class="form-group">
				<label>Digite aqui sua pergunta secreta</label>
                <input type="text" class="form-control" name="pergunta" placeholder="Digite aqui sua pergunta">
                </div>
                <div class="form-group">
				<label>Digite aqui sua resposta secreta</label>
                <input type="text" class="form-control" name="resposta" placeholder="Digite aqui sua resposta">
                </div>                     
                <input type="submit" class="btn btn-default"/>
                
                <h4 class="h">Pergunta ou Resposta não confere.</h4>
            </form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" id="espaco">
				</div>
			</div>
</div>

  </body>
</php>
