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
                        <li >
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
                if(isset($_SESSION['email'])){
                        echo("<p></p>");
                    }else{
                        echo("<a href='cadastro.php'>Cadastro</a>");
                        }
                        ?>
                                </li>
                            </ul>
                        
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <?php       
                                    
                                    if(isset($_SESSION['senha'])== TRUE){
                                        
                                        if($_SESSION['user_type']==1){
                                            echo("<a href='tela_user_adm.php'>User</a>");
                                        
                                        }else{
                                        echo("<a href='tela_user.php'>User</a>");
                                    }
                                    }else{
                                        echo("<a href='login.php'>Login</a>");
                                    }
                                    
                                    ?>
                                </li>
                                <li>
                                <?php
                                    if(isset($_SESSION['email']) == TRUE){
                                        echo("<a href='logout.php'>Sair</a>");
                                    }
                                ?>
                        </li>
                </div>  
            </nav>
            
            <div class="jumbotron" id="texto">
                <h2>
                    Baixe nossos Tutoriais <h5>(Obs: Somente usuários cadastrados podem fazer download.)</h5>
                </h2>
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
                <h2>
                    Tutoriais
                </h2>
                <?php
                if(isset($_SESSION['user_type']) ){
					if($_SESSION['user_type']==1){
				echo("<form name='form' method='post' action='salvar_download.php' enctype='multipart/form-data'>
					<label>Nome do arquivo:</label>
					<input type='text' class='form-control' name='nome_arquivo' placeholder='Nome do arquivo'>
					<label> Selecione o arquivo PDF: </label>
					<input type='file' name='pdf' id='pdf' /><br />
					<input type='submit' name='envia' value='Enviar' />
					</form>");
					$sqlArquivo = "select * from arquivo;";
					$resultadoArquivo = mysqli_query($conexao, $sqlArquivo);
					if($resultadoArquivo == false){
						echo(mysqli_error($conexao));
					}else{
							while ($rowArquivo = mysqli_fetch_array($resultadoArquivo, MYSQL_ASSOC)){
								
								echo("<h3>"."<br><a href='documentos/".$rowArquivo['arquivo_download']."'<label>Nome do arquivo: </label>"."<div  style='color:#A52A2A;'>".$rowArquivo['nome_arquivo']."</div>"."</a>"."</h3>");
							}
						}
				}else{
					$sqlArquivo = "select * from arquivo;";
					$resultadoArquivo = mysqli_query($conexao, $sqlArquivo);
					if($resultadoArquivo == false){
						echo(mysqli_error($conexao));
					}else{
							while ($rowArquivo = mysqli_fetch_array($resultadoArquivo, MYSQL_ASSOC)){
								
								echo("<h3>"."<br><a href='documentos/".$rowArquivo['arquivo_download']."'<label>Nome do arquivo: </label>"."<div  style='color:#A52A2A;'>".$rowArquivo['nome_arquivo']."</div>"."</a>"."</h3>");
							}
						}
				}
			}else{
					$resultado = mysqli_query($conexao, "select nome_arquivo from arquivo");

        while ($linha = mysqli_fetch_array($resultado)) {
            echo("<div id='texto'>"."<h3>"."<li>".$linha['nome_arquivo']."</li>"."</h3>"."</div>");
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec molestie neque quis augue vehicula, at aliquam ante.</p>
                    <div class="post-content">
                        <img src="img/South park.jpg">
                    </div>
        </div>
    </div>
</div>

  </body>
</php>
