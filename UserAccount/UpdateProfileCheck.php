<?php
	session_start();
    require_once "/home/capstone/Auto/data_files/database.php";
    
	if(isset($_SESSION['email'])&&isset($_SESSION['success'])){
			
        $query1="SELECT * FROM Users WHERE Email='{$_SESSION['email']}'";
        $check1=dbquery($query1);
        $fetch1= $check1->fetch_object();
        $result1=$fetch1->lname;
        $result2=$fetch1->fname;

}

else {


    
    header("location: index.html");

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
    $_SESSION['timeout']=time();

    $uid = $_GET["uid"];




    $lname = $_GET["lname"];
    if(!empty($_GET['lname'])){
       
        $query2 = "UPDATE Users SET lname = '$lname' WHERE U_ID = '$uid'";
        $result2=dbquery($query2);
    }

    $fname = $_GET["fname"];
    if(!empty($_GET['fname'])){
        $query3 = "UPDATE Users SET fname = '$fname' WHERE U_ID = '$uid'";
        $result3=dbquery($query3);
    }

    $cell = $_GET["cell"];
    if(!empty($_GET["cell"])){
        $query4 = "UPDATE Users SET Cell = '$cell' WHERE U_ID = '$uid'";
        $result4=dbquery($query4);
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

                    <?php echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>Update Submitted!</p>";
                    header( "refresh:5;url=http://weblab.salemstate.edu/~Auto/93Web/UserAccount/UserInfo.php" ); 
                    ?>
                  
</header>
</body>
</html>