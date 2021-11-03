<?php include '../../assets/hlavicka.php' ?>
    <?php
    $string = $_GET['id'];
    if($_SESSION["post"] == "admin"){
        $file = fopen("../../../public/theme/forum/prispevky.csv", "r");
        $i=0;$array=array();
	
	$read = fopen("../../../public/theme/forum/prispevky.csv", "r") or die("can't open the file");
	while(!feof($read)) {
		$array[$i] = fgets($read);	
		++$i;
	}
	fclose($read);
	
	$write = fopen("../../../public/theme/forum/prispevky.csv", "w") or die("can't open the file");
	foreach($array as $a) {
		if(!strstr($a,$string)) fwrite($write,$a);
	}
	fclose($write);
    header('Location: index.php');
    die();

    }else{
            echo '<p style="color: red;">Na toto nemáš oprávnenie</p>';
        }
    ?>
<?php include '../../assets/paticka.php' ?>

<!-- https://github.com/yjajkiew/php-delete-line-in-file -->