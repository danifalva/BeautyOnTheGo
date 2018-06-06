<?php
session_start();

require('config.php');

$username = $_GET['varname'];

$query = "SELECT fname, lname, address, city, state, zip, email, bio, pic FROM Technician WHERE username = '$username'";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$address = $row["address"];
	$city = $row["city"];
	$state = $row["state"];
	$zip = $row["zip"];
	$bio = $row["bio"];
	$pic = $row["pic"];
	$email = $row["email"];
	$fname= $row["fname"];
	$lname= $row["lname"];
	}


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beauty On The Go - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.css" rel="stylesheet">


  </head>

  <body>

    <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">Beauty On The Go</div>
    <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">Salon Services From The Comfort Of Home</div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-faded py-lg-4">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Beauty On The Go</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
             <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php">Home
              </a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="search.php">Search</a>
            </li>
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="login.php">Login</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="register.php">Register</a>
            </li>
            
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="contact.php">Contact</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
<div class="container" style="">
    <div class="bg-faded p-4 my-4" >

       
       

            <h1>Profile</h1>
  	<hr>

	
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
  	<?php
        echo "<img src='$pic'><br><br>";
        
        echo "<h4><strong>About Me:</strong></h4>";
        
        echo $bio;
	?>
    </div>

    <div class="col-sm-9">
    		<?php
       		 echo "<center><h3><strong>Welcome to $username's profile!</strong></h3></center><br>";
		?>
       	  <div class="row content" style="padding-left: 4em;">
       	      	<?php
       		 echo "<h5>Name:</h5>&nbsp;$fname $lname";
		?>
 	  </div>

       	  <div class="row content" style="padding-left: 4em;">
       	      	<?php
       		 echo "<h5>Address:</h5>&nbsp;$address, $city, $state, $zip";
		?>
 	  </div>

 	  <div class="row content" style="padding-left: 4em;">
       	      	<?php
       		 echo "<h5>Email:</h5>&nbsp;$email<br>";
		?>
 	  </div>
 	  
 	  <br>
 	  <div class="row content" style="padding-left: 4em;">
       	         <h4><strong>Services Offered</strong></h4>
       	  </div>
       	  
 	  <div class="row content" style="padding-left: 4em;">
          	<?php
          		$query = "SELECT service, cost, category FROM Tech_Services JOIN Services ON Services.serviceType=Tech_Services.service WHERE username='$username' ORDER BY category, service";
			$result = mysqli_query($db, $query);
		

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$service= $row["service"];
				$cost = $row["cost"];
				echo "$service: $ $cost<br>";
			}        
		  		
          		?>
 	  </div>

	<br>
 	  <div class="row content" style="padding-left: 4em;">
       	         <h4><strong>Book Appointment</strong></h4>
       	  </div>
       	  
       	  <div class="row content" style="padding-left: 4em;">
       	         <form action=''>
       	         <label>Choose Date:&nbsp;</label><input type="date" name="appointment_date"><br><br>
       	         <input type="submit" name="checkdate" value="Check Date Availability" style="padding-left: 2em; padding-right: 2em;"><br><br>
       	         </form>
       	  </div>
       	  
       	  <div class="row content" style="padding-left: 4em;">
       	         <form action=''>
       	         <label>Choose Time:&nbsp;</label><select> </select><br><br>
       	         </form>
       	  </div>
       	  
       	  
       	  <div class="row content" style="padding-left: 4em;">
       	         <form action=''>
       	         <label>Choose Service:&nbsp;</label>
       	         <select> 
       	          <?php
          		$query = "SELECT service, cost, category FROM Tech_Services JOIN Services ON Services.serviceType=Tech_Services.service WHERE username='$username' ORDER BY category, service";
			$result = mysqli_query($db, $query);
		

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$service= $row["service"];
				$cost = $row["cost"];
				echo "<option value='$service'>$service</option>";
			}        
		  		
          		?>
       	         </select><br><br>
       	         
       	         <div class="row content" style="padding-left: 1em;">
       	         <label  style="padding-right: 1em;">First Name:</label>
       	         <input type="text" name="name"  placeholder="required" prequired="required" data-error="Firstname is required.">
       	         </div>
       	         
       	         <div class="row content" style="padding-left: 1em; padding-top: 1em;">
       	         <label  style="padding-right: 1em;">Last Name:</label>
       	         <input type="text" name="surname"  placeholder="required" prequired="required" data-error="Lastname is required.">
       	         </div>
       	         
       	         <div class="row content" style="padding-left: 1em; padding-top: 1em;">
       	         <label  style="padding-right: 3em;">Phone:</label>
       	         <input type="text" name="phone"  placeholder="required" prequired="required" data-error="Phonenumber is required.">
       	         </div>
       	         
       	         <div class="row content" style="padding-left: 1em; padding-top: 1em;">
       	         <label  style="padding-right: 3.5em;">Email:</label>
       	         <input type="text" name="email"  placeholder="required" prequired="required" data-error="email is required.">
       	         </div>
       	         
       	         
       	         <div class="form-group col-lg-12" style="padding-top: 2em; padding-left: 3em;">
             	 <input type="submit" name="book" value="Book Now" style="padding-left: 2em; padding-right: 2em;"><br><br>
            	 </div>
       	         
       	         </form>
       	  </div>
       	  
       	  
       	  
      	  <div class="row content" style="padding-left: 4em;">
       	  <?php 
       	  //Function which returns day of the week 0-6 , used for finding when technician is available that day
       	  function getWeekday($date1) {
   		 return date('w', strtotime($date1));
	   }
		//echo getWeekday('2012-10-11');
	
	  if(isset($_POST['apptimes'])){
	 	 if(isset($_POST['appointment_date'])){
			$date = $_POST['appointment_date'];
			echo getWeekday($date);
		}
	  }
		//$query = "SELECT * FROM Technician JOIN Tech_Services ON Technician.username = Tech_Services.username JOIN Services ON Tech_Services.service = Services.serviceType WHERE Services.category='$serviceType' AND Technician.zip = '$valuetosearch' GROUP BY Technician.username";
	
		//$search_result = filterTable($query);
		?>
	</div>



    </div>
  </div>
</div>




	
	
	

	</div>
</div>
    <!-- /.container -->

    <footer class="bg-faded text-center py-5">
      <div class="container">
        <p class="m-0">Copyright &copy; Beauty On The Go 2017</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Zoom when clicked function for Google Map -->
    <script>
      $('.map-container').click(function () {
        $(this).find('iframe').addClass('clicked')
      }).mouseleave(function () {
        $(this).find('iframe').removeClass('clicked')
      });
    </script>

  </body>

</html>