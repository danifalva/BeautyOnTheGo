<?php
	require('config.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
		$fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
	    $zip = $_POST['zip'];
		$phonenumber = $_POST['phonenumber'];
		$email = $_POST['email'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO `Technician` (username, fname, lname, address, city, state, zip, phonenumber, email, password, pic) VALUES ('$username', '$fname','$lname','$address','$city', '$state','$zip', '$phonenumber', '$email', '$password', 'images/default.jpg')";
        $result = mysqli_query($db, $query);
        if($result){
            $smsg = "Thanks for registering ! Please log in to continue creating your profile!";
        }else{
            $fmsg ="User Registration Failed";
        }
    }
    ?>






<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beauty On The Go - Register</title>

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
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="login.php">Login</a>
            </li>
			            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="register.php">Register</a>
			        <span class="sr-only">(current)</span>
            </li>
			
	    <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="contact.php">Contact</a>
            </li>
			
          </ul>
        </div>
      </div>
    </nav>
<div class="container" style="width:600px;">
    <div class="bg-faded p-4 my-4">

      <form class="form-signin" method="POST" <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Please Register</h2>
        <p>All fields are required!</p>
              	 <label for="inputUsername" >Username</label>
        <div class="input-group" >
	  <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
    	</div>
		   <label for="inputFname" >First Name</label>
        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
		
		<label for="inputLname" >Last Name</label>
        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
		
		<label for="inputAddress" >Address</label>
        <input type="text"  name="address" class="form-control" placeholder="Address" required>
		
		   <label for="inputCity" >City</label>
        <input type="text" name="city" class="form-control" placeholder="City" required>	

		   <label for="inputState">State</label>
        <input type="text" name="state" class="form-control" placeholder="State" required>	

		   <label for="inputZip" >Zip</label>
        <input type="text" name="zip" class="form-control" placeholder="Zip" required>	

		   <label for="inputNumber" >Phone Number</label>
        <input type="text" name="phonenumber"  class="form-control" placeholder="Phone Number  (ex. xxx-xxx-xxxx)" required>			
	
    <label for="inputEmail" >Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
       
	   <label for="inputPassword" >Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </br>
     	
	 <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
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