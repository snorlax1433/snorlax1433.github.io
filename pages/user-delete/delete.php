<?php 

include_once('../../include/config.php');

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){

	$db->delete('users',array('id'=>$_REQUEST['delId']));

	echo "Hello";

	exit;

}

?>