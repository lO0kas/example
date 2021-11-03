<?php include '../../assets/hlavicka.php' ?>
<?php include '../../assets/sidemenu.php' ?>
<div class="w-75 p-3 col-xs-6">
    <!-- CONTENT -->
    <h1>Post</h1>
    <?php
    if($_SESSION["post"] == "admin"){
            $username = $_POST['username'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $rola = $_POST['rola'];
            $canbechanget = TRUE;
            $riadkysuboru = file('../admin/users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $subor = fopen('../admin/users.txt', 'a+');
            
            if($password1 == $password2){
                foreach($riadkysuboru as $riadok){
                    list($name, $password, $post) = explode('::', $riadok);
                    if($username != $name){
                        $canbechanget = TRUE;
                    }else{
                        $canbechanget = FALSE;
                    }
                }
                if($canbechanget == TRUE){
                    //echo $username . '<br>' . $password1 . '<br>' . $password2 . '<br>' . $rola;
                    $data = $username . '::' . $password1 . '::' . $rola;
                    fwrite($subor, "\n".$data);
                    fclose($subor);
                    header('Location: index.php');
                    die();
                }else{
                    echo '<p style="color: red;">Toto meno sa už používa</p>';
                }
                
            }else{
                echo '<p style="color: red;">Heslá sa nezhodujú';
            }
        }else{
            echo '<p style="color: red;">Na toto nemáš oprávnenie</p>';
        }
        ?>
</div>
</div>
<?php include '../../assets/paticka.php' ?>