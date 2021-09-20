<?php
    $conn = mysqli_connect('localhost','root','','database');
    if(!$conn){
        die("Connection failed " . mysqli_connect_error());
    }

    $ids = isset($_POST['id']) ? $_POST['id'] : '';

    foreach((array)$ids as $key=>$value){
         $sql = "DELETE FROM guest where id={$value}";
         $result = $conn->query($sql);
        
         if($result){
            header("location: user.php");
        }

    }
    $conn->close();
?>
     
