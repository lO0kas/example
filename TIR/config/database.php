<?php
    $dbHost = "localhost";
    $dbUsername = "lukasgemela";
    $dbPassword = "nudimsa";
    $db = "demo21";

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $db);

    if ($conn->connect_error) {
           die('connection errro'.$conn->connect_error);
    }