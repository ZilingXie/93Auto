<?php

	session_start();

	require_once "/home/capstone/Auto/data_files/database.php";

	
	if(isset($_SESSION['aemail'])&&isset($_SESSION['asuccess'])){
			
				$query1="SELECT * FROM Admin WHERE Email='{$_SESSION['aemail']}'";
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
            $_SESSION['atimeout']=time();
            

			$tid = $_POST['tid'];
			$eid = $_POST['eid'];
            $date = $_POST['date'];
		
		
			$resultcheck = 1;
            $SearchQuery = "";
            
            if(empty($_POST['tid'])){    
                if(empty($_POST['eid'])){
            
                    if(empty($_POST['date'])){
                        $resultcheck == 0;
                    }

                    else{
                        $SearchQuery = "SELECT * FROM TradeRecord WHERE date = '$date' ORDER BY T_ID ASC";
                    }
                }

                else{
                    if(empty($_POST['date'])){
                        $SearchQuery = "SELECT * FROM TradeRecord WHERE E_ID = '$eid' ORDER BY T_ID ASC";
                    }

                    else{
                        $SearchQuery = "SELECT * FROM TradeRecord WHERE date = '$date' AND E_ID = '$eid' ORDER BY T_ID ASC";
                    }
                }
        
            }

            else{
                if(empty($_POST['eid'])){
            
                    if(empty($_POST['date'])){
                        $SearchQuery = "SELECT * FROM TradeRecord WHERE T_ID='$tid' ORDER BY T_ID ASC";
                    }

                    else{
                        $SearchQuery = "SELECT * FROM TradeRecord WHERE date = '$date'AND T_ID='$tid' ORDER BY T_ID ASC";
                    }
                }

                else{
                    if(empty($_POST['date'])){
                        $SearchQuery = "SELECT * FROM TradeRecord WHERE E_ID = '$eid' AND T_ID='$tid' ORDER BY T_ID ASC";
                    }

                    else{
                        $SearchQuery = "SELECT * FROM TradeRecord WHERE date = '$date' AND E_ID = '$eid' AND T_ID='$tid' ORDER BY T_ID ASC";
                    }
                }
        
            }

             
	
		
		
			$check = dbquery($SearchQuery);
			$rowcount = $check ->num_rows;
			if($rowcount == 0){
		
				$resultcheck = 0;
		
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
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <title>View Trade Record</title>
    </head>
	<BODY>
        <header class="Shop">
                <nav>
                        <div class="row">
                            <a><img src="..//resources/img/logo.png" alt="93 logo" class="logo" href="#"></a>
                            <ul class="main-nav">
                                <li><a href="Admin.php">Admin Home</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                </nav>
        </header>   
                <section class="Vdisplay">

                <?php
                   
                    if( $resultcheck == 0){

                        echo"<h1><p style='margin-left:30%'>Result Not Found.<p></h1>
                        <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>";
                    }

                    else{
                       echo"
                            <div class='row'>
                                <div class='col span-1-of-4 box'>
                                    <label><p style='color:#fff'>T_ID</p></label>
                                </div>

                                <div class='col span-1-of-4 box'>
                                    <label><p style='color:#fff'>Date</p></label>
                                </div>

                                <div class='col span-1-of-4 box'>
                                    <label><p style='color:#fff'>Action</p></label>
                                </div>
                            </div>";

                         for($i=0;$i<$rowcount;$i++){
                            $row=mysqli_fetch_row($check);
                            echo"
                            <form action='TradeRecordDisplay.php' method='POST'>
                                <div class='row'>
                                    <div class='col span-1-of-4 box'>
                                        <label><p style='color:#fff'>$row[0]</p></label>
                                    </div>
    
                                    <div class='col span-1-of-4 box'>
                                        <label><p style='color:#fff'>$row[5]</p></label>
                                    </div>
    
                                    <div class='col span-1-of-4 box'>
                                        <label><p style='color:#fff'>$row[6]</p></label>
                                    </div>

                                    <div class='col span-1-of-4 box'>
                                        <input type='submit' name='submit' value='Select'>
                                    </div>
                                    <input type='hidden' name='tid' id='tid' value='$row[0]'>
                                </div>
                             </form>";
                         }
                    }
                ?>
 
                </section>
               

                <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>
     
                        <section class = 'VInfo clearfix'></section>
                        <section class = 'VInfo clearfix'></section>
</body>

<footer class="SearchFooter">
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
</html>

