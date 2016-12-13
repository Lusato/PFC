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
			
			
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<form action="processar_cadastro_adm.php" method="post">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>               
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                </div>   
                <input type="submit" class="btn btn-default"/>
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
