<?php include_once('../../include/config.php');
  include '../../include/sidebar.php';
			$zz = $_POST['id'];
			$fname = $_POST['username'];
		    $lname = $_POST['useremail'];
			$phone = $_POST['userphone'];
	   	
		
	 			$query = 'UPDATE users set username ="'.$fname.'",
					useremail ="'.$lname.'", userphone="'.$phone.'" WHERE
					userid ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("You've Update Customer Successfully.");
			window.location = "../../index.php";
		</script>