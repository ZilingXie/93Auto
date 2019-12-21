<?php
	session_start();
    require_once "/home/capstone/Auto/data_files/database.php";
    $_SESSION['etimeout']=time();
	if(isset($_SESSION['eemail'])&&isset($_SESSION['esuccess'])){
			
        $query1="SELECT * FROM Users WHERE Email='{$_SESSION['eemail']}'";
        $check1=dbquery($query1);
        $fetch1= $check1->fetch_object();
        $result1=$fetch1->lname;
        $result2=$fetch1->fname;

}

else {


    
    header("location: EmpLogin.html");

}



$inactive = 600;

if( isset($_SESSION['etimeout']) ){

    $session_life = time() - $_SESSION['etimeout'];

if($session_life > $inactive)
    {  	
        seeion_unset();
        session_destroy(); 
        header("Location:logout.php");     
    
    }
}
    

    $vid = $_GET["vid"];
   // echo"$vid</br>";

    $type = $_GET["Type"];
    if(!empty($_GET['Type'])){
        $query1 = "UPDATE CarDisplay SET Type = '$type' WHERE V_ID = '$vid'";
        $result1=dbquery($query1);
        //echo"Type Update Successfully</br>";

    }

    $year = $_GET["Year"];
    if(!empty($_GET['Year'])){
        $query2 = "UPDATE CarDisplay SET Year = '$year' WHERE V_ID = '$vid'";
        $result2=dbquery($query2);
        //echo"Year Update Successfully</br>";

    }

    $manu = $_GET["Manu"];
    if(!empty($_GET['Manu'])){
        $query3 = "UPDATE CarDisplay SET Manufacture = '$manu' WHERE V_ID = '$vid'";
        $result3=dbquery($query3);
        //echo"Manufacture Update Successfully</br>";

    }

    $model = $_GET["Model"];
    if(!empty($_GET['Model'])){
        $query4 = "UPDATE CarDisplay SET Model = '$model' WHERE V_ID = '$vid'";
        $result4=dbquery($query4);
        //echo"Model Update Successfully</br>";

    }

    $mile = $_GET["Mileage"];
    if(!empty($_GET['Mileage'])){
        $query5 = "UPDATE CarDisplay SET Mileage = '$mile' WHERE V_ID = '$vid'";
        $result5=dbquery($query5);
        //echo"Mileage Update Successfully</br>";

    }

    $price = $_GET["Price"];
    if(!empty($_GET['Price'])){
        $query6 = "UPDATE CarDisplay SET Price = '$price' WHERE V_ID = '$vid'";
        $result6=dbquery($query6);
        //echo"Price Update Successfully</br>";

    }

    $status = $_GET["Status"];
    if(!empty($_GET['Status'])){
        $query7 = "UPDATE CarDisplay SET Status = '$status' WHERE V_ID = '$vid'";
        $result7=dbquery($query7);
        //echo"Status Update Successfully</br>";

    }

    $ext = $_GET["ExteriorColor"];
    if(!empty($_GET["ExteriorColor"])){
        $query8 = "UPDATE CarInfo SET ExteriorColor = '$ext' WHERE V_ID = '$vid'";
        $result8=dbquery($query8);
        //echo"Exterior Color Update Successfully</br>";

    }

    $int = $_GET["InteriorColor"];
    if(!empty($_GET["InteriorColor"])){
        $query8 = "UPDATE CarInfo SET InteriorColor = '$int' WHERE V_ID = '$vid'";
        $result8=dbquery($query8);
        //echo"Interior Color Update Successfully</br>";

    }

    $trans = $_GET["Transmission"];
    if(!empty($_GET["Transmission"])){
        $query9 = "UPDATE CarInfo SET Transmission = '$trans' WHERE V_ID = '$vid'";
        $result9=dbquery($query9);
        //echo"Transmission Update Successfully</br>";

    }

    $drive = $_GET["Drive"];
    if(!empty($_GET["Drive"])){
        $query10 = "UPDATE CarInfo SET Drive = '$drive' WHERE V_ID = '$vid'";
        $result10=dbquery($query10);
        //echo"Drive Update Successfully</br>";

    }

    $engine = $_GET["Engine"];
    if(!empty($_GET["Engine"])){
        $query11 = "UPDATE CarInfo SET Engine = '$engine' WHERE V_ID = '$vid'";
        $result11=dbquery($query11);
        //echo"Engine Update Successfully</br>";

    }
    
    $cyl = $_GET["Cylinders"];
    if(!empty($_GET["Cylinders"])){
        $query12 = "UPDATE CarInfo SET Cylinders = '$cyl' WHERE V_ID = '$vid'";
        $result12=dbquery($query12);
        //echo"Cylinders Update Successfully</br>";

    }

    $horse = $_GET["Horsepower"];
    if(!empty($_GET["Horsepower"])){
        $query13 = "UPDATE CarInfo SET Horsepower = '$horse' WHERE V_ID = '$vid'";
        $result13=dbquery($query13);
       // echo"Horsepower Update Successfully</br>";

    }

    $HPrpm = $_GET["HPrpm"];
    if(!empty($_GET["HPrpm"])){
        $query14 = "UPDATE CarInfo SET Type = '$HPrpm' WHERE V_ID = '$vid'";
        $result14=dbquery($query14);
        //echo"Hprpm Update Successfully</br>";

    }

    $torque = $_GET["Torque"];
    if(!empty($_GET["Torque"])){
        $query15 = "UPDATE CarInfo SET Torque = '$torque' WHERE V_ID = '$vid'";
        $result15=dbquery($query15);
        //echo"Torque Update Successfully</br>";

    }

    $trpm = $_GET["Trpm"];
    if(!empty($_GET["Trpm"])){
        $query16 = "UPDATE CarInfo SET Trpm = '$trpm' WHERE V_ID = '$vid'";
        $result16=dbquery($query16);
        //echo"Trpm Update Successfully</br>";

    }

    $camshaft = $_GET["Camshaft"];
    if(!empty($_GET["Camshaft"])){
        $query17 = "UPDATE CarInfo SET Camshaft = '$camshaft' WHERE V_ID = '$vid'";
        $result17=dbquery($query17);
        //echo"Camshaft Update Successfully</br>";

    }

    $engtype = $_GET["EngineType"];
    if(!empty($_GET["EngineType"])){
        $query18 = "UPDATE CarInfo SET EngineType = '$engtype' WHERE V_ID = '$vid'";
        $result18=dbquery($query18);
        //echo"Engine type Update Successfully</br>";

    }

    $accidents = $_GET["Accidents"];
    if(!empty($_GET["Accidents"])){
        $query19 = "UPDATE CarInfo SET Accidents = '$accidents' WHERE V_ID = '$vid'";
        $result19=dbquery($query19);
        //echo"Accidents Update Successfully</br>";

    }

    $plate = $_GET["Plate"];
    if(!empty($_GET["Plate"])){
        $query20 = "UPDATE CarInfo SET Plate = '$plate' WHERE V_ID = '$vid'";
        $result20=dbquery($query20);
        //echo"Plate Update Successfully</br>";

    }


  
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
                <title>Update Vehicle</title>
            </head>

    <body>
        <header>
                <nav>
                        <div class="row">
                            <img src="..//resources/img/logo.png" alt="93 logo" class="logo">
                            <img src="..//resources/img/logo - Copy.png" alt="93 logo black" class="logo-black">
        
                            <ul class="main-nav">
                                <li><a href="Mainpage.php">Employee Home</a></li>
                                <?php echo"<li><a href='#'>$result1 $result2</a></li>"; ?>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>

                    <p style='font-weight: bold; color:#FFFFFF; text-align: center; font-size=7'>Update Submitted, Heading to Homepage</p>
                    <?php header( "refresh:2;url=http://weblab.salemstate.edu/~Auto/93Web/Employee/Mainpage.php");?>

</header>
</body>
</html>