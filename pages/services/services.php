<?php
  session_start();

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../../login/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../../login/login.php");
  }
?>
<?php include_once('../../include/config.php');
include_once('../../include/config2.php');
include ('../../include/sidebar.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$temp = $_REQUEST['editId'];
	$tempo = 0;
	$sql1 = "SELECT * FROM users where id=$temp";
$result1 = $con->query($sql1);

  if ($result1->num_rows > 0) {
 
             while($row = $result1->fetch_assoc()) {
                echo "<tr>";
              
                $temp5 = $row['userphone'];   

  }



} else {
  echo "0 results";
}


$sql2  = "SELECT transid FROM transacttable ORDER BY transid DESC LIMIT 1";

$result2 = $con->query($sql2);
             while($row = $result2->fetch_assoc()) {
                echo "<tr>";
            
        
          	$tempo = $row['transid'];
               
  }

$tempo1 = $tempo+1;
//echo $tempo1;
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
		exit;
	}elseif($useremail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}elseif($userphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	$userCount	=	$db->getQueryCount('userinfo',$temp);
	if($userCount[0]['total']<100){
			$data	=	array(
				'usid'=>$usid,
				'username'=>$username,
				'useremail'=>$useremail,
				'userphone'=>$userphone,
			);
			$insert	=	$db->insert('userinfo',$data);
			if($insert){
				header('location:index.php?msg=ras');
				exit;
			}else{
				header('location:index.php?msg=rna');
				exit;
			}
			}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');
  			exit;
		}}}
