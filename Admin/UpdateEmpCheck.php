<?php
	session_start();
    require_once "/home/capstone/Auto/data_files/database.php";
    
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
    $_SESSION['atimeout']=time();

    $eid = $_GET["eid"];


    $email = $_GET["email"];
    if(!empty($_GET['email'])){
        
        $query1 = "UPDATE Employee SET Email='$email' WHERE E_ID = '$eid'";
        $result1=dbquery($query1);
     }

    $lname = $_GET["lname"];
    if(!empty($_GET['lname'])){
       
        $query2 = "UPDATE Employee SET lname='$lname' WHERE E_ID = '$eid'";
        $result2=dbquery($query2);
    }

    $fname = $_GET["fname"];
    if(!empty($_GET['fname'])){
        $query3 = "UPDATE Employee SET fname='$fname' WHERE E_ID = '$eid'";
        $result3=dbquery($query3);
    }

    $ssn = $_GET["ssn"];
    if(!empty($_GET["ssn"])){
        $query4 = "UPDATE Employee SET SSN='$ssn' WHERE E_ID = '$eid'";
        $result4=dbquery($query4);
    }

    $salary = $_GET["salary"];
    if(!empty($_GET['salary'])){
        //echo"$salary"
        $query5 = "UPDATE Employee SET Salary='$salary' WHERE E_ID = '$eid'";
        $result5=dbquery($query5);
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
                <title>Employee Info Update</title>
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

                    <?php echo"<p style='font-weight: bold; color:#FFFFFF; text-align: center; font-size=10'>Update Submitted for Employee ID:$eid</p>" ?>
                    <?php echo"<p style='font-weight: bold; color:#FFFFFF; text-align: center; font-size=10'>Heading to homepage</p>" ?>
                    <?php header("refresh:2;url=http://weblab.salemstate.edu/~Auto/93Web/Admin/Admin.php");?>

</header>
</body>
</html>