<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

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
									<a href="cadastro.php">Cadastro</a>
								</li>
							</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="active">
							<a href="login.html">Login</a>
						</li>
				</div>	
			</nav>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="processar_login.php" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="***********" required>
                </div>

				<button type="submit" class="btn">Entrar</button></br>
				<a href="rec_senha.php">Esqueceu sua senha?</a>
                </form>
                </div>             
			</div>
			
		</div>
		<div class="col-md-4"></div>
		
		<div class="row">
			<div class="col-md-12" id="espaco1">
			</div>
		</div>
</div>
  </body>
</html>
