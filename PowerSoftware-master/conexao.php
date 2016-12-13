
<!DOCTYPE html>
<html>
    <head>
    </head>
        <body>
            <?php
                $conexao = mysqli_connect("localhost", "root", "", "power");
                if ($conexao == false)
               {
				   $conexao = mysqli_connect("mysql.hostinger.com.br", "u371996956_admin", "123456", "u371996956_power");
                if ($conexao == false)
				   {
						$erro = mysqli_connect_error();
						//echo("<h1>$erro</h1>");
				   }
               }
            ?>
        </body>
</html>

    
