<?php include '../../assets/hlavicka.php' ?>
<?php
    $inputname = $_POST['name'];
    $inputpassword = $_POST['password'];
    $prihlasenyuzivazel = false;
    $riadkysuboru = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($riadkysuboru as $riadok)
    {
        list($name, $password, $post) = explode('::', $riadok);
        if($inputname == $name && $inputpassword == $password){
            $_SESSION["name"] = $inputname;
            $_SESSION["password"] = $inputpassword;
            $_SESSION["post"] = $post;
            $prihlasenyuzivazel = true;
            header('Location: ../domov');
            die();
        }
    }
    if($prihlasenyuzivazel == false){
        echo '<p style="color: red">Nesprávne meno alebo heslo</p>';
        echo '<a href="index.php">Naspäť</a>';
    }
?>
<?php include '../../assets/paticka.php' ?>