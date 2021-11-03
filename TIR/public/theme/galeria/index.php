<?php   include '../../assets/hlavicka.php';?>

<?php   
        $clankySubory = glob('*.txt');
        if(!isset($_GET['galeria'])){
            $galeria = "athens";
        }else{
            $galeria = $_GET['galeria'];
        }
        $obsahAdresaraZlozky = glob('*', GLOB_ONLYDIR);
        $menuGaleria = array();
    foreach($obsahAdresaraZlozky as $menoAdresara){
        $menuGaleria[basename($menoAdresara)] =  file_get_contents($menoAdresara .'/'. basename($menoAdresara) . '.txt');
    }
 ?>

<section class="container">
    <div class="row">
    <div class="col-md-2">

<!-- <div class="row pt-5"> -->
<div class="col-3">
<nav class="nav flex-column nav-pills nav-fill">
<?php foreach($menuGaleria as $adresar => $nazov){
    echo '<a class="nav-link '.($adresar==$galeria?"active":"") . '" href="?galeria='.$adresar .'">'. $nazov .'</a>';
} ?>
</nav>
</div>
</div>
<!-- </div> -->

<div class="col-9">
<?php $popis = file_get_contents('' .$galeria .'/'. 'description.txt');
      $nadpis = file_get_contents('' .$galeria .'/'. 'header.txt') ; 
      $foto = '' .$galeria .'/'. 'thumb.jpg';
 ?>
<h2 class="py-3 text-center"><?php echo $nadpis ?></h2>

<div class="d-flex">

<img src="<?php echo $foto ?> " alt="">
<div><?php echo $popis ?></div>
</div>

<?php 
    $fotky = glob($obsahAdresaraZlozky[0]. "/*_zmensena.jpg");
    foreach($fotky as $fotka){
        echo '<img class="p-3" src="'.$fotka.'" alt="ateny" width="300px" >';
    }
 ?>

</div>
</div>
</section>

<?php include '../../assets/paticka.php' ?>