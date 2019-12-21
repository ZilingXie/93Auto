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
            $_SESSION['timeout']=time();
            

    $tid = $_POST["tid"];

    $query1 = "SELECT * FROM TradeRecord WHERE T_ID = '$tid'";
    $res1 = dbquery($query1);
    $row = mysqli_fetch_row($res1);

    $query2 = "SELECT * FROM CarDisplay WHERE V_ID = '$row[7]'";
    $res2 = dbquery($query2);
    $vrow = mysqli_fetch_row($res2);
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
                <title>View Trade Record</title>
            </head>

    <body>
        <header>
                <nav>
                        <div class="row">
                            <img src="..//resources/img/logo.png" alt="93 logo" class="logo">
                            <img src="..//resources/img/logo - Copy.png" alt="93 logo black" class="logo-black">
        
                            <ul class="main-nav">
                            <li><a href="Mainpage.php">Employee Home</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>

                    <section class="VInfo">
                            <form action="UpdateEmpCheck.php" class="Vform" method="GET">
                            <div class="row">
                                    <h2><span style="color: #fff">View Trade Record</span></h2>
                            </div>
                


                          
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="EID">T_ID</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<p style='color: #fff'>$row[0]</p>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="email">User First Name</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<p style='color: #fff'>$row[1]</p>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="fname">User Last Name</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<p style='color: #fff'>$row[2]</p>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="fname">User ID</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<p style='color: #fff'>$row[3]</p>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="ssn">Employee ID</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<p style='color: #fff'>$row[4]</p>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="salary">Date</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<p style='color: #fff'>$row[5]</p>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="salary">Vehicle</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<p style='color: #fff'>$vrow[3] $vrow[4]</p>" ?>
                
                                    </div>
                                
                
                            </div>
                                           
                        </form>
                        </section>
        </header>
    </body>
</html>