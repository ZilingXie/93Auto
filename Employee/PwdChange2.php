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
               
$pwd1 = $_POST['pwd1'];
$pwd2 = $_POST['pwd2'];
$pwd3 = $_POST['pwd3'];
$email = $_SESSION['email'];
$message = "";

$query1 = "SELECT * FROM Employee WHERE Email = '$email' AND Password = '$pwd1'";
$res1 = dbquery($query1);
$row = mysqli_fetch_row($res1);

if(count($row)==0){
    $message = "Current Password Wrong";
}

else{
    if($pwd2 != $pwd3){
        $message = "New Password Does Not Match";
    }

    else{
        $query2 = "UPDATE Employee SET Password = '$pwd2' WHERE Email = '$email'";
        $res2 = dbquery($query2);
        $message = "Update Successful!";
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
                <title>Password Change</title>
            </head>

    <body>
        <header>
                <nav>
                        <div class="row">
                            <img src="..//resources/img/logo.png" alt="93 logo" class="logo">
                            <img src="..//resources/img/logo - Copy.png" alt="93 logo black" class="logo-black">
        
                            <ul class="main-nav">
                                <li><a href="Admin.php">Employee Home</a></li>
                                <?php echo"<li><a href='#'>$result1 $result2</a></li>"; ?>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>

                    <?php 
                    echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>$message</p>";
                    if($message == "Update Successful!"){
                        echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>Please Login Again!</p>";

                        header( "refresh:5;url=http://weblab.salemstate.edu/~Auto/93Web/Employee/logout.php" );
                    }

                    else{
                        header( "refresh:5;url=http://weblab.salemstate.edu/~Auto/93Web/Employee/PwdChange.php" );

                    }
                    
                    
                    ?>
                  
</header>
</body>
</html>