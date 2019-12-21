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
                            <?php echo"<li><a href='#'>$result1 $result2</a></li>"; ?>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>

                
                    <div>
                        <p style="text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF">Please Search for the Trade Record you want to see.</p>
                    </div>

                    <script>
                function validateForm() {
                    var w = document.forms["myForm"]["eid"].value;
                    var x = document.forms["myForm"]["lname"].value;
                    var y = document.forms["myForm"]["fname"].value;
                    var z = document.forms["myForm"]["date"].value;
                     if (w == "" && x == "" && y == "" && z == "") {
                        alert("Please fill at least one column!");
                        return false;
                    }
                }
            </script>
                    <form name="myForm" class="example" action="TradeViewSearch.php" method="POST" onsubmit="return validateForm()">
                        <div class="search-box" required>
                        <input class="search" type="text" placeholder="Employee ID" name="eid">

                            <input class="search" type="text" placeholder="User Last Name" name="lname">

                            <input class="search" type="text" placeholder="User First Name" name="fname">

                            <input class="search" type="date" placeholder="Date" name="date">


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