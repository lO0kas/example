<?php $clankySubory = glob('*.txt'); ?>        
<section class="container">
<h2 class="py-3 text-center"> Správy zo sveta </h2>
<h6 class="text-center pt-0"><?php echo date('d. n. Y H:i') ?></h6>
</section>


<section class="container">

<?php 
foreach($clankySubory as $subor){
    $clanok = file($subor, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
    $datum = strtotime(basename($subor, ".txt"));
    $datumtxt = date("j/n/Y H:m", $datum);
echo'

<div>
    <h5>'.$clanok[0] .'</h5>

    <small>Publikované: '.$datumtxt.'</small>
    </br>
    <img src="images/'.$clanok[1].'" alt="" width=300>
    <p> 
    '.$clanok[2].'
    </p>
    <br>
</div>
';
}
?>
</section>