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
								<li class="divider">
								</li>
								<li>
							<?php
							session_start();
							require_once("functions.php");
							if(isset($_SESSION['email'])){
									echo("<p></p>");
								}else
								{
									echo("<a href='cadastro.php'>Cadastro</a>");
								}
							if(isset($_GET['page']))
							{
								$page = $_GET['page'];
							}
							else
							{
								$page = 1;
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
					Fique atulizado leia nossas materias.
				</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<div class="jumbotron">
				
				
			</div>
		</div>
		<div class="col-md-8">
			<div class="jumbotron">
				<?php
					require_once("conexao.php");
					
					$countPosts = mysqli_query($conexao, "SELECT COUNT(id_post) FROM post");
					if(!$countPosts)
					{
						echo(mysqli_errno($conexao));
					}
					else
					{
						while ($rowCount = mysqli_fetch_array($countPosts, MYSQL_ASSOC))
							{
								$tot_rows = $rowCount["COUNT(id_post)"];
								$pp = 3;
								$curr_page = $page;
								$paging_info = get_paging_info($tot_rows,$pp,$curr_page);								
							}
							
					}
					$offset = $pp *($page - 1);
					$resultadoPost = mysqli_query($conexao, "SELECT * FROM post ORDER BY id_post DESC LIMIT 3 OFFSET $offset");
					if (!$resultadoPost) {
						$erro = mysqli_errno($conexao);
						//header("location:erro.php?erro=$erro");
						echo("FAIL");
					}
					else 
					{   
				
				
								echo("</div>");
						if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == 1)
							{
								echo("<div class='jumbotron'>");
							
								echo("<div class='fir'>
								<form action='processar_post.php' id='enviarPost' method='post'>
								<h4 class='f'>Digite o post abaixo para ser publicada:</h4></br>
								<input type='hidden' name='user_id' value='".$_SESSION['id']."'>
								<input type='text' name='title' placeholder='titulo'>
								");
								//include("textToolbox\demo_small.html");
								?>
								<script language="Javascript" src="textToolbox\jquery-1.3.2.min.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\htmlbox.colors.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\htmlbox.styles.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\htmlbox.syntax.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\xhtml.js" type="text/javascript"></script>
								<script language="Javascript" src="textToolbox\htmlbox.min.js" type="text/javascript"></script>
								
								<textarea name="conteudo_post" id='ha' form='enviarPost' ></textarea>
								
								<script language="Javascript" type="text/javascript">
$("#ha").css("height","100%").css("width","100%").htmlbox({
    toolbars:[
	    [
		// Undo, Redo
		"separator","undo","redo",
		// Bold, Italic, Underline, Strikethrough, Sup, Sub
		"separator","bold","italic","underline","strike","sup","sub",
		// Left, Right, Center, Justify
		"separator","justify","left","center","right",
		// Ordered List, Unordered List, Indent, Outdent
		"separator","ol","ul","indent","outdent",
		// Hyperlink, Remove Hyperlink, Image
		"separator","link","unlink","image"
		
		],
		[// Show code
		"separator","code",
        // Formats, Font size, Font family, Font color, Font, Background
        "separator","formats","fontsize","fontfamily",
		"separator","fontcolor","highlight",
		],
		[
		//Strip tags
		"separator","removeformat","striptags","hr","paragraph",
		// Styles, Source code syntax buttons
		"separator","quote","styles","syntax"
		]
	],
	skin:"blue"
});

</script>
<input type='submit' class='btn btn-default' />
</form></br>
								</div>
							<?php
							
							echo("</div>");	
							}
						while ($row = mysqli_fetch_array($resultadoPost, MYSQL_ASSOC)){
							$sqlUser = mysqli_query($conexao, 'SELECT * FROM user WHERE id_user = '.$row["id_user_fk"]);
							while ($rowUser = mysqli_fetch_array($sqlUser, MYSQL_ASSOC))
							{
								echo("<div class='panel panel-primary'>");
								echo ("<div class='panel-heading'>".$row['nome_post']." <div  style='text-align: right;'><sub>Por ".$rowUser['nome']."</sub></div></div> <div class='panel-body'>".$row['conteudo_post']."</div><br>");
								echo("</div>");
							}
						}
						
						?>
						<div id='rodape'>
						<p><a href="materias.php?page=<?php echo($page - 1) ?>">Anterior!</a> <a href="materias.php?page=<?php echo($page + 1) ?>">Proximo!</a></p>
						</div>
						<?php
					}
						
						
					?>
				
			</div>
		<div class="col-md-2">
		
		</div>
		
	</div>
</div>

  </body>
</html>
