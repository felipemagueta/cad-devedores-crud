<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Devedores</title>

    <?php define('URLBASE', 'http://localhost/devedores/'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=URLBASE?>/assets/css/custom.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">

</head>

<body>

    <?php 
    require_once('./lib/application.php');
    require_once('./layouts/menu.php');
    ?>

    <?php
    try { 
        $app = new Application();
        $app->load();
    } catch (\Throwable $th) {
        throw $th;
    }
    ?> 


    <?php require_once('./layouts/rodape.php');?>

</body>

</html>