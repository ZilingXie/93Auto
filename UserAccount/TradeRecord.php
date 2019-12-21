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
    
            
$query1 = "SELECT * FROM Users WHERE Email = '$email'";
$res1 = dbquery($query1);

$row1 = mysqli_fetch_row($res1);

$query2 = "SELECT * FROM TradeRecord WHERE U_ID = '$row1[0]'";
$res2 = dbquery($query2);
$rowcount = $res2 ->num_rows;
$row2 = mysqli_fetch_row($res2);



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
                          
         
                            <?php 
                            if($rowcount == 0){
                                echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>No Record Found</p>";
                            }

                            else{

                            for($i=1;$i<$rowcount+1;$i++){
                                $row2 = mysqli_fetch_row($res2);

                                $query3 = "SELECT * FROM CarDisplay WHERE V_ID = '$row2[7]'";
                                $res3 = dbquery($query3);
                                $row3 = mysqli_fetch_row($res3);

                                $query4 = "SELECT * FROM Employee WHERE E_ID = '$row2[4]'";
                                $res4 = dbquery($query4);
                                $row4 = mysqli_fetch_row($res4);
                                echo"  
                                <div class='row'>
                                    <h2><span style='color: #fff'>Trade Record $i</span></h2>
                                </div>

                                <div class='row'>
                                    <div class='col span-1-of-3'>
                                        <label for='date'>Date</label>
                    
                                    </div>
                    
                                    <div class='col span-2-of-3'>
                                        <p style='color: #fff'>$row[5]</p>
                    
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col span-1-of-3'>
                                        <label for='date'>Employee</label>
                
                                    </div>
                
                                    <div class='col span-2-of-3'>
                                        <p style='color: #fff'>$row4[3] $row4[4]</p>
                
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col span-1-of-3'>
                                        <label for='action'>Action</label>
            
                                    </div>
            
                                    <div class='col span-2-of-3'>
                                        <p style='color: #fff'>$row2[6]</p>
            
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col span-1-of-3'>
                                        <label for='vehicle'>Vehicle</label>
                
                                    </div>
                
                                    <div class='col span-2-of-3'>
                                        <p style='color: #fff'>$row3[3] $row4[4]</p>
                
                                    </div>
                                </div>";
                            }} ?>
                       
                        </section>
        </header>
    </body>
</html>