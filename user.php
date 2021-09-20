<?php
include('concat.php');
include('delete.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Guest Data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome/webfonts">
    <link rel="icon" href="logo/favicon.png" type="image/gif" sizes="16x16">
    <link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" />
</head>

<body class="bodyuser">
    <div class="header"></div>

    <div class="povezava">
        <a href="index.html" class="ahref"><i class="fas fa-home"></i> Home</a>
    </div>

    <h2>Reservation List</h2>

    <?php
        $conn = mysqli_connect('localhost','root','','database');
        if(!$conn){
            die("Connection failed " . mysqli_connect_error());
        }

        $sql = "SELECT MONTHNAME(date) as mname, sum(guestNumber) as total from guest
                GROUP by MONTH(date) order by mname desc limit 3";
        $result = $conn->query($sql);

        $conn->close();
    ?>

    <table style="width:30%;">
        <tr class="trsum">
            <th>Month</th>
            <th>Orders</th>
        </tr>

        <?php while($row = $result->fetch_object()) : ?>

        <tr class="trsum">
            <td><?php echo $row->mname; ?></td>
            <td><?php echo $row->total; ?></td>
        </tr>

        <?php endwhile; ?>
    </table>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" autocomplete="off" class="search-flex">
        <input type="text" name="search" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" class="input-user"
            placeholder="Search">
        <button type="submit" name="submit" formaction="search.php" class="btn-go"><i class="fas fa-search"></i></button>
    </form>

    <form action="delete.php" method="POST">
    
    <table>
        

        <tr>
            <th>Delete</th>
            <th>Employee code</th>
            <th>Name</th>
            <th>Phone number</th>
            <th>Number of guests</th>
            <th>Date</th>
            <th>Time</th>
        </tr>

        <?php
            $conn = mysqli_connect("localhost", "root", "", "database");
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, eCode, name, phoneNumber, guestNumber, date, time from guest ORDER BY date DESC, time DESC";
            $result = $conn->query($sql);

            if($result->num_rows>0){
                while($row = $result -> fetch_assoc()){
                    echo'<tr class="tr-user">';
                    echo'<td><button type="submit" name="id[]" value="'.$row['id'].'" class="button-delete"><i class="far fa-trash-alt"></i></button></td>';
                    echo'<td style="display:none;">'.$row['id'].'</td>';
                    echo'<td>'.$row['eCode'].'</td>';
                    echo'<td>'.$row['name'].'</td>';
                    echo'<td>'.$row['phoneNumber'].'</td>';
                    echo'<td>'.$row['guestNumber'].'</td>';
                    echo'<td>'.$row['date'].'</td>';
                    echo'<td>'.$row['time'].'</td>';
                    echo'</tr>'; 
                }  
            }

            else{
                echo "<p class='no-result'>No result</p>";
            }

            $conn->close();
        ?>
    </table>
    </form>
    
    <button class="scroll-to-top"><i class="fas fa-arrow-up"></i></button>
    <script>
        const scrollBtn = document.querySelector(".scroll-to-top");

        const refreshButton = () => {
            if (document.documentElement.scrollTop <= 150) {
                scrollBtn.style.display = "none";
            } else {
                scrollBtn.style.display = "block";
            }
        };
        refreshButton();

        scrollBtn.addEventListener("click", () => {
            document.body.scrollTop = 0; /*safari*/
            document.documentElement.scrollTop = 0;
        });

        document.addEventListener("scroll", (e) => {
            refreshButton();
        });
    </script>
</body>

</html>