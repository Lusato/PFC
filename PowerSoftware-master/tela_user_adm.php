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
								</li>
								<li>
									<a href="alter_pergunta.php">Alterações de Perguntas</a>
								</li>
								<li>
									<a href="cadastro_adm.php">Cadastro de Administrador</a>
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
					require_once("conexao.php");
					
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
					
?>

<script language="Javascript">
    function confirma(id) {
        if (confirm("Deseja remover esse item?"))
        alert(id);
            window.location.href = "usuario_processa.php?cmd=del&id="+id;
    }
</script>

<div class="jumbotron">
    <h2>Usuários</h2>
    <table class="table table-condensed">
        <tr class="success">
            <td></td>
            <td class="success">Nome</td>
            <td class="success">Email</td>
            <td class="success">Tipo_user</td>
            <td class="success">Atividade_user_fk</td>
        </tr>
        <?php
        require_once("conexao.php");

        $resultado = mysqli_query($conexao, "select id_user,nome, email, tipo_user_fk, atividade_user_fk from user");

        while ($linha = mysqli_fetch_array($resultado)) {
            echo "<tr class='active'>
                <td class='active'>
                    <a href='usuario_form.php?id=" .$linha["id_user"]."'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
                    
                </td>
                <td class='active'>".$linha["nome"]."</td>
                <td class='active'>".$linha["email"]."</td>
                <td class='active'>".$linha["tipo_user_fk"]."</td>
                <td class='active'>".$linha["atividade_user_fk"]."</td>
              </tr>";
        }
        ?>
    </table>
</div>

					<?php
					require_once("conexao.php");
					$consultaPergunta = mysqli_query($conexao, "SELECT * FROM pergunta where id_user_fk = ".$_SESSION['id']);
					if (!$consultaPergunta) {
						$erro = mysqli_error($conexao);
						//header("location:erro.php?erro=$erro");
						echo("$erro");
					}
					else 
					{   
						
					}
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
						$tip_user = $row["tipo_user_fk"];
						$_SESSION['tip'] = $tip_user;
					}
					}

                }

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
