<?php
session_start();

$username = $_SESSION['username'];

require('config.php');
include('editProfile_action.php');




$query = "SELECT address, city, state, zip, bio, pic FROM Technician WHERE username = '$username'";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$address = $row["address"];
	$city = $row["city"];
	$state = $row["state"];
	$zip = $row["zip"];
	$bio = $row["bio"];
	$pic = $row["pic"];
	
	}


?>


<!DOCTYPE html>
<html lang="en">

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
<style>
.left_column
{
float:left;
width: 30%;
padding: 20px;  
}

.middle_column
{
float:left;
width: 30%;
padding: 20px;          
}

.right_column
{
float:left;
width: 35%;
padding: 20px;
}

#mysubmitbutton {
position: relative;
bottom: 20px;
right: 20px;
}


</style>


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
    
    
    
<div class="container">
    <div class="bg-faded p-4 my-4">
    
               <form  method='post' action='editProfile_action.php'>
                 <div class="bg-faded p-4 my-4"><?php echo $msg;?></div>
             </form>
    
      <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->

<?php
if (isset($_POST['pic']))		$pic = trim($_POST['pic']);				else $pic = NULL;
if(isset($_POST['upload'])){
include('upload.php');
	
		list($rc, $pic) = upload('pic', 'images/', $username,  $extns, 1000000000);
		if($rc != 0)
		echo "Message: $pic<br>    $pic";

		$query4 = "UPDATE Technician SET pic= '$pic' WHERE username = '$username'";
		$result = mysqli_query($db, $query4);	
				list($a, $b, $c) = image_resize($pic, 250, 250);
	

}
 $query5 = "SELECT pic FROM Technician WHERE username= '$username'";
	$result5 = mysqli_query($db, $query5);
	$row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC);
	$picture = $row5['pic'];
	
     echo" <div class='col-md-3'>
        <div class='text-center'>
          <img src='$picture'>
          <h6>Upload a different photo...</h6>
          <form method='post' action='editProfile.php' enctype='multipart/form-data'>
          <input type='file' class='form-control' name='pic' value='$pic'>
          <input type='submit' name='upload' value='Upload'>
          </form>
        </div>
      </div>"
     ?>
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" method='post' action='' role="form">
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Address:</label>
                    <input id="form_name" type="text" name="address" class="form-control" value="<?php echo $address ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>City:</label>
                    <input id="form_lastname" type="text" name="city" class="form-control" value="<?php echo $city?>">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>State:</label>
                    <input id="form_email" type="text" name="state" class="form-control" value="<?php echo $state?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Zip:</label>
                    <input id="form_phone" type="text" name="zip" class="form-control" value="<?php echo $zip?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Bio:</label>
                    <textarea name="bio" class="form-control" rows="4"><?php echo $bio?></textarea>
    
                </div>
            </div>
        </div>
        <br>
        <br>
        <div>
        
        <h3>Available Times</h3>
        <table style="width:100%">
  <tr>
    <th>Sunday</th>
    <th>Monday</th> 
    <th>Tuesday</th>
    <th>Wednesday</th>
    <th>Thursday</th>
    <th>Friday</th>
    <th>Saturday</th>
  </tr>
  
  <?php

         		$querySun = "SELECT Hour FROM Times WHERE Day = '0' ORDER BY RowID ASC";
			$resultSun = mysqli_query($db, $querySun);
			while ($rowSun = mysqli_fetch_array($resultSun, MYSQLI_ASSOC)) {
				$time= $rowSun["Hour"];
				
				$queryAvailSun = "SELECT * FROM Tech_Availability WHERE TechID='$username' AND Day = '0' AND Hour = '$time'";
				$resultAvailSun = mysqli_query($db, $queryAvailSun);
				$rowAvailSun = mysqli_fetch_array($resultAvailSun, MYSQLI_ASSOC);
				if($rowAvailSun)
					$checkSun = 'checked';
				else{
					$checkSun = '';
				}

				$queryAvailMon = "SELECT * FROM Tech_Availability WHERE TechID='$username' AND Day = '1' AND Hour = '$time'";
				$resultAvailMon = mysqli_query($db, $queryAvailMon);
				$rowAvailMon = mysqli_fetch_array($resultAvailMon, MYSQLI_ASSOC);
				if($rowAvailMon)
					$checkMon = 'checked';
				else{
					$checkMon = '';
					}
					
				$queryAvailTues = "SELECT * FROM Tech_Availability WHERE TechID='$username' AND Day = '2' AND Hour = '$time'";
				$resultAvailTues = mysqli_query($db, $queryAvailTues);
				$rowAvailTues = mysqli_fetch_array($resultAvailTues, MYSQLI_ASSOC);
				if($rowAvailTues)
					$checkTues = 'checked';
				else{
					$checkTues = '';
					}
					
				$queryAvailWed = "SELECT * FROM Tech_Availability WHERE TechID='$username' AND Day = '3' AND Hour = '$time'";
				$resultAvailWed = mysqli_query($db, $queryAvailWed);
				$rowAvailWed = mysqli_fetch_array($resultAvailWed, MYSQLI_ASSOC);
				if($rowAvailWed)
					$checkWed = 'checked';
				else{
					$checkWed = '';
					}
					
				$queryAvailThur = "SELECT * FROM Tech_Availability WHERE TechID='$username' AND Day = '4' AND Hour = '$time'";
				$resultAvailThur = mysqli_query($db, $queryAvailThur);
				$rowAvailThur = mysqli_fetch_array($resultAvailThur, MYSQLI_ASSOC);
				if($rowAvailThur)
					$checkThur = 'checked';
				else{
					$checkThur = '';
					}
					
				$queryAvailFri = "SELECT * FROM Tech_Availability WHERE TechID='$username' AND Day = '5' AND Hour = '$time'";
				$resultAvailFri = mysqli_query($db, $queryAvailFri);
				$rowAvailFri = mysqli_fetch_array($resultAvailFri, MYSQLI_ASSOC);
				if($rowAvailFri)
					$checkFri = 'checked';
				else{
					$checkFri = '';
					}

				$queryAvailSat = "SELECT * FROM Tech_Availability WHERE TechID='$username' AND Day = '6' AND Hour = '$time'";
				$resultAvailSat = mysqli_query($db, $queryAvailSat);
				$rowAvailSat = mysqli_fetch_array($resultAvailSat, MYSQLI_ASSOC);
				if($rowAvailSat)
					$checkSat = 'checked';
				else{
					$checkSat = '';
					}
					
				echo "<tr> 
				<td><input type='checkbox' name='sunday[]' value='$time'  $checkSun>$time</td>
				<td><input type='checkbox' name='monday[]' value='$time'  $checkMon>$time</td>
				<td><input type='checkbox' name='tuesday[]' value='$time'  $checkTues>$time</td>
				<td><input type='checkbox' name='wednesday[]' value='$time'  $checkWed>$time</td>
				<td><input type='checkbox' name='thursday[]' value='$time'  $checkThur>$time</td>
				<td><input type='checkbox' name='friday[]' value='$time'  $checkFri>$time</td>
				<td><input type='checkbox' name='saturday[]' value='$time'  $checkSat>$time</td>
								
				</tr>";
			}
			
  
  
  ?>
