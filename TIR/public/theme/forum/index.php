<?php include '../../assets/hlavicka.php' ?>

<?php 

    const FLASH_SUCCESS = 'success';
    $_SESSION['flash'] = "Hello, world!";
    function kontrola($vstup)
    {
        //$vstup trim($vstup);
        //$vstup htmlspecialchars($vstup);
        return $vstup;
    }

    if($_SERVER['REQUEST_METHOD']== "POST"){

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
   
    header("Location:index.php");   
     
    }
    if(empty($_GET)){
        $success = "false";
    }else{
        $success = $_GET['success'];
    }
    if($success = "true"){
        echo '<div class="alert alert-success" role="alert">
        Správa bola odoslaná
      </div>';
    }
    
    ?>
    
 

<section class="container pt-3">
<h2 class="py-3 text-center">Fórum</h2>
<div>
<?php 
    $antiSpam = array();
    $prispevky = array();
    $suborCaptcha = file("captcha.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    for($i=0;$i < count($suborCaptcha);$i+=2)
        $antiSpam[str_replace('odpoved: ','', $suborCaptcha[$i+1])]= str_replace('otazka: ','', $suborCaptcha[$i]);;

    $antiSpamKluc = array_rand($antiSpam); 
    $suborPrispevky = fopen("prispevky.csv", "r");

    while ($prispevok = fgetcsv($suborPrispevky, 1000, ';')) {
        $prispevky[] = $prispevok;
    }

    fclose($suborPrispevky);
    $prispevky = array_reverse($prispevky);

    ?>
    <form class="was-validated" action="?pocet=<?php  echo count($prispevky) ?>" method="post">
        <div class="form-group">
        <label for=""><b> Meno*</b></label>
          <input type="text" class="form-control" name="meno" id="1" pattern="[A-Za-z0-9]{4,16}" aria-describedby="helpId" placeholder="Zadaj meno" required>

        </div>
        <div class="form-group">
        <label for="">Správa</label>
        <textarea class="form-control" name="sprava" id="2" rows="3" pattern="[].{6,}" placeholder="Text správy" required ></textarea>
        </div>
        
        

<?php
    echo '<br> Antispam: '. $antiSpam[$antiSpamKluc];
    ?>
    <div class="form-group">
    <input type="text" class="form-control" name="overenie" id="3" pattern="<?php echo trim($antiSpamKluc) ?>" aria-describedby="helpId" placeholder="Overenie" required>
    <input type="hidden" name="spravnaodpoved" value="<?php echo trim($antiSpamKluc) ?>">
        <button type="submit" class="btn btn-primary float-right">Odoslať</button>
    </div>
    </div>
         
     </form>
<?php
    foreach($prispevky as $prispevok){

        echo  ' <h4>' . $prispevok[1].  '</h4> ';
        $datum = strtotime($prispevok[3]);
        $formatdatum = date("Y-m-d H:i:s", $datum);
        echo '<small>Odoslané: ' . $formatdatum . '</small> <br>';
        echo '<p>'. $prispevok[2]. '</p><hr>';
    }
    
 ?>
</div>
</section>

<?php include '../../assets/paticka.php' ?>