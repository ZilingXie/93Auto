<?php

    require_once "/home/capstone/Auto/data_files/database.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $manu = $_POST['manufacture'];
    $year = $_POST['year'];
    $model = $_POST['model'];
    $mile = $_POST['miles'];

    $message = "User Name: $name\nEmail: $email\nTelephone: $tel\n>Date: $news\nTime: $time\nManufacture: $manu\nYear: $year\nModel: $model\nMiles: $mile";
    $me = nl2br($message);
    mail("xieziling88@gmail.com","Sell Request","Sell Request","$me");
  
?>

<!DOCTYPE html>
<html lang="en">
        <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                
                <link rel="stylesheet" type="text/css" href="..//venders/css/normalize.css">
                <link rel="stylesheet" type="text/css" href="..//venders/css/grid.css">
                <!-- <link rel="stylesheet" type="text/css" href="venders/css/ionicons.min.css"> -->
                <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="..//venders/css/animate.css">
                <link rel="stylesheet" type="text/css" href="..//resources/css/style.css">
                <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
                <title>Sell Request</title>
            </head>

    <body>
        <header>
                <nav>
                        <div class="row">
                            <img src="..//resources/img/logo.png" alt="93 logo" class="logo">
                            <img src="..//resources/img/logo - Copy.png" alt="93 logo black" class="logo-black">
        
                           
                        </div>
                    </nav>
                    <p style='font-weight: bold; color:#FFFFFF; text-align: center; font-size=7'>Your appointment and vehicle information has been submitted.</p>
                    <p style='font-weight: bold; color:#FFFFFF; text-align: center; font-size=7'>Heading to Homepage</p>
  
                    <?php header( "refresh:2;url=http://weblab.salemstate.edu/~Auto/93Web/index.php" ); ?>

</body>
</html>