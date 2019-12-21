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
		
		$query1="SELECT * FROM Users WHERE Email='$_email'";
		$result1=dbquery($query1);
		if ($result1->num_rows==0){
			$message1 = "Email Not Found";
			$check1 = 0;
		}
		else{
		
			$check1 = 1;
		}
		
		
		
		$query2="SELECT * FROM Users WHERE Email='$_email'";
		$check2=dbquery($query2);
		$fetch2= $check2->fetch_object();
		$result2=$fetch2->Password;
		
		$hash=passhash($pwd);
		$check=passtest($pwd,$result2);
		
		
		
		if($check==false){
			$message2 = "Password Incorrect";
			$check2 = 0;
		}
		
		else{
		
			$check2 = 1;
		}
		
		
		
		$query3 = "SELECT * FROM Users WHERE Email='$_email'";
		$check3= dbquery($query3);
		$fetch3= $check3->fetch_object();
		$result3=$fetch3->Verified;

		if($result3!=1){
			$message3 = "Not Verified";
			$check3 = 0;
		}
		else{
	
			$check3 = 1;
		}
		
		if($check1 == 1 and $check2 == 1 and $check3 == 1){
			
			$finalcheck = 1;
			$_SESSION['email'] = $_email;
			$_SESSION['success'] = 'You are logged in.</br>';
		 	
			header('location: ..//index.php');
		}
		//echo"<TR><TD>Please go to<a href='http://weblab.salemstate.edu/~S0315663/hw2/newmessage.php'><input type=button value='Message'></a>to send message.</TD></TR>";
		function passhash ($password){
                
                    $salt = base64_encode (openssl_random_pseudo_bytes (17));
                    $salt = '$2y$07$' . str_replace ('+', '.', substr ($salt, 0, 22));
                    $hash = crypt ($password, $salt);
                    return $hash;
                }
				
		 function passtest ($password, $passhash)
                {
                    if (strpos ($passhash, '$2y$07$') !== 0) return FALSE;
                    $salt = substr ($passhash, 0, 29);
                    $hash = crypt ($password, $salt);
                    return $hash == $passhash;
                }
	echo "</form></table>";
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
        
                            
                        </div>
                    </nav>

					<?php 
				
                    echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>$message1</p>";
                   
                    echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>$message2</p>";
                    echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>$message3</p>";
                    echo"<p style='text-align:center; font-size: 150%; font-weight: bold; color:#FFFFFF'>Please login again, heading to Homepage...</p>";

                    header( "refresh:2;url=http://weblab.salemstate.edu/~Auto/93Web/index.html" );
            
					

                    ?>
                  
</header>
</body>
</html>