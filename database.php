<?php
header('Refresh: 2; url=index.html');
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" />
	<head>
<body>


<?php
    $eCode = $_POST['eCode'];
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $guestNumber = $_POST['guestNumber'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $time = $_POST['time'];
    
    $conn = new mysqli('localhost', 'root', '', 'database');
    if($conn->connect_error){
        die('Connection Failed : ' . $conn->connect_error);
    }

    else{
        $stm = $conn->prepare("insert into guest(eCode, name, phoneNumber,guestNumber, date, time) values(?,?,?,?,?,?)");
        $stm->bind_param("ississ", $eCode, $name,$phoneNumber,$guestNumber,$date, $time);
        $stm->execute();
        echo "<h1 class='sent'>Sent successfully</h1>";
        $stm->close();
        $conn->close();
    }
?>

</body>
</html>