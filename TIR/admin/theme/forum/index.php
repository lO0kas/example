<?php 
    include '../../assets/hlavicka.php';
    include '../../assets/sidemenu.php';
    $articles = getArticles();
?>
<div class="w-75 p-3 col-xs-6">
    <?php
        foreach($articles as $article){
            echo '
                <div>
                <h2>'.$article['meno'].'</h2>
                <p>'.$article['prispevok'].'</p>
                <p>'.$article['cas'].'</p>
                </div>';
        }
    ?>

</div>
</div>
<?php include '../../assets/paticka.php' ?>