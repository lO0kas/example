<?php include '../../assets/hlavicka.php' ?>
<?php include '../../assets/sidemenu.php' ?>
<div class="w-75 p-3 col-xs-6">
    <!-- CONTENT -->
    <h1>Add new user</h1>
    <?php
        if($_SESSION["post"] == "admin"){
            ?>
            <form action="post.php" method="post">
            <table style="width: 50%;">
                <tr>
                    <th style="font-weight: normal;">
                        <label for="username">Uživatelské meno:</label>
                    </th>
                    <th style="font-weight: normal;">
                        <input type="text" id="username" name="username" pattern="[A-Z, a-z, 0-9].{4,16}" title="Meno musí byť v rozmedzí 5 - 16 znakov" required="required">
                    </th>
                </tr>
                <tr>
                    <th style="font-weight: normal;">
                        <label for="password">Heslo:</label>
                    </th>
                    <th style="font-weight: normal;">
                        <input type="password" id="password1" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Heslo musí mať aspoň 8 znakou a musí obsahovať minimálne 1 velké písmeno, 1 malé písmeno a 1 číslo" required="required">
                    </th>
                </tr>
                <tr>
                    <th style="font-weight: normal;">
                        <label for="password">Zopakuj heslo:</label>
                    </th>
                    <th style="font-weight: normal;"> 
                        <input type="password" id="password2" name="password2" required="required">
                    </th>
                </tr>
                <tr>
                    <th style="font-weight: normal;">
                        <label for="rola">Rola: </label>
                    </th>
                    <th style="font-weight: normal;">
                        <input type="radio" name="rola" value="user" required="required">
                        <label for="user">User</label><br>
                        <input type="radio" name="rola" value="admin" required="required">
                        <label for="admin">Admin</label><br>
                    </th>
                </tr>
                <tr>
                    <th style="font-weight: normal;">
                        <input type="submit" value="Submit">
                    </th>
                </tr>
            </table>
            </form>

            <?php
        }else{
            echo '<p style="color: red;">Na toto nemáš oprávnenie</p>';
        }
    ?>
    
</div>
</div>
<?php include '../../assets/paticka.php' ?>