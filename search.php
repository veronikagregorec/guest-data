<?php
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
    <title>Guest Data</title>
</head>

<body class="bodyuser">
    <div class="header"></div>

    <div class="povezava">
        <a href="index.html" class="ahref"><i class="fas fa-home"></i> Home</a>
    </div>

    <h2>Reservation list</h2>

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

    <form autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="search-flex" > 
        <input type="text" name="search" class="input-user" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>"
            placeholder="Search">
            <button type="submit" formaction="search.php" class="btn-go"><i class="fas fa-search"></i></button>
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
            $connect = mysqli_connect("localhost","root","","database");
            if(isset($_POST['search'])){
                $filtervalues = $_POST['search'];
                $query = "SELECT * FROM guest WHERE CONCAT(id,eCode,name,phoneNumber,guestNumber,date,time) LIKE '%$filtervalues%' ORDER BY date DESC, time DESC ";
                $query_run = mysqli_query($connect, $query);

                if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $items)
                    {
            ?>
            <tr class="tr-search">
                <td><button type="submit" name="ids[]" value="<?= $items['id']; ?>" class="button-delete"><i class="far fa-trash-alt"></i></button></td>
                <td><?= $items['eCode']; ?></td>
                <td><?= $items['name']; ?></td>
                <td><?= $items['phoneNumber']; ?></td>
                <td><?= $items['guestNumber']; ?></td>
                <td><?= $items['date']; ?></td>
                <td><?= $items['time']; ?></td>
            </tr>
            <?php
                }
            }

            else{
            ?>
                <p class='no-result'>No record found</p>
            <?php
                }
            }
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