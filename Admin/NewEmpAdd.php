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
           
    $email = $_GET["email"];

    $lname = $_GET["lname"];

    $fname = $_GET["fname"];

    $ssn = $_GET["ssn"];

    $salary = $_GET["salary"];

    $a = rand(10000, 99999);

    $pwd = "$lname".$a."";

    $query1="INSERT INTO Employee(Email, Password, lname, fname, SSN, Salary) VALUES('$email','$pwd','$lname','$fname','$ssn','$salary')";
    $result1=dbquery($query1);

    $query2 = "SELECT * FROM Employee WHERE SSN='$ssn'";
    $result2 = dbquery($query2);
    $row=mysqli_fetch_row($result2);
    $eid=$row[0];

    $message = "Here is your onetime password: ". "\r\n" ."$pwd" . "\r\n" ."Please change your password once you logged in." . "\r\n" ."http://weblab.salemstate.edu/~Auto/93Web/Employee/EmpLogin.html";
        
    mail($email, "Account Setup", $message);
        

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
                <title>New Employee</title>
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

                    <h1>Please check the email!</h1>
</header>
</body>
</html>