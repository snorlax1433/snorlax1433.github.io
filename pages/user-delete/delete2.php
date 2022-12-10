<?php 

include_once('config.php');

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){

	$db->delete('users',array('product_id'=>$_REQUEST['delId']));

	  echo    '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';

	exit;

}

?>