<?php

if(isset($_POST['search'])){
$valuetosearch = $_POST['zip'];

	if(isset($_POST['service'])){
		$serviceType = $_POST['service'];
		$query = "SELECT * FROM Technician JOIN Tech_Services ON Technician.username = Tech_Services.username JOIN Services ON Tech_Services.service = Services.serviceType WHERE Services.category='$serviceType' AND Technician.zip = '$valuetosearch' GROUP BY Technician.username";
	
		$search_result = filterTable($query);
}
else {
	
	$valuetosearch = $_POST['zip'];
	$query = "SELECT * FROM `Technician` WHERE `zip` LIKE '$valuetosearch'";
	//Queries the results
	$search_result = filterTable($query);
}

//else
//{
//	$query = "SELECT * FROM `Technician`";
//	$search_result = filterTable($query);
//}
}
function filterTable($query) {
	$connect = mysqli_connect("localhost", "bcs430w", "password", "BCS430W");
	$filter_Result = mysqli_query($connect, $query);
	return $filter_Result;
}



?>





<!--- Finsh PHP Database Code -->

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beauty On The Go - Search</title>

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

    <!-------------------------------------------------- Navigation ------------------------------------------------------------>
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
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="search.php">Search</a>
			  <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item px-lg-4">
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
    
    <!-------------------------------------------- Nav Finish --------------------------------------------->
<div class="container">
    <div class="bg-faded p-4 my-4">

	
	<!-- Place search form in here -->
	
	<form action="search.php" method="post">
	<!--- Header --->
	<h2 class="text-center text-lg text-uppercase my-0">Search Technician
        </h2>
	
	
	<!--- Search Options --->
	  

	 
	<div class="row">  
            <div class="form-group col-lg-4">
              <label for="inputZip" class="text-heading">Zip Code</label>
              <input type="text" name="zip" class="form-control" required>
            </div>
            
            <div style="padding-top: 40px; padding-left: 20px; padding-right: 30px;"><input type="radio" name="service" value="hair"> Hair<br></div>
  	    <div style="padding-top: 40px; padding-right: 30px;"><input type="radio" name="service" value="nails"> Nails<br></div>
  	    <div style="padding-top: 40px; padding-right: 30px;"><input type="radio" name="service" value="makeup"> Makeup<br></div>        
            <div style="padding-top: 40px; padding-right: 30px;"><input type="radio" name="service" value="massage"> Massage<br></div>  
            <div style="padding-top: 40px; padding-right: 30px;"><input type="radio" name="service" value="facial"> Facial<br></div> 
           
           <div class="form-group col-lg-12">
              <input type="submit" name="search" value="Search"><br><br>
            </div>
           
           </div>
	
	
	<!------------------------------ search table ------------------------------>
 	
	<table class="w3-table w3-striped" WIDTH="100%" CELLPADDING="10" CELLSPACING="5" ALIGN="CENTER">
		
		<tr>
			<th>Profile</th>
			<th>Technician Name</th>
		
		</tr>
		
		<?php while($row = mysqli_fetch_array($search_result)):?>
		<tr>		
			<td><?php echo $row['username'];?></td>
			<td><?php echo $row['fname']; echo ' '; echo $row['lname'];?></td>
			<td><a href="http://beautyonthego.xyz/BeautyOnTheGo/profile.php?varname=<?php echo $row['username'] ?>">Click here to view profile</a></td>
	
		</tr>
		<?php endwhile;?>	
		
		
	<table>
	
	
	
	
	</form>
	
	
	
	
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