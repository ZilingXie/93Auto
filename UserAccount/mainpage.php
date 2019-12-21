<?php

	session_start();
	
	// echo "<!DOCTYPE HTML>";
	// echo "<head><title>Home Page</title></head>";
	// echo "<HTML><BODY><TABLE>";
	
	
	// echo "<h1>This is the homepage!</h1>";
	require_once"/home/capstone/Auto/data_files/database.php";
	// echo "<p id='demo' onclick='myFunction()'>Click me to change my text color.</p>";

	
	if(isset($_SESSION['email'])&&isset($_SESSION['success'])){
		
			
		
				//echo $_SESSION['success'];
				//unset($_SESSION['success']);
				
				$query1="SELECT * FROM Users WHERE Email='{$_SESSION['email']}'";
				$check1=dbquery($query1);
				$fetch1= $check1->fetch_object();
				$result1=$fetch1->lname;
				$result2=$fetch1->fname;
		
				//echo $_SESSION['email'];
				//echo "Welcome ".$result1." ".$result2.".</br>";
			
			//echo "<form Action = "login.html" method="POST"/>";
			//echo "<TR><TD>       </TD><TD><INPUT TYPE = "submit" value="Submit"></TD</TR>";
			//echo "<button><a href = 'mainpage.php?logout=1'></a>Logout</button>";
	}
	
	else {
		
		
			$_SESSION['msg'] = "You must log in first to view this page";
			
			header("location: login.html");
		
	}
	
	if(isset($_GET['logout'])){
		
			session_destroy();
			unset($_SESSION['email']);
			header("location: login.html");
			
	}
	


		$inactive = 600;
	
		if( !isset($_SESSION['timeout']) ){
			$_SESSION['timeout'] = time() + $inactive; 

		$session_life = time() - $_SESSION['timeout'];
		}
		if($session_life > $inactive)
			{  	
				
				session_destroy(); 
				header("Location:login.html");     
			
			}

			$_SESSION['timeout']=time();
	// echo $_SESSION['email'];
	// echo $_SESSION['success'];

	// function myFunction(){
			// session_destroy();
			// unset($_SESSION['email']);
			// header("location: login.html");
	// }
	
	
	
	
	// if(isset($_SESSSION['email'])){
		
		// $email = $_SESSION['email'];
			
		
		
		// echo "<h3>Welcome<strong>$email</strong></h3>";
		
		 //echo "<button><a href = 'login.html?logout=1'>Logout</a></button>";
	
	// }
?>

<!DOCTYPE HTML>
<head><title>Home Page</title></head>
<HTML><BODY><TABLE>
	
	
<h1>This is the homepage!</h1>

<div><?php echo "Welcome ".$result1." ".$result2.".</br>"; ?></div>
<div><?php echo "<button><a href = 'login.html?logout=1'>Logout</a></button>"; ?></div>
<div><?php echo "<button><a href = 'CarRecord.php'>Car Record</a></button>"; ?></div>
<div><?php echo "<button><a href = 'CarInfo.php'>Car Info</a></button>"; ?></div>


	</table></body></html>