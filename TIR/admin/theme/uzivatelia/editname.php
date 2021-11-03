<?php include '../../assets/hlavicka.php' ?>
<?php include '../../assets/sidemenu.php' ?>
<div class="w-75 p-3 col-xs-6">
    <!-- CONTENT -->
    <?php
        function deleteLineInFile($file,$string)
        {
            $i=0;$array=array();
            
            $read = fopen($file, "r") or die("can't open the file");
            while(!feof($read)) {
                $array[$i] = fgets($read);	
                ++$i;
            }
            fclose($read);
            
            $write = fopen($file, "w") or die("can't open the file");
            foreach($array as $a) {
                if(!strstr($a,$string)) fwrite($write,$a);
            }
            fclose($write);
        }
        
        if($_SESSION["post"] == "admin"){
            $canbechanget = TRUE;
            $riadkysuboru = file('../admin/users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $subor = fopen('../admin/users.txt', 'a+');
            $newname = $_POST['username'];
            foreach($riadkysuboru as $riadok){
                list($name, $password, $post) = explode('::', $riadok);
                if($newname != $name){
                    $canbechanget = TRUE;
                }else{
                    $canbechanget = FALSE;
                }
            }
            if($canbechanget == TRUE){
                foreach($riadkysuboru as $riadok){
                    list($name2, $password, $post) = explode('::', $riadok);
                    if($name == $name2){
                        $data = $newname . '::' . $password . '::' . $post;
                        deleteLineInFile('../admin/users.txt', $riadok);
                        fwrite($subor, "\n".$data);
                        header('Location: index.php');
                        die();
                    }
                }
            }else{
                echo '<p style="color: red;">Toto meno sa už používa</p>';
            }
        }else{
            echo '<p style="color: red;">Na toto nemáš oprávnenie</p>';
        }
    ?>
</div>
</div>
<?php include '../../assets/paticka.php' ?>