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
			<script language="Javascript">
    function confirma(id) {
        if (confirm("Deseja remover esse item?"))
        alert(id);
            window.location.href = "pergunta_processa.php?cmd=del&id="+id;
    }
</script>

<div class="jumbotron">
    <h2>Perguntas</h2>
    <table class="table table-condensed">
        <tr class="success">
            <td></td>
            <td class="success">Id_Pergunta</td>
            <td class="success">Conteudo_Pergunta</td>
            <td class="success">Id_User_fk</td>
            <td class="success">Atividade_pergunta</td>

        </tr>
        <?php
        require_once("conexao.php");

        $resultado = mysqli_query($conexao, "select id_pergunta,conteudo_pergunta,id_user_fk,atividade_pergunta from pergunta");

        while ($linha = mysqli_fetch_array($resultado)) {
            echo "<tr class='active'>
                <td class='active'>
                    <a href='pergunta_form.php?id=" .$linha["id_pergunta"]."'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
                    
                </td>
                <td class='active'>".$linha["id_pergunta"]."</td>
                <td class='active'>".$linha["conteudo_pergunta"]."</td>
                <td class='active'>".$linha["id_user_fk"]."</td>
                <td class='active'>".$linha["atividade_pergunta"]."</td>
              </tr>";
              
        }
        ?>
    </table>
			
</div>

  </body>
</html>
