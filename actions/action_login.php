<?php
    require_once __DIR__ . "/../classes/Administrador.php";
    require_once __DIR__ . "/../Controller/LoginController.php";
    
    $login =  $_POST["login"];
    $senha = $_POST["password"];
    $adm = new Administrador($login, $senha);
    $acao = new LoginController();
    $acao->Logar($adm);
?>
    