<?php
include 'config2.php';
$x=0;
$y=0;
$yy=0;
$sum=0;
$table="test";
$ii=1;
$z =0;
$sub_total_price = 0;
$pn = "";
$sum2=0;
$csid1 = 0;
if(isset($_POST['submit']))
{
$checked_array=$_POST['prodid'];
echo "Scope of Work";
echo '<br>';

foreach ($_POST['prodname'] as $key => $value) 
{
	
	if(in_array($_POST['prodname'][$key], $checked_array))
	{
	
	$prodname=$_POST['prodname'][$key];
	$prod_price= $_POST['prod_price'][$key];
	$prod_qty= $_POST['prod_qty'][$key];
	
	$sum =$prod_price;
	$pn =$_POST['prodname'][$key];
	
	$y = 1;
	$pid = $_POST['pid'][$key];

	$insertqry="INSERT INTO `product1`( `product_id`,`product_name`, `product_price`, `product_quantity`, `pid`, `cs_id`) VALUES ('$pid','$prodname','$prod_price','$prod_qty','pid','$csid1')";
	$insertqry=mysqli_query($con,$insertqry);

	$z = ((int)$sum+(int)$z);
	$yy =((int)$yy+(int)$y);
	
	echo '<br>';
	echo '• ',$_POST['prodname'][$key]," : ",$_POST['prod_price'][$key];
	
	}
	
}
$insertqry1 = "INSERT INTO `transacttable`( `custid`, `numofitem`, `cashtotal`) VALUES ('$prod_qty','$yy','$z')";
	$insertqry1=mysqli_query($con,$insertqry1);
echo $pid;

//header('location:../pages/transact/transact_view.php?editId=');


header('Location: ../pages/transact/transact_view.php?action=edit & id=' . $pid); 

}
//	echo "<br>";
?>