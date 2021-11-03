<?php $clanky = file('clanky.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES ); ?> 

<section class="container">

<?php

foreach ($clanky as $clanok)
{
    list($nadpis, $obrazok, $text) = explode('::', $clanok);
    echo '

        <div>

        <h1>' . $nadpis . '</h1>
        <img src="domov/obrazky/' . $obrazok . '" alt="">
        <p>' . $text . '</p>
        </div>

        ';
}
?>

</section>


