 <?php
    session_start();
    function getConn(){
        $dbHost = "localhost";
        $dbUsername = "lukasgemela";
        $dbPassword = "nudimsa";
        $db = "demo21";
    
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $db);
    
        if ($conn->connect_error) {
               die('connection errro'.$conn->connect_error);
        }
        return $conn;
    }

    function login($username, $password)
    {
        $conn = getConn();
        $sql = "SELECT * FROM uzivatelia WHERE login = '".$username."'";    
        $result = $conn->query($sql);
        if($result->num_rows == 0){
            return "nespravne meno alebo heslo";
        }else if($result->num_rows > 1){
            return "nastala chyba na nasej strane";
        }
        $row = $result->fetch_assoc();

        $passwordVerify = password_verify($password,$row['heslo']);

        if($passwordVerify === TRUE){
            $_SESSION['user'] = $row;
            return true;
        }else{
            return "nespravne meno alebo heslo";
        }
    }

    function flashmessage($message, $type = 'ok')
    {
        $_SESSION['flashmessage']['message'] = $message;
        $_SESSION['flashmessage']['type'] = $type;
    }

    function register($username, $name, $password, $passwordVerify)
    {
        $conn = getConn();
        if($password != $passwordVerify){
            return "zle overovacie heslo";
        }
    
        $sql = "SELECT * FROM uzivatelia WHERE login = '".$username."'";
        $result = $conn->query($sql);
        if($result->num_rows != 0){
            return "uzivatel uz existuje";
        }
    
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO uzivatelia (login, heslo, meno, rola) VALUES ('".$username."','".$passwordHash."','".$name."','user')";
        $result = $conn->query($sql);
        $sql = "SELECT * FROM uzivatelia WHERE login = '".$username."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row;
        return true;
    }

    function getArticles()
    {
        $conn = getConn();
        $sql = "SELECT * FROM prispevky";
        $result = $conn->query($sql);
        return $result -> fetch_all(MYSQLI_ASSOC);
    }

    