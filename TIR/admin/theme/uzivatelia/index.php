<?php include '../../assets/hlavicka.php' ?>
<?php include '../../assets/sidemenu.php' ?>
<div class="w-50 p-3 col-xs-6">
    <!-- CONTENT -->
    <h1>Užívatelia</h1>
    
    <?php
        if($_SESSION["post"] == "admin"){
        $riadkysuboru = file('../admin/users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        echo '<table style="width:100%; border: 1px solid black; border-collapse: collapse;"><tr style="border: 1px solid black; border-collapse: collapse;"><th style="border: 1px solid black; border-collapse: collapse;">Používatelské meno</th><th style="border: 1px solid black; border-collapse: collapse;">Rola</th><th style="border: 0px solid black; border-collapse: collapse;"></th></tr>';
        foreach ($riadkysuboru as $riadok)
        {
            list($name, $password, $post) = explode('::', $riadok);
            echo '<tr style="border: 1px solid black; border-collapse: collapse;"><th style="border: 1px solid black; border-collapse: collapse; font-weight: normal;">' . $name . '</th><th style="border: 1px solid black; border-collapse: collapse; font-weight: normal;">' . $post . '</th><th style="border: 1px solid black; border-collapse: collapse; font-weight: normal;">' . '<a href= "edit.php?username= '. $name . '#" style = "color: red;">Edit</a>' . '</th></tr>';
            }
            echo '</table>';
            echo '<a href="adduser.php" style="color: lime; float: right;">Add new user</a>';
        }else{
            echo '<p style="color: red;">Na toto nemáš oprávnenie</p>';
        }
    ?>
</div>
</div>
<?php include '../../assets/paticka.php' ?>