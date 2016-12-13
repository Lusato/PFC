
<!DOCTYPE html>
<html>
    <head>
    </head>
        <body>
            <?php
                $conexao = mysqli_connect("localhost", "root", "", "pfc");
                if ($conexao == false)
               {
                $erro = mysqli_connect_error();
                echo("<h1>$erro</h1>");
               }
            ?>
        </body>
</html>

    
