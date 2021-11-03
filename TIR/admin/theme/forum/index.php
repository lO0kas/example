<?php include '../../assets/hlavicka.php' ?>
<?php include '../../assets/sidemenu.php' ?>
<div class="w-75 p-3 col-xs-6">
    <?php
        $suborPrispevky = fopen("../../../public/theme/forum/prispevky.csv", "r");
        $prispevky = array();
        while ($prispevok = fgetcsv($suborPrispevky, 1000, ';')) {
            $prispevky[] = $prispevok;
        }
        if($_SESSION["post"] == "admin"){
            foreach($prispevky as $prispevok){
                echo  ' <h4>' . $prispevok[1].  '</h4> ';
                $datum = strtotime($prispevok[3]);
                $formatdatum = date("Y-m-d H:i:s", $datum);
                echo '<small>Odoslané: ' . $formatdatum . '</small> <br>';
                echo '<p>'. $prispevok[2]. '</p>';
                echo '<a href="delete.php?id='. $prispevok[0]. ';'.  $prispevok[1]. ';'. $prispevok[2]. '" style="color: red;">Delete</a>';
                echo '<hr>';
        }
        }else{
            foreach($prispevky as $prispevok){
                echo  ' <h4>' . $prispevok[1].  '</h4> ';
                $datum = strtotime($prispevok[3]);
                $formatdatum = date("Y-m-d H:i:s", $datum);
                echo '<small>Odoslané: ' . $formatdatum . '</small> <br>';
                echo '<p>'. $prispevok[2]. '</p>';
                echo '<hr>';
        }
        }
        
    ?>
</div>
</div>
<?php include '../../assets/paticka.php' ?>