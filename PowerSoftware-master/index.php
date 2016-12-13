<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Power Software</title>
        <meta name="author" content="Lucas Torre & Jumper Luko (jumper.luko@gmail.com)">
        <meta name="description" content="Paleta feita por Jumper Luko">
        <link rel="icon" type="image/png" href="img/icon.png">
        <meta name='language' content='PT-BR'/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/meucss.css" rel="stylesheet">
        <link href="css/responsive_minimal.css" rel="stylesheet">
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
                    </button>
                    <a class="navbar-brand" href="index.php">Power Software</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <ul class="nav navbar-nav">
                        <li><a href="download.php">Download</a></li>
                    </ul>
                    <li><a href="materias.php">Matérias</a></li>
                    <li><a href="forum.php">Fórum</a></li>
                    <li class="divider"></li>
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
                <div class="nav navbar-nav navbar-right">
                    <li>
                        <?php
                        function debug_to_console( $data ) {

							if ( is_array( $data ) )
								$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
							else
								$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

							echo $output;
						}
                        
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron" id="texto">
                <div class="content2">
                    <h2>Bem vindo ao Power Software</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="jumbotron">
                <h2><div class="title center" style="margin-top: -16.5px;margin-left: -46.565px;">Matérias</div></h2>
                <div class="content">
					
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
        </div>
        <div class="col-md-4">
            <div class="jumbotron">
                <h2><div class="title center" style="margin-top: -16.5px;margin-left: -57.19px;">Fórum</div></h2>
                <div class="content">
                    <?php
				require_once("conexao.php");
					$consultaPergunta = mysqli_query($conexao, "SELECT conteudo_pergunta, id_pergunta, id_user_fk FROM pergunta ORDER BY id_pergunta DESC LIMIT 5");
					if (!$consultaPergunta) {
						$erro = mysqli_error($conexao);
						//header("location:erro.php?erro=$erro");
						echo("$erro");
					}
					else 
					{   
						while ($row = mysqli_fetch_array($consultaPergunta, MYSQL_ASSOC)){
							$sqlUser = mysqli_query($conexao, 'SELECT * FROM user WHERE id_user = '.$row["id_user_fk"]);
							while ($rowUser = mysqli_fetch_array($sqlUser, MYSQL_ASSOC))
							{
								echo("<div class='jumbotron'>");
								echo ("<div  style='background-color:#A52A2A;'><p>Pergunta de ".$rowUser["nome"]."</p></div> <br> <p>".$row['conteudo_pergunta']."</p>");
								$sqlRespostas = mysqli_query($conexao, 'SELECT count(distinct(id_resposta)), id_pergunta  FROM resposta, pergunta WHERE id_pergunta = id_pergunta_fk AND id_pergunta_fk = '.$row["id_pergunta"]);
								while ($rowResposta = mysqli_fetch_array($sqlRespostas, MYSQL_ASSOC))
								{
									echo("<a href='respostas.php?id_pergunta=".$rowResposta['id_pergunta']."'>Veja as ".$rowResposta['count(distinct(id_resposta))']." respostas</a>");
								}
								echo("</div>");
							}
						}
					}
				?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="jumbotron">
                <h2><div class="title center" style="margin-top: -16.5px;margin-left: -67.71px;">Propaganda</div></h2>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec molestie neque quis augue vehicula, at aliquam ante.</p>
                    <div class="post-content">
                        <img src="img/South park.jpg">
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</php>
