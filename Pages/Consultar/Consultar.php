<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="./consultar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Aelia Resende</title>
</head>
<body>
    <header>
        <img src="../../assets/logo.png">
    </header>
    <div class="container">
        <div class="filter">
            <form action="" method="POST">
                <input type="date" class="date-filter"><submit class="submit-filter">filtrar</submit>
            </form>
        </div>
        <div class="info">
            <div class="carrossel">
                <?php 
                    require_once __DIR__ ."/../../actions/action_Consultar.php";
                    $dados = new action_Consultar();
                    $result = $dados->ListarAgendamentos();
                    foreach($result as $agenda):
                        echo "<div class='item'>";
                        echo "<input type='checkbox'class='check'><button class='button_agenda' >".$agenda->getNome_cliente()."</button>";
                        echo "</div>";
                    endforeach;
                ?>
            </div>
        </div>
        <a href="/Pages/Home Page/HomePage.html">Voltar ao inicio</a>
    </div>
</body>
</html>