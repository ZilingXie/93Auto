<?php

	session_start();

	require_once "/home/capstone/Auto/data_files/database.php";
    $_SESSION['atimeout']=time();
	
	if(isset($_SESSION['aemail'])&&isset($_SESSION['asuccess'])){
			
				$query1="SELECT * FROM Employee WHERE Email='{$_SESSION['aemail']}'";
				$check1=dbquery($query1);
				$fetch1= $check1->fetch_object();
				$result1=$fetch1->lname;
				$result2=$fetch1->fname;
	
	}
	
	else {
		
		
			
			header("location: AdminLogin.html");
		
	}
	


		$inactive = 600;
	
		if( isset($_SESSION['atimeout']) ){

		    $session_life = time() - $_SESSION['atimeout'];
		
		if($session_life > $inactive)
			{  	
				seeion_unset();
				session_destroy(); 
				header("Location:logout.php");     
			
			}
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
                <title>View Trade Record</title>
            </head>

    <body>
        <header>
                <nav>
                        <div class="row">
                            <img src="..//resources/img/logo.png" alt="93 logo" class="logo">
                            <img src="..//resources/img/logo - Copy.png" alt="93 logo black" class="logo-black">
        
                            <ul class="main-nav">
                            <li><a href="Admin.php">Admin Home</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>

                
                    <div>
                        <p style="text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF">Please Search for the record you want to see.</p>
                    </div>
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

                    <form name="myForm" class="example" action="TradeRecordSearch.php" method="POST" onsubmit="return validateForm()">
                        <div class="search-box">
                          
                            <input class="search" type="number" placeholder="T_ID" name="tid">

                            <input class="search" type="date" placeholder="Date" name="date">

                            <input class="search" type="number" placeholder="E_ID" name="eid">

                            <button class="searchBTN" type="submit">Search</button>

                            <!-- </div> -->
                        </div> 
                    </form>
                    
                 <!-- <i class="icon ion-md-search"></i> -->
               
        </header>
       
 

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