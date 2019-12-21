<?php

	session_start();

	require_once "/home/capstone/Auto/data_files/database.php";
    $_SESSION['timeout']=time();
	
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
				header("Location: logout.php");     
			
			}
        }
            
            




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="venders/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="venders/css/grid.css">
        <!-- <link rel="stylesheet" type="text/css" href="venders/css/ionicons.min.css"> -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="venders/css/animate.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <title>93 Grand Auto Group</title>
    </head>

    <body>


        <header>
            <nav>
                <div class="row">
                    <img src="resources/img/logo.png" alt="93 logo" class="logo">
                    <img src="resources/img/logo - Copy.png" alt="93 logo black" class="logo-black">

                    <ul class="main-nav">
                        <?php echo"<li><a href='UserAccount/UserInfo.php'>Welcome, $result1 $result2</a></li>"; ?>                     
                        <li><a href="WebFunction/Shop.html">Shop</a></li>
                        <li><a href="WebFunction/Sell.html">Sell</a></li>
                        <li><a href="#improve">Feedback</a></li>
                        <li><a href="logout.php">Logout</a></li>                    
                    </ul>
                </div>
            </nav>


            <div class="head-text-box">
                <h1>Welcome to 93 Grand Auto Group,<br>where the customer always comes FIRST!</h1>
                <a class = "btn btn-full js--scroll-to-summary" href="#">About Us</a>
                <a class = "btn btn-ghost js--scroll-to-location" href="#">Find Us</a>
            </div>

        </header>

        <!-- icon from https://ionicons.com/ -->

        <section class="About-Us js--About-Us">
            <div class="row">
                <h2>This is us &mdash; 93 Grand Auto Group</h2>
                <p class="summary">
                    Founded in 2019, we are two friends who quite love cars and motorcycles. We are committed to sharing our passions for the most desirable exotic motors with clients around the world.
                </p>
            </div>

            <div class="row">
                <div class="col span-1-of-3 box">
                    <i class="icon ion-ios-ribbon icon-big"></i>
                    <h3>Company Summary</h3>
                    <p>
                        93 Grand Auto Group LLC is registered as a limited-liability corporation. The owner and co-founder have over 2 years of combined experience in new and used auto sales. We will continue to develop our excellent working relationship with local dealers and auctions to bring the savings to the customer.  
                    </p>
                </div>

                <div class="col span-1-of-3 box">
                    <i class="icon ion-md-flag icon-big"></i>
                    <h3>Our Mission</h3>
                    <p>
                        To create the our motors-clultures with our passions.
                        <br>To earn the trust of our customers with honesty and style.
                        <br>To connect the world to their dream cars easily.
                    </p>
                </div>

                <div class="col span-1-of-3 box">
                    <i class="icon ion-md-walk icon-big"></i>
                    <h3>Compatitive Comparison</h3>
                        <p>
                            Quality inventory, backed by an excellent warranty, for a competitive price.
                            <br>A highly-experienced sales staff with a mission to serve the customers by making the necessary purchase of a vehicle an enjoyable experience with unmatched customer satisfaction.
                            <br>A very thorough inspection process to avoid selling any "lemons."
                        </p>
                </div>
                
            </div>
        

        </section>

        
        <section class="location js--location">
            <div>
                <h2>Find Us Here!</h2>
            </div>
            

            <div class="row">
                    <div class="col span-1-of-2 box">
                        <h3><span style="font-size: 150%">Address:</spam></h3>
                            <p class="address">
                            <br>640 Central Ave S
                            <br>Kent, WA 98032
                            <br>(206) 889-0983<br>
                            </p>
                            <img src="resources/img/QRcode.jpg" alt="QRcode" style="width: 300px; height:300px">

                    </div>

                    <div class="col span-1-of-2 box">
                        <h3><span style="font-size: 150%">Map</span></h3>
                        <p>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10807.50237974972!2d-122.2297144!3d47.3753465!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x83d1e9ce11af4d70!2s93%20Grand%20Auto%20Group!5e0!3m2!1sen!2sus!4v1569283238202!5m2!1sen!2sus" width="500" height="425" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </p>

                    </div>
    
            </div>

        </section>

   

       

        

        <section class="picture">
            <ul class="showcase clearfix">
                <li>
                    <figure class="photo">
                        <img src="resources/img/1.jpg" alt="pic1">
                    </figure>
                </li>

                <li>
                    <figure class="photo">
                        <img src="resources/img/2.jpg" alt="pic2">
                    </figure>
                </li>

                <li>
                    <figure class="photo">
                        <img src="resources/img/3.jpg" alt="pic3">
                    </figure>
                </li>

                <li>
                    <figure class="photo">
                        <img src="resources/img/4.jpg" alt="pic4">
                    </figure>
                </li>
            </ul>

            <ul class="showcase clearfix" >
                <li>
                    <figure class="photo">
                        <img src="resources/img/5.jpg" alt="pic5">
                    </figure class="photo">
                </li>

                <li>
                    <figure class="photo">
                        <img src="resources/img/6.jpg" alt="pic6">
                    </figure>
                </li>

                <li>
                    <figure class="photo">
                        <img src="resources/img/7.jpg" alt="pic7">
                    </figure>
                </li>

                <li>
                    <figure class="photo">
                        <img src="resources/img/8.jpg" alt="pic8">
                    </figure>
                </li>
            </ul>
        </section>

        <section class="customer">
            <div class="row">
                <h2>Our customers cannot live without us</h2>
            </div>
           

            <div class="row">
                <div class="col span-1-of-3">
                    <blockquote>
                            Reasonable price, high quality service, superior vehicles and motorcycles.
                        <cite><img src="resources/img/customer-1.jpg">Peter Wang</cite>
                    </blockquote>
                </div>

                <div class="col span-1-of-3">
                        <blockquote>
                            Best auto company for qualified vehicles which also has the best service !
                            <cite><img src="resources/img/customer-2.jpg">Ziling Xie</cite>
                        </blockquote>
                </div>

                <div class="col span-1-of-3">
                        <blockquote>
                                Reasonable price, high quality service, superior vehicles and motorcycles. I will definitely recommend this car dealer to friends who want to buy satisfying vehicles and motorcycles. 
                                <cite><img src="resources/img/customer-3.jpg">Xinyu and Z</cite>
                        </blockquote>
                </div>
            </div>

        </section>


        <section class="form" id="improve">
            <div class="row">
                <h2>We are happy to hear from you</h2>
            </div>

            <div class="row">
                <form action="WebFunction/feedback.php" method="POST" class="contact-form">
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="name">Name</label>

                        </div>

                        <div class="col span-2-of-3">
                            <input class="name" type="text" name="name" id="name" placeholder="Your name" required>

                        </div>
                    </div>

                    <div class="row">
                            <div class="col span-1-of-3">
                                <label for="email">Email</label>
                            </div>
    
                            <div class="col span-2-of-3">
                                <input class="email" type="email" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>

                        <div class="row">
                                <div class="col span-1-of-3">
                                    <label>What language do you speak?</label>
                                </div>
        
                                <div class="col span-2-of-3">
                                    <select name="language" id="language">
                                        <option value="English" selected>English</option>
                                        <option value="Spanish">Spanish</option>
                                        <option value="Chinese">Chinese</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col span-1-of-3">
                                        <label>Newsletter?</label>
                                    </div>
            
                                    <div class="col span-2-of-3">
                                        <input type="checkbox" name="news" id="news" checked>Yes, please.
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col span-1-of-3">
                                            <label for="message">Drop us a line</label>
                                        </div>
                
                                        <div class="col span-2-of-3">
                                            <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col span-1-of-3">
                                                <label>&nbsp;</label>
                                            </div>
                    
                                            <div class="col span-2-of-3">
                                                <input type="submit" name="submit" value="Send it!">
                                            </div>
                                    </div>
                </form>

            </div>
        </section>

        <footer>
                <div class="row">
                    <div class="col span-1-of-2">
                        <ul class="footer-nav">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">iOS App</a></li>
                            <li><a href="#">Android App</a></li>
                        </ul>
                    </div>
                    <div class="col span-1-of-2">
                        <ul class="social-links">
                            <li><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
                            <li><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
                            <li><a href="#"><i class="icon ion-logo-googleplus"></i></a></li>
                            <li><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
           
            </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
        <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
        <script src="venders/js/jquery.waypoints.min.js"></script>
        <script src="resources/js/script.js"></script>

    </body>
</html>

