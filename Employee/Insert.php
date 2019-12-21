<?php
	session_start();
    require_once "/home/capstone/Auto/data_files/database.php";

    $_SESSION['etimeout']=time();
	
	if(isset($_SESSION['eemail'])&&isset($_SESSION['esuccess'])){
			
				$query1="SELECT * FROM Employee WHERE Email='{$_SESSION['eemail']}'";
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
    $type = $_GET["Type"];

    $year = $_GET["Year"];

    $manu = $_GET["Manu"];

    $model = $_GET["Model"];

    $mile = $_GET["Mileage"];

    $price = $_GET["Price"];

    $status = $_GET["Status"];

    $ext = $_GET["ExteriorColor"];

    $int = $_GET["InteriorColor"];

    $trans = $_GET["Transmission"];

    $drive = $_GET["Drive"];

    $engine = $_GET["Engine"];
    
    $cyl = $_GET["Cylinders"];

    $horse = $_GET["Horsepower"];

    $HPrpm = $_GET["HPrpm"];

    $torque = $_GET["Torque"];

    $trpm = $_GET["Trpm"];

    $camshaft = $_GET["Camshaft"];

    $engtype = $_GET["EngineType"];

    $accidents = $_GET["Accidents"];

    $plate = $_GET["Plate"];


    $query1="INSERT INTO CarDisplay(Type, Year, Manufacture, Model, Mileage, Price, Statue) VALUES ('$type', '$year','$manu','$model','$mile','$price','$status')";
    $result1=dbquery($query1);

    // // // echo"Insterted";

    // $query2="SELECT * FROM CarDisplay WHERE Type = 'SUV' AND Year = '2015' AND Manufacture ='kIA' AND Model = 'Soul' AND Mileage = '31' AND Price = '23999' AND Statue = 'avaliable'";

    $query2="SELECT * FROM CarDisplay WHERE Type = '$type' AND Year = '$year' AND Manufacture ='$manu' AND Model = '$model' AND Mileage = '$mile' AND Price = '$price' AND Statue = '$status'";
    $result2=dbquery($query2);

    $row=mysqli_fetch_row($result2);
    

    $query3="INSERT INTO CarInfo(V_ID,ExteriorColor, InteriorColor, Transmission, Drive, Engine, Cylinders, Horsepower, HPrpm, Torque, Trpm, Camshaft, EngineType, Accidents, Plate) VALUES('$row[0]','$ext','$int', '$trans', '$drive', '$engine', '$cyl', '$horse','$HPrpm', '$torque', '$trpm', '$camshaft', '$engtype', '$accidents', '$plate')";
	
    $result4=dbquery($query3);
    

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
                <title>New Vehicle</title>
            </head>

    <body>
        <header>
                <nav>
                        <div class="row">
                            <img src="..//resources/img/logo.png" alt="93 logo" class="logo">
                            <img src="..//resources/img/logo - Copy.png" alt="93 logo black" class="logo-black">
        
                        </div>
                    </nav>

                    <h1>Insert Successful!</h1>
                    <h1>Heading to Homepage</h1>

                    <?php 
                        header( "refresh:2;url=http://weblab.salemstate.edu/~Auto/93Web/Employee/Mainpage.php" );

                    ?>
</header>
</body>
</html>