</table>
        
        
        </div>
<br><br>
<h3>Services</h3>
	<div class="container">
          	<div class="left_column">
          		<h3><strong>Hair</strong></h3>
          		<?php
          		$query2 = "SELECT serviceType FROM Services WHERE category= 'hair'";
			$result2 = mysqli_query($db, $query2);
			while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
				$service= $row2["serviceType"];
				
				$query3 = "SELECT cost FROM Tech_Services WHERE username='$username' AND service='$service'";
				$result3 = mysqli_query($db, $query3);
				$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
				$cost = $row3["cost"];
				if($cost != null)
					$check = 'checked';
				else{
					$check = '';
					$cost = 0;
					}
				echo " <div><input type='checkbox' name='checkbox[]' value='$service'  $check>$service</div>
					<label>Cost: $</label><input type='number' style='width:80px;' name='number[]' value='$cost'><br><br>";
			}          		
          		?>
          </div>
 

          	<div class="middle_column">
                 		<h3><strong>Nails</strong></h3>
          		<?php
          		$query2 = "SELECT serviceType FROM Services WHERE category= 'nails'";
			$result2 = mysqli_query($db, $query2);
			while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
				$service= $row2["serviceType"];
				
				$query3 = "SELECT cost FROM Tech_Services WHERE username='$username' AND service='$service'";
				$result3 = mysqli_query($db, $query3);
				$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
				$cost = $row3["cost"];
				if($cost != null)
					$check = 'checked';
				else{
					$check = '';
					$cost = 0;
					}
				echo " <div><input type='checkbox' name='checkbox[]' value='$service'  $check>$service</div>
					<label>Cost: $</label><input type='number' style='width:80px;' name='number[]' value='$cost'><br><br>";
			}          		
          		?>
  
		 </div>   
           	<div class="right_column">
          		<h3><strong>Makeup</strong></h3>
          		<?php
          		$query2 = "SELECT serviceType FROM Services WHERE category= 'makeup'";
			$result2 = mysqli_query($db, $query2);
			while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
				$service= $row2["serviceType"];
				
				$query3 = "SELECT cost FROM Tech_Services WHERE username='$username' AND service='$service'";
				$result3 = mysqli_query($db, $query3);
				$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
				$cost = $row3["cost"];
				if($cost != null)
					$check = 'checked';
				else{
					$check = '';
					$cost = 0;
					}
				echo " <div><input type='checkbox' name='checkbox[]' value='$service'  $check>$service</div>
					<label>Cost: $</label><input type='number' style='width:80px;' name='number[]' value='$cost'><br><br>";
			}          		
          		?>

 		</div>
 	</div>
</div>
</div>
          <div class="form-group">
            <div class="col-md-8" id="mysubmitbutton">
            <form  method='post' action='editProfile_action.php'>
              <input type="submit" name="submit" value='Update' class="btn btn-primary" style="padding-left: 7em; padding-right: 7em; float: right;">
              </form>
            </div>
          </div>
     </form>
      </div>
  </div>