<?php

	session_start();

	require_once "/home/capstone/Auto/data_files/database.php";
    $_SESSION['timeout']=time();
	
	if(isset($_SESSION['email'])&&isset($_SESSION['success'])){
			
				$query1="SELECT * FROM Users WHERE Email='{$_SESSION['email']}'";
				$check1=dbquery($query1);
				$fetch1= $check1->fetch_object();
				$result1=$fetch1->lname;
				$result2=$fetch1->fname;
	
	}
	
	else {
		
		
			
			header("location: ..//index.html");
		
	}
	


		$inactive = 600;
	
		if( isset($_SESSION['timeout']) ){

		    $session_life = time() - $_SESSION['timeout'];
		
		if($session_life > $inactive)
			{  	
				seeion_unset();
				session_destroy(); 
				header("Location:logout.php");     
			
			}
        }
    
$email = $_SESSION['email'];            
$query1 = "SELECT * FROM Users WHERE Email = '$email'";
$res1 = dbquery($query1);
$row = mysqli_fetch_row($res1);



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
                <title>Profile Update</title>
            </head>

    <body>
        <header>
                <nav>
                        <div class="row">
                            <img src="..//resources/img/logo.png" alt="93 logo" class="logo">
                            <img src="..//resources/img/logo - Copy.png" alt="93 logo black" class="logo-black">
        
                            <ul class="main-nav">
                            <?php echo"<li><a href='UserInfo.php'>$result1 $result2</a></li>"; ?>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>

                    <section class="VInfo">
                            <form action="UpdateProfileCheck.php" class="Vform" method="GET">
                            <div class="row">
                                    <h2><span style="color: #fff">Profile Update</span></h2>
                            </div>
         

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="email">Email</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<p style='color: #fff'>$row[4]</p>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="fname">Last Name</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<input type='text' name='lname' id='lname' placeholder='$row[1]'>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="fname">First Name</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<input type='text' name='fname' id='fname' placeholder='$row[2]'>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label for="cell">Cell Phone Number</label>
                
                                    </div>
                
                                    <div class="col span-2-of-3">
                                    <?php echo"<input type='number' name='cell' id='cell' placeholder='$row[3]'>" ?>
                
                                    </div>
                                
                
                            </div>

                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label>&nbsp;</label>
                                    </div>
                
                                    <div class="col span-2-of-3">
                                        <?php echo"<input type='hidden' name='uid' id='uid' value='$row[0]'>"?>
                                        <input type="submit" name="submit" value="Submit">
                                    </div>
                            </div>
                                           
                        </form>
                        </section>
        </header>
    </body>
</html>