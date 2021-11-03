<?php include '../../assets/hlavicka.php' ?>
<?php include '../../assets/sidemenu.php' ?>
<div class="w-75 p-3 col-xs-6">
    <!-- CONTENT -->
    <h1>Edit password</h1>
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
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $username = str_replace(' ', '', $_POST['username']);
            $riadkysuboru = file('../admin/users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $subor = fopen('../admin/users.txt', 'a+');
            if($password1 == $password2){       
                foreach($riadkysuboru as $riadok){
                    list($name, $password, $post) = explode('::', $riadok);
                    if($username == $name){
                        $data = $username . '::' . $password1 . '::' . $post;
                        deleteLineInFile('../admin/users.txt', $riadok);
                        fwrite($subor, "\n".$data);
                        header('Location: index.php');
                        die();
                    }
                    
                    
                }
            }else{
                echo '<p style="color: red;">Heslá sa nezhodujú</p><a href="index.php" style="color: red;">Naspäť</a>';
            }
         }else{
            echo '<p style="color: red;">Na toto nemáš oprávnenie</p>';
        }
    ?>
</div>
</div>
<?php include '../../assets/paticka.php' ?>