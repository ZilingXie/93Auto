
<?php

	session_start();
	echo "<!DOCTYPE html>";
    echo "<HTML><BODY><table>";
	require_once "/home/capstone/Auto/data_files/database.php";
				
				
				
			$email = $_POST["email"];
			$_email = dbescape($email);
		
			$pwd = $_REQUEST['pwd'];
			$password=passhash($pwd);
			
			if($_pwd1 != $_pwd2) die ("Password not match");

			$query1="SELECT * FROM Users WHERE Email='$_email'";
			$db1=dbquery($query1);
			$fetch1 = $db1->fetch_object();
			$result1=$fetch1->U_ID;
			
		
			$query2="UPDATE Users SET Password = '$password'  WHERE U_ID='$result1'";
			$db2=dbquery($query2);
		
			echo"Password updated";
		

		
		
		
		
			function passhash ($password){
                
                    $salt = base64_encode (openssl_random_pseudo_bytes (17));
                    $salt = '$2y$07$' . str_replace ('+', '.', substr ($salt, 0, 22));
                    $hash = crypt ($password, $salt);
                    return $hash;
                }
				
	echo "</form>";
?>