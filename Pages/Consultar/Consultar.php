<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="./consultar.css">
    <title>Aelia Resende</title>
</head>
<body>
    <header>
        <img src="../../assets/logo.png">
    </header>
    <div class="container">
        <div class="info">
            <div class="carrossel">
            <?php 
                require_once __DIR__ ."/../../actions/action_Consultar.php";
                $dados = new action_Consultar();
                $result = $dados->ListarAgendamentos();
                foreach($result as $agenda): ?>
                <div class="item">
                    <h3><?php echo $agenda->nome; ?></h3>
                    <p><?php echo $agenda['data_agendamento']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>





            ?>
        </div>
    </div>
</body>
</html>