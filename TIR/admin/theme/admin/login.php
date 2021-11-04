<?php 
    session_start();
    include '../../../config/database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM uzivatelia WHERE login = '".$username."'";
    $result = $conn->query($sql);
    if($result->num_rows == 0){
        $_SESSION['error'] = "nespravne meno alebo heslo";
        header('Location:index.php?login='.$username.'');
        die;
    }else if($result->num_rows > 1){
        $_SESSION['error'] = "nastala chyba na nasej strane";
        header('Location:index.php?login='.$username.'');
        die;
    }
    $row = $result->fetch_assoc();

    $passwordVerify = password_verify($password,$row['heslo']);

    if($passwordVerify === TRUE){
        $_SESSION['user'] = $row;
        header('Location:../domov');
        die;
    }else{
        $_SESSION['error'] = "nespravne meno alebo heslo";
        header('Location:index.php?login='.$username.'');
        die;
    }