?>
<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
	<meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
	<meta name="robots" content="index,follow">
	<title >PHP </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 <style>
   .box
   {
    width:750px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
  <style type="text/css">
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>
</head>
<body>
         
		<div class="container">
		
		
		<div class="card">
		
			<div class="card-body" >

				

				<div class="col-sm-6">  
<form method="post" action="../../include/reciept.php">


	<!-- -------------------------------------PREVENTIVE MAINTENANCE SERVICE------------------------------------------------------------------>
<div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
<table class="table table-striped table-bordere" id="data">
	<tbody>
		<tr>
			<td><input type="checkbox" name="prodid[]" value="Change Oil" id="sub1" ></td>
			<td>Change Oil
				
				<input type="hidden" name="prodname[]" value="Change Oil">
			</td>
			<td><input type="number"   name="prod_price[]" class="form-control" id="termsChkbx" ></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>

		</tr>
		<tr>
			<td><input type="checkbox" name="prodid[]" value="Replace oil filter"></td>
			<td>Replace oil filter
				<input type="hidden" name="prodname[]" value="Replace oil filter">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
					<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Replace fuee filter"></td>
			<td>Replace fuel filter
				<input type="hidden" name="prodname[]" value="Replace fuee filter">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Replace/INSPECT air spark plug"></td>
			<td>Replace/INSPECT spark plug
				<input type="hidden" name="prodname[]" value="Replace/INSPECT air spark plug">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
				<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="prodid[]" value="Replace/INSPECT air filter"></td>
			<td>Replace/INSPECT air filter
				<input type="hidden" name="prodname[]" value="Replace/INSPECT air filter">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
				<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="prodid[]" value="Replace/INSPECT Cabin filter"></td>
			<td>Replace/INSPECT Cabin filter
				<input type="hidden" name="prodname[]" value="Replace/INSPECT Cabin filter">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
				<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Replace transmission fluid/gear oil"></td>
			<td>Replace transmission fluid/gear oil
				<input type="hidden" name="prodname[]" value="Replace transmission fluid/gear oil">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Replace Differential gear oil"></td>
			<td>Replace Differential gear oil
				<input type="hidden" name="prodname[]" value="Replace Differential gear oil">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Throttle body cleaning"></td>
			<td>Throttle body cleaning
				<input type="hidden" name="prodname[]" value="Throttle body cleaning">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

			<tr>
			<td><input type="checkbox" name="prodid[]" value="Inspect and clean brake lining and drum"></td>
			<td>Inspect and clean brake lining and drum
				<input type="hidden" name="prodname[]" value="Inspect and clean brake lining and drum">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="prodid[]" value="Inspect and clean brake pads and disk"></td>
			<td>Inspect and clean brake pads and disk
				<input type="hidden" name="prodname[]" value="Inspect and clean brake pads and disk">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Inspect steering wheel, linkage and gear box"></td>
			<td>Inspect steering wheel, linkage and gear box
				<input type="hidden" name="prodname[]" value="Inspect steering wheel, linkage and gear box">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Inspect Front and Rear suspension"></td>
			<td>Inspect Front and Rear suspension
				<input type="hidden" name="prodname[]" value="Inspect Front and Rear suspension">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Inspect and test battery health"></td>
			<td>Inspect and test battery health
				<input type="hidden" name="prodname[]" value="Inspect and test battery health">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Inspect clutch system"></td>
			<td>Inspect clutch system
				<input type="hidden" name="prodname[]" value="Inspect clutch system">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Inspect Front and Rear suspension"></td>
			<td>Inspect Front and Rear suspension
				<input type="hidden" name="prodname[]" value="Inspect Front and Rear suspension">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Inspect air conditioning system"></td>
			<td>Inspect air conditioning system
				<input type="hidden" name="prodname[]" value="Inspect air conditioning system">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Inspect/Replace Drive Belt"></td>
			<td>Inspect/Replace Drive Belt
				<input type="hidden" name="prodname[]" value="Inspect/Replace Drive Belt">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Engine Detailing"></td>
			<td>Engine Detailing
				<input type="hidden" name="prodname[]" value="Engine Detailing">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>

		<tr>
			<td><input type="checkbox" name="prodid[]" value="Fluid flushing"></td>
			<td>Fluid flushing
				<input type="hidden" name="prodname[]" value="Fluid flushing">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="prodid[]" value="FULL ENGINE SCANNING"></td>
			<td>FULL ENGINE SCANNING
				<input type="hidden" name="prodname[]" value="FULL ENGINE SCANNING">
			</td>
			<td><input type="number" name="prod_price[]" class="form-control"></td>
			<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
			<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
		</tr>
	
	</tbody>
</table>

          </div>
          <div class="modal-footer">
           
          </div>
        </div>
      </div>
    </div>


 <div id ="loginModal" class="modal fade" role="dialog">
 		<div class="modal-dialog">
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><center>PREVENTIVE MAINTENANCE SERVICE</center></h4>
 				</div><br />  
 				
 				<div class="modal-body">
 							
         

</div>


 				</div>
 			</div>
</div>

<!-- ------------------------------------- END OF  PREVENTIVE MAINTENANCE SERVICE------------------------------------------------------------>

<!-- ------------------------------------- START OF AIRCON SERVICES-------------------------------------------------------------------------->

<div class="modal hide fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
          	<table class="table table-striped table-bordere" id ="data1">
          		<tbody>
          			<tr>
						<td><input type="checkbox" name="prodid[]" value="Aircon Cleaning"></td>
						<td>Aircon Cleaning
						<input type="hidden" name="prodname[]" value="Aircon Cleaning">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Compressor"></td>
						<td>Replace Compressor
						<input type="hidden" name="prodname[]" value="Replace Compressor">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Evaporator Front"></td>
						<td>Replace Evaporator Front
						<input type="hidden" name="prodname[]" value="Replace Evaporator Front">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Evaporator Rear"></td>
						<td>Replace Evaporator Rear
						<input type="hidden" name="prodname[]" value="Replace Evaporator Rear">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Condenser"></td>
						<td>Replace Condenser
						<input type="hidden" name="prodname[]" value="Replace Condenser">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Auxiliary fan"></td>
						<td>Replace Auxiliary fan
						<input type="hidden" name="prodname[]" value="Replace Auxiliary fan">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Expansion Valve Front"></td>
						<td>Replace Expansion Valve Front
						<input type="hidden" name="prodname[]" value="Replace Expansion Valve Front">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Expansion Valve Rear"></td>
						<td>Replace Expansion Valve Front
						<input type="hidden" name="prodname[]" value="Replace Expansion Valve Rear">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Filter Drier"></td>
						<td>Replace Filter Drier
						<input type="hidden" name="prodname[]" value="Replace Filter Drier">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace High Pressure Switch"></td>
						<td>Replace High Pressure Switch
						<input type="hidden" name="prodname[]" value="Replace High Pressure Switch">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace O ring"></td>
						<td>Replace O ring
						<input type="hidden" name="prodname[]" value="Replace O ring">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Flushing AC system"></td>
						<td>Flushing AC system
						<input type="hidden" name="prodname[]" value="Flushing AC system">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
				
	</tbody>
	</table>
          </div>
          
        </div>
      </div>
    </div>
<!-- ------------------------------------- END  OF AIRCON SERVICES-------------------------------------------------------------------------->

<!-- ------------------------------------- START OF ss SERVICES--------------------------------------------------------------------->



<!-- ------------------------------------- END OF ELECTRICAL SERVICES--------------------------------------------------------------------->

<!-- ------------------------------------- START OF ELECTRICAL SERVICES--------------------------------------------------------------------->

<div class="modal hide fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
          	<table class="table table-striped table-bordere" >
          		<tbody>
          			<tr>
						<td><input type="checkbox" name="prodid[]" value="Check Engine Light On"></td>
						<td>Check Engine Light On
						<input type="hidden" name="prodname[]" value="Check Engine Light On">
						</td>
						<td>
						<input type="hidden" name="prodname1[]" value="Check Engine Light On">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="FULL SCANNING"></td>
						<td>FULL SCANNING
						<input type="hidden" name="prodname[]" value="FULL SCANNING">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Abs, airbag, electrical power steering etc."></td>
						<td>Abs, airbag, electrical power steering etc.
						<input type="hidden" name="prodname[]" value="Abs, airbag, electrical power steering etc.">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					
				
	</tbody>
	</table>
          </div>
          
        </div>
      </div>
    </div>

    <!-- ----------------------------------------------------  START OF MAJOR WORK -------------------------- -->
<div class="modal hide fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
          	<table class="table table-striped table-bordere" id ="data3">
          		<tbody>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="EGR and Intake Manifold cleaning"></td>
						<td>EGR and Intake Manifold cleaning
						<input type="hidden" name="prodname[]" value="EGR and Intake Manifold cleaning">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Intake Manifold cleaning"></td>
						<td>Intake Manifold cleaning
						<input type="hidden" name="prodname[]" value="Intake Manifold cleaning">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Timing Belt"></td>
						<td>Replace Timing Belt
						<input type="hidden" name="prodname[]" value="Replace Timing Belt">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Turbo Cleaning"></td>
						<td>Turbo Cleaning
						<input type="hidden" name="prodname[]" value="Turbo Cleaning">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Turbo Actuator"></td>
						<td>Replace Turbo Actuator
						<input type="hidden" name="prodname[]" value="Replace Turbo Actuator">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Tensioner Bearing"></td>
						<td>Replace Tensioner Bearing
						<input type="hidden" name="prodname[]" value="Replace Tensioner Bearing">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Clutch Kit"></td>
						<td>Replace Clutch Kit
						<input type="hidden" name="prodname[]" value="Replace Clutch Kit">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Valve Clearance Setting"></td>
						<td>Valve Clearance Setting
						<input type="hidden" name="prodname[]" value="Valve Clearance Setting">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Valve Cover Gasket"></td>
						<td>Replace Valve Cover Gasket
						<input type="hidden" name="prodname[]" value="Replace Valve Cover Gasket">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Top Overhaul"></td>
						<td>Top Overhaul
						<input type="hidden" name="prodname[]" value="Top Overhaul">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="General Overhaul"></td>
						<td>General Overhaul
						<input type="hidden" name="prodname[]" value="General Overhaul">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Transmission"></td>
						<td>Replace Transmission
						<input type="hidden" name="prodname[]" value="Replace Transmission">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Radiator"></td>
						<td>Replace Radiator
						<input type="hidden" name="prodname[]" value="Replace Radiator">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Repacked Wheel Bearing"></td>
						<td>Repacked Wheel Bearing
						<input type="hidden" name="prodname[]" value="Repacked Wheel Bearing">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Repacked CV joint Bearing"></td>
						<td>Repacked CV joint Bearing
						<input type="hidden" name="prodname[]" value="Repacked CV joint Bearing">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					
				
	</tbody>
	</table>
          </div>
          
        </div>
      </div>
    </div>

    <!-- ----------------------------------------------------  END OF MAJOR WORK -------------------------- -->
    <!------------------------- ------------------ START OF UNDERCHASSIS WORK ---------------------------------------->
    <div class="modal hide fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
          	<table class="table table-striped table-bordere" id ="data10">
          		<tbody>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Ball Joint"></td>
						<td>Replace Ball Joint
						<input type="hidden" name="prodname[]" value="Replace Ball Joint">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Stabilizer Link"></td>
						<td>Replace Stabilizer Link
						<input type="hidden" name="prodname[]" value="Replace Stabilizer Link">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Shock Absorber"></td>
						<td>Replace Shock Absorber
						<input type="hidden" name="prodname[]" value="Replace Shock Absorber">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Tie Rod"></td>
						<td>Replace Tie Rod
						<input type="hidden" name="prodname[]" value="Replace Tie Rod">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Rack End"></td>
						<td>Replace Rack End
						<input type="hidden" name="prodname[]" value="Replace Rack End">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Rack and pinion"></td>
						<td>Replace Rack and pinion
						<input type="hidden" name="prodname[]" value="Replace Rack and pinion">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Wheel Bearing"></td>
						<td>Replace Wheel Bearing
						<input type="hidden" name="prodname[]" value="Replace Wheel Bearing">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace CV joint"></td>
						<td>Replace CV joint
						<input type="hidden" name="prodname[]" value="Replace CV joint">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Engine Support"></td>
						<td>Replace Engine Support
						<input type="hidden" name="prodname[]" value="Replace Engine Support">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Replace Transmission Support"></td>
						<td>Replace Transmission Support
						<input type="hidden" name="prodname[]" value="Replace Transmission Support">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
				
				
	</tbody>
	</table>
          </div>
          
        </div>
      </div>
    </div>
   <!------------------------- ------------------ END OF UNDERCHASSIS WORK ---------------------------------------->

   <!------------------------------------- COOLING SYSTEM RESTORATION ------------------------------------------------------->

<div class="modal hide fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
          	<table class="table table-striped table-bordere" id ="data11">
          		<tbody>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Radiator Cleaning"></td>
						<td>Radiator Cleaning
						<input type="hidden" name="prodname[]" value="Radiator Cleaning">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Coolant Flushing"></td>
						<td>Coolant Flushing
						<input type="hidden" name="prodname[]" value="Coolant Flushing">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Inspect/Replace Water Pump"></td>
						<td>Inspect/Replace Water Pump
						<input type="hidden" name="prodname[]" value="Inspect/Replace Water Pump">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Inspect/Replace Thermostat"></td>
						<td>Inspect/Replace Thermostat
						<input type="hidden" name="prodname[]" value="Inspect/Replace Thermostat">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Inspect/Replace Radiator Hose"></td>
						<td>Inspect/Replace Radiator Hose
						<input type="hidden" name="prodname[]" value="Inspect/Replace Radiator Hose">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Inspect/Replace Auxiliary Fan"></td>
						<td>Inspect/Replace Auxiliary Fan
						<input type="hidden" name="prodname[]" value="Inspect/Replace Auxiliary Fan">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="prodid[]" value="Silicon oil Refill"></td>
						<td>Silicon oil Refill
						<input type="hidden" name="prodname[]" value="Silicon oil Refill">
						</td>
						<td><input type="number"   name="prod_price[]" class="form-control"  ></td>
						<td><input type="hidden" name="pid[]" class="form-control"value="<?php echo $tempo1 ?>"></td>
						<td><input type="hidden" name="prod_qty[]" class="form-control"value="<?php echo $temp ?>"></td>
					</tr>
				
				
				
	</tbody>
	</table>
          </div>
          
        </div>
      </div>
    </div>


<!-- ------------------------------------- END OF COOLING  SYSTEM RESTORATION SERVICES------------------------------------------------------>

<!-- ----------------------------------- START SERVICES BUTTONS ------------------------------------------------------------------------------->

</div>







<div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center	">
           
            <h4 >SERVICES</h4>
          </div>
          <div class="modal-body p-4">
<button type="button" class="btn btn-success btn-sm form-control" ; data-toggle="modal" data-target="#modal1">PREVENTIVE MAINTENANCE SERVICES</button><br><br>
<button type="button" class="btn btn-success btn-sm form-control" ; data-toggle="modal" data-target="#modal2">AIRCON SERVICES</button><br><br>
<button type="button" class="btn btn-success btn-sm form-control" ; data-toggle="modal" data-target="#modal3">ELECTRICAL WORKS</button><br><br>
<button type="button" class="btn btn-success btn-sm form-control" ; data-toggle="modal" data-target="#modal4">MAJOR WORK</button><br><br>
<button type="button" class="btn btn-success btn-sm form-control" ; data-toggle="modal" data-target="#modal5">UNDERCHASSIS WORK</button><br><br>
<button type="button" class="btn btn-success btn-sm form-control" ; data-toggle="modal" data-target="#modal6">COOLING SYSTEM RESTORATION</button>
<!-- ----------------------------------- END SERVICES BUTTONS ------------------------------------------------------------------------------->
</div>
</div>
</div>



 </div><div class="text-center">
	<input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit daw">
	</div>

</form>







				
					<form method="post">
						<div class="form-group">

							
							<input type="hidden" name="usid" id="usid" class="form-control" value="<?php echo $temp ?>" required>
						</div>
						<div class="form-group">
						
							<input type="hidden" name="username" id="username" class="form-control"  required>
						</div>
						<div class="form-group">
						
							<input type="hidden" name="useremail" id="useremail" class="form-control" placeholder="Enter user email" required>
						</div>
						<div class="form-group">
						
							<input type="hidden" class="tel form-control" name="userphone" id="userphone" x-autocompletetype="tel" placeholder="Enter user phone" required>
						</div>
						<div class="form-group">
							<!-- <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add User</button> -->
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	  <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	 
</body>

</html>
 
<style type="text/css">
	.aht{

  color: black;
  font-size: 25px;
  margin: 5px;
  padding-left: 10%;
  text-align: center;
  border: none;
	}
</style>

<script type="text/javascript">$(document).ready(function(){
    $('#data').after('<div id="nav"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" class="aht" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#data tbody tr').hide();
    $('#data tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
});</script>
<script type="text/javascript">$(document).ready(function(){
    $('#data1').after('<div id="nav1"></div>');
    var rowsShown1 = 6;
    var rowsTotal1 = $('#data1 tbody tr').length;
    var numPages1 = rowsTotal1/rowsShown1;
    for(i = 0;i < numPages1;i++) {
        var pageNum1 = i + 1;
        $('#nav1').append('<a href="#" class="aht" rel="'+i+'">'+pageNum1+'</a> ');
    }
    $('#data1 tbody tr').hide();
    $('#data1 tbody tr').slice(0, rowsShown1).show();
    $('#nav1 a:first').addClass('active');
    $('#nav1 a').bind('click', function(){

        $('#nav1 a').removeClass('active');
        $(this).addClass('active');
        var currPage1 = $(this).attr('rel');
        var startItem1 = currPage1 * rowsShown1;
        var endItem1 = startItem1 + rowsShown1;
        $('#data1 tbody tr').css('opacity','0.0').hide().slice(startItem1, endItem1).
        css('display','table-row').animate({opacity:1}, 300);
    });
});</script>
<script type="text/javascript">$(document).ready(function(){
    $('#data2').after('<div id="nav2"></div>');
    var rowsShown2 = 5;
    var rowsTotal2 = $('#data2 tbody tr').length;
    var numPages2 = rowsTotal2/rowsShown2;
    for(i = 0;i < numPages2;i++) {
        var pageNum2 = i + 1;
        $('#nav2').append('<a href="#" class="aht" rel="'+i+'">'+pageNum2+'</a> ');
    }
    $('#data2 tbody tr').hide();
    $('#data2 tbody tr').slice(0, rowsShown2).show();
    $('#nav2 a:first').addClass('active');
    $('#nav2 a').bind('click', function(){

        $('#nav2 a').removeClass('active');
        $(this).addClass('active');
        var currPage2 = $(this).attr('rel');
        var startItem2 = currPage2 * rowsShown2;
        var endItem2 = startItem2 + rowsShown2;
        $('#data2 tbody tr').css('opacity','0.0').hide().slice(startItem2, endItem2).
        css('display','table-row').animate({opacity:1}, 300);
    });
});</script>


<script type="text/javascript">$(document).ready(function(){
    $('#data3').after('<div id="nav3"></div>');
    var rowsShown3 = 5;
    var rowsTotal3 = $('#data3 tbody tr').length;
    var numPages3 = rowsTotal3/rowsShown3;
    for(i = 0;i < numPages3;i++) {
        var pageNum3 = i + 1;
        $('#nav3').append('<a href="#" class="aht" rel="'+i+'">'+pageNum3+'</a> ');
    }
    $('#data3 tbody tr').hide();
    $('#data3 tbody tr').slice(0, rowsShown3).show();
    $('#nav3 a:first').addClass('active');
    $('#nav3 a').bind('click', function(){

        $('#nav3 a').removeClass('active');
        $(this).addClass('active');
        var currPage3 = $(this).attr('rel');
        var startItem3 = currPage3 * rowsShown3;
        var endItem3 = startItem3 + rowsShown3;
        $('#data3 tbody tr').css('opacity','0.0').hide().slice(startItem3, endItem3).
        css('display','table-row').animate({opacity:1}, 300);
    });
});</script>
<script type="text/javascript">$(document).ready(function(){
    $('#data10').after('<div id="nav10"></div>');
    var rowsShown10 = 5;
    var rowsTotal10 = $('#data10 tbody tr').length;
    var numPages10 = rowsTotal10/rowsShown10;
    for(i = 0;i < numPages10;i++) {
        var pageNum10 = i + 1;
        $('#nav10').append('<a href="#" class="aht" rel="'+i+'">'+pageNum10+'</a> ');
    }
    $('#data10 tbody tr').hide();
    $('#data10 tbody tr').slice(0, rowsShown10).show();
    $('#nav10 a:first').addClass('active');
    $('#nav10 a').bind('click', function(){

        $('#nav10 a').removeClass('active');
        $(this).addClass('active');
        var currPage10 = $(this).attr('rel');
        var startItem10 = currPage10 * rowsShown10;
        var endItem10 = startItem10 + rowsShown10;
        $('#data10 tbody tr').css('opacity','0.0').hide().slice(startItem10, endItem10).
        css('display','table-row').animate({opacity:1}, 300);
    });
});</script>
<script type="text/javascript">$(document).ready(function(){
    $('#data11').after('<div id="nav11"></div>');
    var rowsShown11 = 5;
    var rowsTotal11 = $('#data11 tbody tr').length;
    var numPages11 = rowsTotal11/rowsShown11;
    for(i = 0;i < numPages11;i++) {
        var pageNum11 = i + 1;
        $('#nav11').append('<a href="#" class="aht" rel="'+i+'">'+pageNum11+'</a> ');
    }
    $('#data11 tbody tr').hide();
    $('#data11 tbody tr').slice(0, rowsShown11).show();
    $('#nav11 a:first').addClass('active');
    $('#nav11 a').bind('click', function(){

        $('#nav11 a').removeClass('active');
        $(this).addClass('active');
        var currPage11 = $(this).attr('rel');
        var startItem11 = currPage11 * rowsShown11;
        var endItem11 = startItem11 + rowsShown11;
        $('#data11 tbody tr').css('opacity','0.0').hide().slice(startItem11, endItem11).
        css('display','table-row').animate({opacity:1}, 300);
    });
});</script>


