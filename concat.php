<?php
    $name = isset($POST['name']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "database";

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

    $sql = "UPDATE guest SET name = CONCAT(UCASE(LEFT(name, 1)), LCASE(SUBSTRING(name, 2)))";
    
    if ($conn->query($sql) === TRUE) {
        echo "" . $name;
    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }

    $conn->close();
?>