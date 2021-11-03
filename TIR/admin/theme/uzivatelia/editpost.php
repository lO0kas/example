<?php include '../../assets/hlavicka.php' ?>
<?php include '../../assets/sidemenu.php' ?>
<div class="w-75 p-3 col-xs-6">
    <!-- CONTENT -->
    <h1>Úprava role</h1>
    <?php
         if($_SESSION["post"] == "admin"){
             $novarola = $_POST['rola'];
             echo $novarola;
         }else{
            echo '<p style="color: red;">Na toto nemáš oprávnenie</p>';
        }
    ?>
</div>
</div>
<?php include '../../assets/paticka.php' ?>