<?php
include("config.php");
$username = $_SESSION['username'];

$msg="";
$extns = array('.jpg', '.gif', '.png');

if(isset($_POST["submit"])){

$address = $_POST['address'];
$city= $_POST['city'];	
$state = $_POST['state'];
$zip = $_POST['zip'];
$bio = $_POST['bio'];	



$query = "UPDATE Technician SET address	= '$address', city = '$city', state = '$state', zip = '$zip', bio = '$bio' WHERE username = '$username'";
		$result = mysqli_query($db, $query);
		if ($result) {
		$msg = "Thanks for updating your information!";
		} else {
			$msg = "Error!";
		}
	
$query3 = "DELETE FROM Tech_Services WHERE username='$username'";
$result3 = mysqli_query($db, $query3);	




$arr = array();
foreach ($_POST['number'] as $_costValue){
	if($_costValue != '0')
		array_push($arr, $_costValue);
}


$i = 0;
foreach ($_POST['checkbox'] as $_boxValue){
	$_costValue = $arr[$i];
	$query2 = "INSERT INTO Tech_Services(username, service, cost) VALUES ('$username', '$_boxValue', '$_costValue')";
        $result2 = mysqli_query($db, $query2);
	$i++;
	}
	
	
	
//Insert Times Avialable
foreach ($_POST['sunday'] as $time){
	$query = "INSERT INTO Tech_Availability(TechID, Day, Hour) VALUES ('$username', '0', '$time')";
        $result = mysqli_query($db, $query);
     
	}

foreach ($_POST['monday'] as $time){
	$query = "INSERT INTO Tech_Availability(TechID, Day, Hour) VALUES ('$username', '1', '$time')";
        $result = mysqli_query($db, $query);
     
	}
	
foreach ($_POST['tuesday'] as $time){
	$query = "INSERT INTO Tech_Availability(TechID, Day, Hour) VALUES ('$username', '2', '$time')";
        $result = mysqli_query($db, $query);
     
	}
	
foreach ($_POST['wednesday'] as $time){
	$query = "INSERT INTO Tech_Availability(TechID, Day, Hour) VALUES ('$username', '3', '$time')";
        $result = mysqli_query($db, $query);
     
	}
	
foreach ($_POST['thursday'] as $time){
	$query = "INSERT INTO Tech_Availability(TechID, Day, Hour) VALUES ('$username', '4', '$time')";
        $result = mysqli_query($db, $query);
     
	}
	
foreach ($_POST['friday'] as $time){
	$query = "INSERT INTO Tech_Availability(TechID, Day, Hour) VALUES ('$username', '5', '$time')";
        $result = mysqli_query($db, $query);
     
	}
	
foreach ($_POST['saturday'] as $time){
	$query = "INSERT INTO Tech_Availability(TechID, Day, Hour) VALUES ('$username', '6', '$time')";
        $result = mysqli_query($db, $query);
     
	}
}
?>