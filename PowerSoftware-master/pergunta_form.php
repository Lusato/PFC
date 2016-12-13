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
			<h2>Alterações</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		
		</div>
		<div class="col-md-6">
		<?php require_once("conexao.php") ?>

<div class="jumbotron">
    <?php

    if ($_GET["id"] == "0") {
        $operacao = "inclusao";
    }
    else{
        $operacao = "alteracao";
    }

    if ($operacao == "inclusao") {
        $id_pergunta = "";
        $CONTEUDO = "";
        $id_user_fk= "";
        $ATIVIDADE_pergunta = "";
        echo "<h2>Usuários : Inclusão</h2>";
        echo "<form action='pergunta_processa.php?cmd=ins' method='post'>";
    }
    else {
        $id = $_GET["id"];
        echo "<h2>Perguntas do Fórum : Alteração</h2>";
        echo "<form action='pergunta_processa.php?cmd=upd' method='post'>";
        require("conexao.php");
        $sql = "select * from pergunta
                   where id_pergunta = '".$id."';";
        $resultado = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_array($resultado)) {
            $CONTEUDO = $linha["conteudo_pergunta"];
            $id_pergunta = $linha["id_pergunta"];
            $ATIVIDADE_PERGUNTA = $linha["atividade_pergunta"];
            $id_user_fk = $linha["id_user_fk"];
        }
    }
    ?>

            <div class="form-group" id="texto">
                <label for="inputID">Id_Pergunta</label>
                <div class="input-group"id="texto">
                    <span class="input-group-addon"><span ></span></span>
                    <input type="text" class="form-control"  name="id_pergunta" placeholder="id" value="<?php echo $id_pergunta; ?>">
                </div>
            </div>
            <div class="form-group"id="texto">
                <label for="inputNome">Conteudo da Pergunta</label>
                <div class="input-group" id="texto">
                    <span class="input-group-addon"><span ></span></span>
                    <input type="text" class="form-control"  name="conteudo" placeholder="conteudo" value="<?php echo $CONTEUDO; ?>">
                </div>
            </div>
            <div class="form-group" id="texto">
                <label for="inputTipo_user_fk">Atividade Pergunta</label>
                <div class="input-group">
                    <span class="input-group-addon"><span ></span></span>
                    <input type="text" class="form-control"  name="atividade_pergunta" placeholder="Atividade" value="<?php echo $ATIVIDADE_PERGUNTA; ?>">
                </div>
            </div>
           <div class="form-group" id="texto">
                <label for="inputTipo_user_fk">Id_User_fk</label>
                <div class="input-group">
                    <span class="input-group-addon"><span ></span></span>
                    <input type="text" class="form-control"  name="id_user_fk" placeholder="id_user_fk" value="<?php echo $id_user_fk; ?>">
                </div>
            </div>
                        <input type="submit" class="btn btn-primary btn-large" value="Salvar"/>
                </div>
            </div>
        </div>
    </form>
</div>

		<div class="col-md-3">
			
		</div>
</div>
  </body>
</html>
