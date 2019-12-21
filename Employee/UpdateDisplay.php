<?php

	session_start();

	require_once "/home/capstone/Auto/data_files/database.php";

	
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
            $_SESSION['etimeout']=time();
            

    $vid = $_GET["vid"];

    $CarDisplayQuery = "SELECT * FROM CarDisplay WHERE V_ID = '$vid'";
    $CarInfoQuery = "SELECT * FROM CarInfo WHERE V_ID = '$vid'";

    $checkInfo = dbquery($CarInfoQuery);
    $checkDisplay = dbquery($CarDisplayQuery);

    $CarInfoRow=mysqli_fetch_row($checkInfo);
    $CarDisplayRow=mysqli_fetch_row($checkDisplay);
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

                    <section class="VInfo">
                            <form action="UpdateCheck.php" class="Vform" method="GET">
                            <div class="row">
                                    <h2><span style="color: #fff">Update Vehicle Information</span></h2>
                            </div>
                
                            <?php echo"<input type='hidden' name='vid' id='vid' value='$CarDisplayRow[0]'>"?>


                               <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Type">Vehicle ID</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<p style='color: #fff'>$CarDisplayRow[0]</p>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Type">Type</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='Type' id='Type' placeholder='$CarDisplayRow[1]'>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Year">Year</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Year' id='Year' placeholder='$CarDisplayRow[2]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Manu">Manufature</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='Manu' id='Manu' placeholder='$CarDisplayRow[3]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Model">Model</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='Model' id='Model' placeholder='$CarDisplayRow[4]'>" ?>

                                    </div>
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Mileage">Mileage</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Mileage' id='Mileage' placeholder='$CarDisplayRow[5]'>" ?>

                                    </div>
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Price">Price</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Price' id='Price' placeholder='$CarDisplayRow[6]'>" ?>

                                    </div>
                            </div>

                            
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Status">Statue</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='Status' id='Status' placeholder='$CarDisplayRow[7]'>" ?>

                                    </div>
                            </div>
                
                     
            
                
                           
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="ExteriorColor">ExteriorColor</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='ExteriorColor' id='ExteriorColor' placeholder='$CarInfoRow[1]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="InteriorColor">InteriorColor</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='InteriorColor' id='InteriorColor' placeholder='$CarInfoRow[2]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Engine">Engine</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='Engine' id='Engine' placeholder='$CarInfoRow[3]'>" ?>

                                    </div>
                            </div>
                  
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Transmission">Transmission</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='Transmission' id='Transimission' placeholder='$CarInfoRow[4]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Drive">Drive</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Drive' id='Drive' placeholder='$CarInfoRow[5]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Cylinders">Cylinders</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Cylinders' id='Cylinders' placeholder='$CarInfoRow[6]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Horsepower">Horsepower</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Horsepower' id='Horsepower' placeholder='$CarInfoRow[7]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="HPrpm">HPrpm</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='HPrpm' id='HPrpm' placeholder='$CarInfoRow[8]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Torque">Torque</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Torque' id='Torque' placeholder='$CarInfoRow[9]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Trpm">Trpm</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Trpm' id='Trpm' placeholder='$CarInfoRow[10]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Camshaft">Camshaft</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='Camshaft' id='Camshaft' placeholder='$CarInfoRow[11]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="EngineType">Engine Type</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='text' name='EngineType' id='EngineType' placeholder='$CarInfoRow[12]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Accidents">Accidents</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Accidents' id='Accidents' placeholder='$CarInfoRow[13]'>" ?>

                                    </div>
                            </div>
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="Plate">Plate</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='number' name='Plate' id='Plate' placeholder='$CarInfoRow[14]'>" ?>

                                    </div>
                            </div>
                
                
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label>&nbsp;</label>
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <input type="submit" name="submit" value="Submit">
                                    </div>
                            </div>
                
                        </form>
                        </section>
        </header>
    </body>
</html>