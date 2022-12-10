<?php 

include_once('../../include/config.php');
include_once('../../include/config2.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
$temp = $_REQUEST['delId'];
$sql = "SELECT * FROM cardata WHERE   cardata.id = '$temp'";
$result = $con->query($sql);
             while($row = $result->fetch_assoc()) {
              $formerid = $row['plateid'];
 
           
  }
   
	$db->delete('cardata',array('id'=>$_REQUEST['delId']));
	 header('Location: ../transact/transactcar.php?editId=' . $formerid); 
	
}

?>
