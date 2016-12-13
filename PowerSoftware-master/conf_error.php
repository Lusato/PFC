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
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="conf_senha.php" method="post">
                <div class="form-group">
                    <label>Digite sua senha atual</label>
                    <input type="password" class="form-control" name="pass" placeholder="***********" required>
                </div>
         <input type="submit" class="btn btn-default"/>
    </form>
    <h4 class="h">Senha incorreta</h4>
    </div>
    <div class="col-md-4"></div>
    </div>
  </body>
</php>
