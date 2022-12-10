<?php include_once('../../include/config.php');
$tempid = $_GET['editId'];
include ('../../include/sidebar3.php');

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

	extract($_REQUEST);

	if($userphone==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');


	}else{

		

		$userCount	=	$db->getQueryCount('cardata','id');

		if($userCount[0]['total']<100){

			$data	=	array(
							'carbrand'=>$carbrand,
							'plateid'=>$plateid,
							'userphone'=>$userphone,
							'carmodel'=>$carmodel,
							'carmanufacturer'=>$carmanufacturer,
							);

			$insert	=	$db->insert('cardata',$data);

			if($insert){

			 header('Location: ../../pages/transact/transactcar.php?editId=' . $tempid); 
				exit;

			}else{

				 header('Location: ../../pages/transact/transactcar.php?editId=' . $tempid); 

				exit;

			}

		}else{

			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');

			exit;

		}

	}

}

?>




<!doctype html>
<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="Address Book">
	<meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
	<meta name="robots" content="index,follow">
	<title>User Car</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="../../hehe/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../../https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



</head>



<body>


 
   	<div class="container">


						
				





<center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Add Car Details</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="../../index.php"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">

			 <form role="form" method="post">
             

				   <div class="form-group row text-left text-warning">

                <div class="col-sm-3" style="padding-top: 5px;">
                 <h4>Car Model:</h4>
                </div>
                 	<input type="hidden" name="plateid" id="plateid" class="form-control" value="<?php echo $tempid ?>" required>
                <div class="col-sm-9">
                 <input type="text" name="carbrand" id="carbrand" class="form-control" placeholder="Enter Car Model"  required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 <h4>Car Plate #:</h4>
                </div>
                <div class="col-sm-9">
                 	<input type="tel" class="tel form-control" name="userphone" id="userphone" x-autocompletetype="tel" placeholder="Enter Plate Number" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 <h4>Car Model</h4>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="carmodel" id="carmodel" class="form-control" placeholder="Enter Car Model"  required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 <h4>Car Producer</h4>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="carmanufacturer" id="carmanufacturer" class="form-control" placeholder="Enter Car Manufacturer"  required>
                </div>
              </div>

         <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Car Details</button>
          </form>  

</div>
</div>








				
				




	

    



		
		 <script src="../../hehe/jquery.min.js"></script>
    


    
</body>

</html>