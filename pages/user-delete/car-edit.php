<?php include_once('../../include/config.php');
include_once('../../include/config2.php');
include ('../../include/sidebar3.php');

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){

	$row	=	$db->getAllRecords('cardata','*',' AND id="'.$_REQUEST['editId'].'"');
	$temp = $_REQUEST['editId'];
	$userCount	=	$db->getQueryCount('cardata',$temp);
	$sql = "SELECT * FROM cardata WHERE   cardata.id = '$temp'";
$result = $con->query($sql);
             while($row1 = $result->fetch_assoc()) {
              $formerid = $row1['plateid'];
 
           
  }
}



if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

	extract($_REQUEST);

		$data	=	array(

					'carbrand'=>$carbrand,

					'carmodel'=>$carmodel,

					'userphone'=>$userphone,

					'carmanufacturer'=>$carmanufacturer,
				

					);

	$update	=	$db->update('cardata',$data,array('id'=>$editId));

	if($update){
		
	 header('Location: ../transact/transactcar.php?editId=' . $formerid); 

		exit;

	}else{

	 header('Location: ../transact/transactcar.php?editId=' . $formerid); 

		exit;

	}

}


?>

<!doctype html>

<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
	<meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
	<meta name="robots" content="index,follow">
	<title>PHP CRUD with search and pagination in bootstrap 4</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



</head>



<body>

	
	<div class="container">
	

	 <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Customer</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="../transact/transactcar.php?editId=<?php echo $formerid ?> "> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
         
            <form role="form" method="post">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Car Plate Number:
                </div>
                <div class="col-sm-9">
                 	<input type="text" name="userphone" id="userphone" class="form-control" value="<?php echo isset($row[0]['userphone'])?$row[0]['userphone']:''; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Car Brand:
                </div>
                <div class="col-sm-9">
                 	<input type="text" name="carbrand" id="carbrand" class="form-control" value="<?php echo isset($row[0]['carbrand'])?$row[0]['carbrand']:''; ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Car Model:
                </div>
                <div class="col-sm-9">
                 <input type="text" name="carmodel" id="carmodel" class="form-control" value="<?php echo isset($row[0]['carmodel'])?$row[0]['carmodel']:''; ?>" placeholder="Enter Car Model" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Car Producer:
                </div>
                <div class="col-sm-9">
                   <input type="text" class="form-control" name="carmanufacturer" id="carmanufacturer"  value="<?php echo isset($row[0]['carmanufacturer'])?$row[0]['carmanufacturer']:''; ?>" placeholder="Enter Car Manufacturer" required>

                </div>
              </div>
              <hr>
<input type="hidden" name="editId" id="editId" value="<?php echo isset($_REQUEST['editId'])?$_REQUEST['editId']:''?>">
                <button type="submit" name="submit" value="submit" id="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button> 
              </form>  
          </div>
  </div>




		
		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

	

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}

		?>

	
	</div>

    

	

	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
		jQuery(function($){
			  var input = $('[type=tel]')
			  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
			  input.bind('country.mobilePhoneNumber', function(e, country) {
				$('.country').text(country || '')
			  })
			 });
		});
	</script>
    

</body>

</html>