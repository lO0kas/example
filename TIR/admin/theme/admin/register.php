<?php 
    session_start();
    include '../../../config/database.php';

    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    if($password != $_POST['password_verify']){
        $_SESSION['error'] = "zle overovacie heslo";
        header('Location:index.php?register&login='.$username.'&name='.$name.'');
    }

    $sql = "SELECT * FROM uzivatelia WHERE login = '".$username."'";
    $result = $conn->query($sql);
    // var_dump($result);die;
    if($result->num_rows != 0){
        $_SESSION['error'] = "uzivatel uz existuje";
        header('Location:index.php?register&login='.$username.'&name='.$name.'');
        die;
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO uzivatelia (`login`, `heslo`, `meno`, `rola`) SET (".$username.",".$passwordHash.",".$name.",user)";
    $result = $conn->query($sql);
    $sql = "SELECT * FROM uzivatelia WHERE login = '".$username."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION['user'] = $row;
    header('Location:index.php?../domov');
    die;
