<?php
session_start();
echo "<!DOCTYPE html>";
echo "<HTML><BODY><table>";
require_once "/home/capstone/Auto/data_files/database.php";


$email = $_POST["email"];
$_email = dbescape($email);
$pwd = $_POST["pwd"];
$message1 = "";
$message2 = "";
$message3 = "";
$check1 = 2;
$check2 = 2;
$check3 = 2;
$finalcheck = 0;

$query1="SELECT * FROM Employee WHERE Email='$_email'";
$result1=dbquery($query1);
if ($result1->num_rows==0){
    $message1 = "Email Not Found";
    $check1 = 0;
}
else{

    $check1 = 1;
}



$query2="SELECT * FROM Employee WHERE Email='$_email'";
$check2=dbquery($query2);
$fetch2= $check2->fetch_object();
$result2=$fetch2->Password;


if($result2 != $pwd){
    $message2 = "Password Incorrect";
    $check2 = 0;
}

else{

    $check2 = 1;
}




if($check1 == 1 and $check2 == 1){
    
    $finalcheck = 1;
    $_SESSION['eemail'] = $_email;
    $_SESSION['esuccess'] = 'You are logged in.</br>';
     
    header('location: Mainpage.php');
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
                <title>Login Failed</title>
            </head>

    <body>
        <header>
                <nav>
                        <div class="row">
                            <img src="..//resources/img/logo.png" alt="93 logo" class="logo">
                            <img src="..//resources/img/logo - Copy.png" alt="93 logo black" class="logo-black">
        
                            
                        </div>
                    </nav>

					<?php 
				
                    echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>$message1</p>";
                   
                    echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>$message2</p>";
                    echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>$message3</p>";
                    echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>Please login again, heading to Homepage...</p>";

                        header( "refresh:2;url=http://weblab.salemstate.edu/~Auto/93Web/Employee/EmpLogin.html" );
            
					

                    ?>
                  
</header>
</body>
</html>