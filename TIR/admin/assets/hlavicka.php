<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title></title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="D:/wamp64/www/tir/index.php">SSTV Tvrdošín - Admin</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <?php
date_default_timezone_set("Europe/Bratislava");
$stranka = basename(dirname($_SERVER['SCRIPT_NAME']));

$riadkysuboru = file('../../assets/menu.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($riadkysuboru as $riadok)
{
    list($k, $h) = explode('::', $riadok);
    $menu[$k] = $h;
}
foreach ($menu as $odkaz => $hodnota)
{
    echo '
      <a class="nav-item nav-link ' . ($odkaz == $stranka ? "" : "") . ' " href="../../../public/theme/' . $odkaz . '">' . $hodnota . '</a>
      ';

}

?>
        </ul>
    </div>
</nav>
<div class="container">