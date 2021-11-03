<?php   include '../../assets/hlavicka.php';?>

<?php $clanky = file('clanky.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES ); ?> 

<section class="container">

<?php

foreach ($clanky as $clanok)
{
    list($nadpis, $obrazok, $text) = explode('::', $clanok);
    echo '

        <div>

        <h3>' . $nadpis . '</h3>
        <img src="obrazky/' . $obrazok . '" alt="">
        <p>' . $text . '</p>
        </div>

        ';
}
?>

</section>



<?php include '../../assets/paticka.php' ?>
