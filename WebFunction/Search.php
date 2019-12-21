<?php
    session_start();
    require_once "/home/capstone/Auto/data_files/database.php";

    $year = $_POST['year'] ;
    $manu = $_POST['manu'] ;
    $model = $_POST['model'] ;


    $resultcheck = 1;
    $SearchQuery = "";


    if(empty($_POST['year'])){

        if(empty($_POST['manu'])){

            if(empty($_POST['model'])){
                $resultcheck == 0;
            }
            
            else{
                $SearchQuery = "SELECT * FROM CarDisplay WHERE Model LIKE '%$model%' ORDER BY V_ID ASC";
            }
        }

        else{
            if(empty($_POST['model'])){
                $SearchQuery = "SELECT * FROM CarDisplay WHERE Manufacture LIKE '%$manu%' ORDER BY V_ID ASC";
            }

            else{
                $SearchQuery = "SELECT * FROM CarDisplay WHERE Manufacture LIKE '%$manu%' AND Model LIKE '%$model%' ORDER BY V_ID ASC";

            }
        }

    }

    else{
        if(empty($_POST['manu'])){
            if($model == 0){
                $SearchQuery = "SELECT * FROM CarDisplay WHERE Year = '$year' ORDER BY V_ID ASC";
            }
            
            else{
                $SearchQuery = "SELECT * FROM CarDisplay WHERE Year='$year' AND Model LIKE '%$model%' ORDER BY V_ID ASC";
            }
        }

        else{
            if(empty($_POST['model'])){
                $SearchQuery = "SELECT * FROM CarDisplay WHERE Year = '$year' AND Manufacture LIKE '%$manu%' ORDER BY V_ID ASC";
            }

            else{
                $SearchQuery = "SELECT * FROM CarDisplay WHERE Year = '$year' AND Manufacture LIKE '%$manu%' AND Model LIKE '%$model%' ORDER BY V_ID ASC";

            }
        }
    }


    $check = dbquery($SearchQuery);
    $rowcount = $check ->num_rows;
    $divcount = intdiv($rowcount,3);
    $remainder = $rowcount%3;
    if($rowcount == 0){

        $resultcheck = 0;

    }

    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
        <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
        <script src="venders/js/jquery.waypoints.min.js"></script>
        <script src="resources/js/script.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="..//venders/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="..//venders/css/grid.css">
        <!-- <link rel="stylesheet" type="text/css" href="venders/css/ionicons.min.css"> -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="..//venders/css/animate.css">
        <link rel="stylesheet" type="text/css" href="..//resources/css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <?php echo"<title>$type</title>";?>
    </head>
	<BODY>
        <header class="Shop">
                <nav>
                        <div class="row">
                            <a><img src="..//resources/img/logo.png" alt="93 logo" class="logo" href="#"></a>
                            <ul class="main-nav">
                                <li><a href="..//index.php">Home</a></li>
                                <li><a href="Shop.html">Shop</a></li>
                                <li><a href="Sell.html">Sell</a></li>
        
                            </ul>
                        </div>
                </nav>
                <script>
                function validateForm() {
                    var x = document.forms["myForm"]["year"].value;
                    var y = document.forms["myForm"]["manu"].value;
                    var z = document.forms["myForm"]["model"].value;
                     if (x == "" && y == "" && z == "") {
                        alert("Please fill at least one column!");
                        return false;
                    }
                }
            </script>
                <div class="search-box">
                        <form name = "myForm"class="example" action="Search.php" method="POST" onsubmit="return validateForm()">
                        <input class="search" type="text" placeholder="Year" name="year">
                        <input class="search" type="text" placeholder="Maunufacture" name="manu">
                        <input class="search" type="text" placeholder="Model" name="model">
                        <button class="searchBTN" type="submit">Search</button>
                        <!-- <i class="icon ion-md-search"></i> -->
                        </form>
                </div> 
               
        </header>   
                <section class="VInfo clearfix">
               
             
                    <?php

                        if( $resultcheck == 0){

                            echo "<h1><p style='margin-left:30%'>Result Not Found.<p></h1>
                            <section class = 'VInfo clearfix'></section>
                            <section class = 'VInfo clearfix'></section>
                            <section class = 'VInfo clearfix'></section>
                            ";

                        }
                       // if($row[7]=='avaliable'){
                        
                        else{
                        for($i=0;$i<$divcount;$i++){
				 
                        echo'<div class="row"><form action="Sell.html" type="GET">';

                        
                        for($j=0;$j<3;$j++){
                            $row=mysqli_fetch_row($check);
					
                            echo"<div class='col span-1-of-3 box'><a href='CarDisplay.php?vid=$row[0]'><img class='CarImg' height='200px' weight='200px' src='..//resources/CarPic/$row[1]/$row[3]/$row[0].$row[4]/display.jpg'><p class='Vdetail'>$row[2] $row[3] $row[4]</br></p></a></div>";

                        }

                        echo"</div>";

                     
            
            }

            if($remainder==2){
                echo"<div class='row'>";
                for($j=0;$j<2;$j++){
                    $row=mysqli_fetch_row($check);
            
                    echo"<div class='col span-1-of-3 box'><a href='CarDisplay.php?vid=$row[0]'><img class='CarImg' height='200px' weight='200px' src='..//resources/CarPic/$row[1]/$row[3]/$row[0].$row[4]/display.jpg'><p class='Vdetail'>$row[2] $row[3] $row[4]</br></p></a></div>";

                }
                echo"</div>";
            }

            else if ($remainder==1){
                echo"<div class='row'>";
                $row=mysqli_fetch_row($check);
                echo"<div class='col span-1-of-3 box'><a href='CarDisplay.php?vid=$row[0]'><img class='CarImg' height='200px' weight='200px' src='..//resources/CarPic/$row[1]/$row[3]/$row[0].$row[4]/display.jpg'><p class='Vdetail'>$row[2] $row[3] $row[4]</br></p></a></div>";
                echo"</div>";
            }
        //}
        }
        ?>
                  
        
                </section>
                    
                <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>         
                        <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>
                

     
                <footer>
                    <div class="row">
                        <div class="col span-1-of-2">
                            <ul class="footer-nav">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="#">iOS App</a></li>
                                <li><a href="#">Android App</a></li>
                            </ul>
                        </div>
                        <div class="col span-1-of-2">
                            <ul class="social-links">
                                <li><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
                                <li><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
                                <li><a href="#"><i class="icon ion-logo-googleplus"></i></a></li>
                                <li><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
               
                </footer>

</body>


</html>

