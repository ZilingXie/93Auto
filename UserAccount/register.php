<?php
	echo "<!DOCTYPE html>";
    echo "<HTML><BODY><table>";
	require_once"/home/capstone/Auto/data_files/database.php";
			
		
		$email = $_POST["email"];
		$_email = dbescape($email);
		$lname = $_POST["lname"];
		$_lname = dbescape($lname);
		$fname = $_POST["fname"];
		$_fname = dbescape($fname);
		$cell = $_POST["cell"];
		$_cell = dbescape($cell);
		$pwd1 = $_POST["pwd1"];
		$_pwd1 = dbescape($pwd1);
		$pwd2 = $_POST["pwd2"];
		$_pwd2 = dbescape($pwd2);
		
	if(!ctype_alnum($_lname))die("Invalid Last Name");
	if(!ctype_alnum($_fname))die("Invalid First Name");
	
	
	// $_email = "ASD";
	// $_lname = "Ziling";
	// $_fname = "Xie";
	// $_cell = "";
	// $_pwd1 = "123";
	// $_pwd2 = "123";
	
	if($_pwd1 != $_pwd2) die ("Password not match");
	
	$_pwd = $_pwd1;
	
	$check1="SELECT * FROM Users WHERE email='$_email'";
	$result1=dbquery($check1);
    if ($result1->num_rows!=0)die("Email Address already in use!");	
	
	
		$j=passhash($_pwd);
		$t=time();
		$date=date("Y-m-d",$t);
		
		$validcheck = validhash($_email);
		
		
		
		if(is_null($_cell) || empty($_cell)){
			
			$_cell = "0";
			
		}
		
		
		
		$query1 = "INSERT INTO Users SET Email = '$_email', Password = '$j',lname='$_lname', fname = '$_fname',CreateDate = '$date', Cell='$_cell', Verified = '$validcheck'";
		
			$result = dbquery($query1); 
		
		echo("Verification Message: ");
	
		
		$verify1 = "SELECT * FROM Users WHERE Email = '$_email'";
		$verify2= dbquery($verify1);
		$verify3= $verify2->fetch_object();
		$uid=$verify3->U_ID;

	
		mail1($_email,$uid,$validcheck);
	
	  function mail1($email,$uid,$emailcheck)
	  {
		  
		  
		  $theurl = "http://weblab.salemstate.edu/~Auto/93Web/UserAccount/verification.php?userid=$uid&validate=$emailcheck";
		  mail($email, "Verification Link", $theurl,"Click this link for verification");
		  
		  header("Location:registershow.php");     
	  }
		  
		 
		  
		  
	
	function passhash ($password){
                
                    $salt = base64_encode (openssl_random_pseudo_bytes (17));
                    $salt = '$2y$07$' . str_replace ('+', '.', substr ($salt, 0, 22));
                    $hash = crypt ($password, $salt);
                    return $hash;
                }
				
	function validhash ($_uname){
                
                    $salt = base64_encode (openssl_random_pseudo_bytes (17));
                    $salt = '$2y$07$' . str_replace ('+', '.', substr ($salt, 0, 22));
                    $hash = crypt ($_uname, $salt);
                    return $hash;
                }
	echo "</form>";
	?>
