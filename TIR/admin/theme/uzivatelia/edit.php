<?php include '../../assets/hlavicka.php' ?>
<?php include '../../assets/sidemenu.php' ?>
<div class="w-75 p-3 col-xs-6">
    <!-- CONTENT -->
    <?php
        if($_SESSION["post"] == "admin"){
            $username = $_GET["username"];
            echo '<h1>' . $username . ' - Edit</h1>';
            ?>
                <h2>Zmena použivatelského mena: </h2>
                <form action="editname.php" method="post">
                    <table style="width: 50%; border: 0px solid">
                        <tr style="border: 0px solid">
                            <th style="border: 0px solid; font-weight: normal;">
                                <label for="username">Nové meno: </label>
                            </th>
                            <th style="border: 0px solid"> 
                                <input type="text" id="username" name="username" pattern="[A-Z, a-z, 0-9].{4,16}" title="Meno musí byť v rozmedzí 5 - 16 znakov" required="required">
                            </th>
                        </tr>
                        <tr style="border: 0px solid">
                            <th style="border: 0px solid">
                                <input type="submit" value="Submit">
                            </th>
                            <th style="border: 0px solid">

                            </th>
                        </tr>
                    </table>
                    
                </form>
                <h2>Zmena hesla: </h2>
                <form action="editpassword.php" method="post">
                    <table style="width: 50%; border: 0px solid">
                        <tr style="border: 0px solid">
                            <td style="border: 0px solid">
                                <label for="password1">Nové heslo: </label>
                            </td>
                            <td style="border: 0px solid">
                                <input type="password" id="password1" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Heslo musí mať aspoň 8 znakou a musí obsahovať minimálne 1 velké písmeno, 1 malé písmeno a 1 číslo" required="required">
                            </td>
                        </tr>
                        <tr style="width: 50%; border: 0px solid">
                            <td style="border: 0px solid">
                                <label for="password2">Zopakuj nové heslo: </label>
                            </td>
                            <td style="border: 0px solid">
                                <input type="password" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Heslo musí mať aspoň 8 znakou a musí obsahovať minimálne 1 velké písmeno, 1 malé písmeno a 1 číslo" required="required">
                            </td>
                        </tr>
                        <tr style="border: 0px solid">
                            <td style="border: 0px solid">
                                <input type="submit" value="Submit">
                            </td>
                            <td style="border: 0px solid">
                            <?php echo '<input type="text" id="username" name="username" value="'.$username.'" style="display: none;">'?>
                            </td>
                        </tr>
                    </table>   
                </form>
                <h2>Zmena role: </h2>
                <form action="editpost.php" method="post">
                    <label for="rola">Nová rola: </label> <br>
                    <input type="radio" name="rola" value="user" required="required">
                    <label for="user">User</label><br>
                    <input type="radio" name="rola" value="admin" required="required">
                    <label for="admin">Admin</label><br>
                    <input type="submit" value="Submit">
                </form>
                <h2>Odstránenie uživateľa</h2>
                <a href="#" style="color: red;">Delete</a>
            <?php

        }else{
            echo '<p style="color: red;">Na toto nemáš oprávnenie</p>';
        }
    ?>

</div>
</div>
<?php include '../../assets/paticka.php' ?>