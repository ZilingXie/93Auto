<?php

	session_start();

	require_once "/home/capstone/Auto/data_files/database.php";
    $_SESSION['timeout']=time();
	
	if(isset($_SESSION['eemail'])&&isset($_SESSION['esuccess'])){
			
				$query1="SELECT * FROM Employee WHERE Email='{$_SESSION['eemail']}'";
				$check1=dbquery($query1);
				$fetch1= $check1->fetch_object();
				$result1=$fetch1->lname;
				$result2=$fetch1->fname;
                $result3=$fetch1->E_ID;

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
                <title>Trade Record</title>
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
                    <form action="TradeInsert.php" class="Vform" method="GET">
                    <div class="row">
                            <h2><span style="color: #fff">Trade Record</span></h2>
                    </div>
        
                    <div class="row">
                            <div class="col span-1-of-3">
                                <label for="lname">Customer Last Name</label>
        
                            </div>
        
                            <div class="col span-2-of-3">
                                <input type="text" name="lname" id="lname" placeholder="User Last Name" required>
        
                            </div>
                        
        
                    </div>

                    <div class="row">
                            <div class="col span-1-of-3">
                                <label for="fname">Customer First Name</label>
        
                            </div>
        
                            <div class="col span-2-of-3">
                                <input type="text" name="fname" id="fname" placeholder="User First Name" required>
        
                            </div>
                        
        
                    </div>

                    <div class="row">
                            <div class="col span-1-of-3">
                                <label for="eid">Employee ID</label>
        
                            </div>
        
                            <div class="col span-2-of-3">
                                <input type="hidden" name="eid" id="eid">
                                <?php echo"<p class='Vdetail'>$result3</p>";?>
                            </div>
                        
        
                    </div>

                    <div class="row">
                            <div class="col span-1-of-3">
                                <label for="date">Date</label>
        
                            </div>
        
                            <div class="col span-2-of-3">
                                <input type="date" name="date" id="date" placeholder="date" required>
        
                            </div>
                        
        
                    </div>

                    <div class="row">
                            <div class="col span-1-of-3">
                                <label>Action</label>
                            </div>
    
                            <div class="col span-2-of-3">
                                <label><input type="radio" name="action" id="sell" value="SellOut">
                                <span>Sell Out</span></label>
                                <label><input type="radio" name="action" id="trade" value="BuyIn">
                                <span>Buy In</span></label>

                            </div>
                    </div>

                    <div class="row">
                            <div class="col span-1-of-3">
                                <label for="vid">Vehicle ID</label>
        
                            </div>
        
                            <div class="col span-2-of-3">
                                <input type="number" name="vid" id="vid" placeholder="Vehicle ID" required>
        
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