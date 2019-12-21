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
            
            
        $resultcheck = 1;

    $lname = $_GET["lname"];

    $fname = $_GET["fname"];

    //$eid = $_GET["eid"];
    $eid = 2;

    $date = $_GET["date"];

    $action = $_GET["action"];

    $vid = $_GET["vid"];

    $uid = 0;

    $query1 = "SELECT * FROM Users WHERE lname = '$lname' AND fname = '$fname'";
    $res1 = dbquery($query1);
    $row=mysqli_fetch_row($res1);

    if(count($row)!=0){

        $uid = $row[0];
    }

    else{
        $uid = 0;
    }

    $query3 = "SELECT * FROM CarDisplay WHERE V_ID = '$vid'";
    $result3 = dbquery($query3);
    $row2 = mysqli_fetch_row($result3);

    if(count($row2)==0){
        $resultcheck = 0;
    }

    else{
        $query2 = "INSERT INTO TradeRecord (fname, lname, U_ID, E_ID, Date, Action, V_ID) VALUES ('$fname', '$lname', '$uid', '$eid', '$date', '$action','$vid')";

        $res2 = dbquery($query2);
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
                    </ul>
                </div>
            </nav>

                    <?php
                         if( $resultcheck == 0){

                            echo "<p style='font-weight: bold; color:#FFFFFF; text-align: center; font-size=7'>Please enter Vadid Vehicle ID!<p>
                            <section class = 'VInfo clearfix'></section>
                            <section class = 'VInfo clearfix'></section>
                            <section class = 'VInfo clearfix'></section>
                            <section class = 'VInfo clearfix'></section>
                            <section class = 'VInfo clearfix'></section>
                            <section class = 'VInfo clearfix'></section>
                            ";

                        }

                        else{
                            echo"<p style='font-weight: bold; color:#FFFFFF; text-align: center; font-size=7'>Insert Successful, heading to homepage</p>";
                        }

                        header( "refresh:2;url=http://weblab.salemstate.edu/~Auto/93Web/Employee/Mainpage.php");

                ?>
          
</header>
</body>
</html>