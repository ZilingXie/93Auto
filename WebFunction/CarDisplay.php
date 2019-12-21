<?php 
    require_once "/home/capstone/Auto/data_files/database.php";
    $vid = $_GET["vid"];

    $CarDisplayQuery = "SELECT * FROM CarDisplay WHERE V_ID = '$vid'";
    $CarInfoQuery = "SELECT * FROM CarInfo WHERE V_ID = '$vid'";

    $checkInfo = dbquery($CarInfoQuery);
    $checkDisplay = dbquery($CarDisplayQuery);

    $CarInfoRow=mysqli_fetch_row($checkInfo);
    $CarDisplayRow=mysqli_fetch_row($checkDisplay);

?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
        <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
        <script src="venders/js/jquery.waypoints.min.js"></script>
        <script src="resources/js/script.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="..//venders/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="..//venders/css/grid.css">
        <!-- <link rel="stylesheet" type="text/css" href="venders/css/ionicons.min.css"> -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="..//venders/css/animate.css">
        <link rel="stylesheet" type="text/css" href="..//resources/css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <title>Car Display</title>
    </head>
	<BODY>
        <header>
                <nav>
                    <div class="row">
                            <a><img src="..//resources/img/logo.png" alt="93 logo" class="logo" href="#"></a>
                            <ul class="main-nav">
                                <li><a href="..//index.php">Home</a></li>
                                <li><a href="Shop.html">Shop</a></li>
                                <li><a href="Sell.html">Sell</a></li>
        
                            </ul>
                    </div>
                </nav>

                   
                </header>

                <section class="Vtype clearfix">
                    <div>
                    <?php
                        echo"<h2><span style='color: #e67e22; margin-top:50px'>$CarDisplayRow[2] $CarDisplayRow[3] $CarDisplayRow[4]</span></h2>";
                    ?>
                    </div>
                    
        
                    <div class="row">

                        <div class="col span-1-of-2 box">
                            <?php
                                echo"<a href='#'><img class='CarImg' id='myImg' height='400px' width='400px' src='..//resources/CarPic/$CarDisplayRow[1]/$CarDisplayRow[3]/$CarDisplayRow[0].$CarDisplayRow[4]/main.jpg'></a>";
                            ?>
                                  <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <span class="close">×</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                            </div>  
                          
                            <?php
                               echo"<div class='images'>
                                <img height='400px' width='400px' id='coffee1' src='..//resources/CarPic/$CarDisplayRow[1]/$CarDisplayRow[3]/$CarDisplayRow[0].$CarDisplayRow[4]/main.jpg' onclick='changeImg'>
                                <img height='400px' width='400px' id='coffee2' src='..//resources/CarPic/$CarDisplayRow[1]/$CarDisplayRow[3]/$CarDisplayRow[0].$CarDisplayRow[4]/1.jpg' onclick='changeImg'>
                                <img height='400px' width='400px' id='coffee3' src='..//resources/CarPic/$CarDisplayRow[1]/$CarDisplayRow[3]/$CarDisplayRow[0].$CarDisplayRow[4]/2.jpg' onclick='changeImg'>
                                <img height='400px' width='400px' id='coffee4' src='..//resources/CarPic/$CarDisplayRow[1]/$CarDisplayRow[3]/$CarDisplayRow[0].$CarDisplayRow[4]/3.jpg' onclick='changeImg'>
                                <img height='400px' width='400px' id='coffee5' src='..//resources/CarPic/$CarDisplayRow[1]/$CarDisplayRow[3]/$CarDisplayRow[0].$CarDisplayRow[4]/5.jpg' onclick='changeImg'>
                                </div>
                               
                            "
                            ?>
                            <script>
                               
                            </script>                       
                            
                                                    
                        </div>


                        <div class="col span-1-of-2 Vshow">
                            
                            <div class="row">

                                <div class="col span-1-of-2 box">
                                   
                                    <p class="Attributes">Price</p>
                                </div>
            
                                <div class="col span-1-of-2 box">
                               
                                    <p class="Attributes">Miles</p>
                                </div>

                            </div>
                                

                            <div class="row Vrow">

                                <div class="col span-1-of-2 box">
                                <?php
                                    echo"<p class='Vdetail'>$$CarDisplayRow[6]</p>";
                                    ?>
                                   
                                </div>
                    
                                <div class="col span-1-of-2 box">
                                <?php
                                echo"<p class='Vdetail'>$CarDisplayRow[5]K Miles</p>";
                                    ?>
                                </div>

                            </div>

                            <div class="row">

                                    <div class="col span-1-of-2 box">
                                   
                                        <p class="Attributes">Year</p>
                                    </div>
                
                                    <div class="col span-1-of-2 box">
                                  
                                        <p class="Attributes">Manufatcure</p>
                                    </div>
    
                            </div>
                            
                                 
                            <div class="row Vrow">

                                    <div class="col span-1-of-2 box">
                                    <?php
                                    echo" <p class='Vdetail'>$CarDisplayRow[2]</p>";
                                    ?>
                                       
                                    </div>
                        
                                    <div class="col span-1-of-2 box">
                                    <?php
                                    echo"<p class='Vdetail'>$CarDisplayRow[3]</p>";
                                    ?>
                                        
                                    </div>
    
                            </div>

                                <div class="row">

                                        <div class="col span-1-of-2 box">
                                    
                                            <p class="Attributes">Accidents</p>

                                        </div>
                    
                                       
        
                                </div>
                                
                                     
                                <div class="row">
    
                                        <div class="col span-1-of-2 box">
                                            <?php
                                                echo"<p class='Vdetail'>$CarInfoRow[13]</p>";
                                            ?>
                                            
                                        </div>
                            
        
                                </div>
                        </div>   
                    
                </div>
                </section>


                <section class="Vkey clearfix">
                        <div>
                            <h2><span style="color: #e67e22; margin-top:50px">Features and Specifications</span></h2>
                        </div>

                        <div class="row">

                            <div class="col span-1-of-4 box">
                                <p class="Attributes">ExtereriorColor</p>
                                    <?php
                                        echo"<p class='Vdetail'>$CarInfoRow[1]</p>";
                                    ?>
                            
                            </div>

                            <div class="col span-1-of-4 box">
                                    <p class="Attributes">InteriorColor</p>
                                    <?php
                                    echo"<p class='Vdetail'>$CarInfoRow[2]</p>";
                                    ?>
                                    
    
                            </div>

                            <div class="col span-1-of-4 box">
                                    <p class="Attributes">Transmission</p>
                                    <?php
                                        echo"<p class='Vdetail'>$CarInfoRow[3]</p>";
                                    ?>
                                    
    
                            </div>

                            <div class="col span-1-of-4 box">
                                    <p class="Attributes">Drive</p>
                                    <?php
                                        echo"<p class='Vdetail'>$CarInfoRow[4]WD</p>";
                                    ?>
                                    
    
                            </div>

                        </div>

                        <div class="row">

                                <div class="col span-1-of-4 box">
                                    <p class="Attributes">Engine</p>
                                    <?php
                                        echo"<p class='Vdetail'>$CarInfoRow[5]L</p>";
                                    ?>
                                    
    
                                </div>
    
                                <div class="col span-1-of-4 box">
                                        <p class="Attributes">Cylinders</p>
                                        <?php
                                            echo"<p class='Vdetail'>$CarInfoRow[6]</p>";

                                        ?>
                                        
        
                                </div>
    
                                <div class="col span-1-of-4 box">
                                        <p class="Attributes">Horsepower</p>
                                        <?php
                                        echo"<p class='Vdetail'>$CarInfoRow[7] hp@$CarInfoRow[8]rpm</p>";
                                    ?>
                                       
        
                                </div>
    
                                <div class="col span-1-of-4 box">
                                        <p class="Attributes">Torque</p>
                                        <?php
                                        echo"<p class='Vdetail'>$CarInfoRow[9] torque@$CarInfoRow[10]rpm</p>";
                                    ?>
                                        
        
                                </div>
    
                            </div>

                            <div class="row">

                                    <div class="col span-1-of-4 box">
                                        <p class="Attributes">Camshaft</p>
                                        <?php
                                        echo"<p class='Vdetail'>$CarInfoRow[11]</p>";
                                    ?>
                                       
        
                                    </div>
        
                                    <div class="col span-1-of-4 box">
                                            <p class="Attributes">Engine Type</p>
                                            <?php
                                            echo"<p class='Vdetail'>$CarInfoRow[12]</p>";
                                    ?>
                                            
            
                                    </div>
        
                                   
        
                                </div>

                                
                                </div>              
                </section>
                <script>
                            
                               
                    
                    // Get the modal
                    var modal = document.getElementById('myModal');
                    
                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                    var img = document.getElementById('myImg');
                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    img.onclick = function(){
                      modal.style.display = "block";
                      modalImg.src = this.src;
                      captionText.innerHTML = this.alt;
                    }
                    
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    
                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() { 
                      modal.style.display = "none";
                    }


                    var cof11 = document.getElementById("coffee1")
                    cof11.onclick = function(){

                        var cof12 = document.getElementById("coffee1").getAttribute("src");

                        document.images["myImg"].src =cof12;

                    }

                    var cof21 = document.getElementById("coffee2")
                    cof21.onclick = function(){

                        var cof22 = document.getElementById("coffee2").getAttribute("src");

                        document.images["myImg"].src =cof22;

                    }

                    var cof31 = document.getElementById("coffee3")
                    cof31.onclick = function(){

                        var cof32 = document.getElementById("coffee3").getAttribute("src");

                        document.images["myImg"].src =cof32;

                    }

                    var cof41 = document.getElementById("coffee4")
                    cof41.onclick = function(){

                        var cof42 = document.getElementById("coffee4").getAttribute("src");

                        document.images["myImg"].src =cof42;

                    }

                    var cof51 = document.getElementById("coffee5")
                    cof51.onclick = function(){

                        var cof52 = document.getElementById("coffee5").getAttribute("src");

                        document.images["myImg"].src =cof52;

                    }
                    </script>
      
    </body>

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
    
</html>