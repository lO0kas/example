<<?php 

    function kontrola($vstup)
    {
        $vstup trim($vstup);
        $vstup htmlspecialchars($vstup);
        return $vstup;
    }


    date_default_timezone_set("Europe/Bratislava");
    if($_POST['overenie']== $_POST['spravnaodpoved'])
    {
        $suborPrispevky = fopen("prispevky.csv", "a");
        $novyclanok [] = $_GET['pocet'] + 1;
        $novyclanok [] = kontrola($_POST['meno']);
        $novyclanok [] = kontrola($_POST['sprava']);
        $novyclanok [] = date('Y-m-d H:i:s', time());
        fputcsv($suborPrispevky,$novyclanok,';');
        fclose($suborPrispevky);
    }
    header("Location:index.php?success=true");

 ?>